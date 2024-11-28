<?php

namespace App;

use App\Models\Lpse;
use App\Models\Outbox;
use App\Models\Tender;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use illuminate\Support\Str;

class ApiTender
{
    protected static $result;
    protected static $link = 'https://isb.lkpp.go.id/isb-2/api/satudata/TenderUmumPublik/';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get Data
     */
    public static function execute()
    {
        set_time_limit(0);
        $tahun = Carbon::now()->format('Y');
        $lpses = Lpse::where(['state' => true, 'scrape' => false])->limit(AppLpse::setting('scrape_item_tender'))->get(['id', 'link', 'state', 'jumlah_paket', 'jumlah_pagu']);

        foreach ($lpses as $key => $val) {
            $url = static::$link . $tahun . '/' . $val->id;
            $req = Http::get($url);

            if ($req->status() == 200) {
                static::$result = $req->json();
                static::save($val);
            } else {
                // Website tidak aktif
                Lpse::where('id', $val->id)->update(['state' => false]);
            }

            // Update scrape to true
            Lpse::where('id', $val->id)->update(['scrape' => true]);
        }
    }

    /**
     * Simpan data ke database
     */
    protected static function save($lpse)
    {
        if (is_array(self::$result)) {
            foreach (self::$result as $key => $data) {

                try {
                    $hasil = Tender::updateOrCreate(
                        [
                            // 'id' => $data['Repo id LPSE'],
                            'tender_id' => $data['Kode Tender'],
                        ],
                        [
                            'lpse_id' => $data['Repo id LPSE'],
                            'lpse' => $data['LPSE'],
                            'status_tender' => $data['Status_Tender'],
                            'nama_paket' => Str::limit($data['Nama Paket'], 250),
                            'slug' => Str::limit(
                                Str::slug($data['Kode Tender'] . ' ' . $data['Nama Paket']),
                                250
                            ),
                            'pagu' => $data['Pagu'],
                            'hps' => $data['HPS'],
                            'tgl_dibuat' => $data['tanggal paket dibuat'],
                            'tgl_tayang' => $data['tanggal paket tayang'],
                            'kategori' => $data['Kategori Pekerjaan'],
                            'metode_pemilihan' => $data['Metode Pemilihan'],
                            'metode_pengadaan' => $data['Metode Pengadaan'],
                            'metode_evaluasi' => $data['Metode Evaluasi'],
                            'cara_pembayaran' => $data['Cara Pembayaran'],
                            'jenis_penetapan_pemenang' => $data['Jenis Penetapan Pemenang'],
                            'instansi_dan_satker' => json_encode($data['Instansi dan Satker']),
                            'apakah_paket_konsolidasi' => $data['Apakah paket konsolidasi'],
                            // 'daftar_paket_konsolidasi' => $data['daftar paket konsolidasi'],
                            'anggaran' => json_encode($data['anggaran']),
                            'lokasi_paket' => json_encode($data['lokasi_paket']),
                            'jumlah_pendaftar' => $data['Jumlah Pendaftar'],
                            'jumlah_penawar' => $data['Jumlah Penawar'],
                            'jumlah_kirim_kualifikasi' => $data['jumlah_kirim_kualifikasi'],
                            'durasi_tender' => $data['Durasi Tender'],
                            'versi_spse_paket' => $data['Versi_spse_paket'],
                            // 'jadwal_pengumuman' => $data[''],
                            'tanggal_awal_pengumuman' => $data['jadwal_pengumuman']['tanggal_mulai'],
                            'tanggal_akhir_pengumuman' => $data['jadwal_pengumuman']['tanggal_akhir'],
                            // 'jadwal_penawaran' => $data[''],
                            'tanggal_awal_penawaran' => $data['jadwal_penawaran']['tanggal_mulai'],
                            'tanggal_akhir_penawaran' => $data['jadwal_penawaran']['tanggal_akhir']
                        ]
                    );

                    // Cari detail proyek untuk mendapatkan tahapan dan ijin usaha
                    // if (Carbon::now() <= $data['jadwal_penawaran']['tanggal_akhir']) {
                    //     $urldetail = Lpse::where('id', $data['Repo id LPSE'])->first()->link . '/lelang/' . $data['Kode Tender'] . '/pengumumanlelang';
                    //     $body = Http::get($urldetail)->body();
                    //     if ($body) {
                    //         Tender::updateOrCreate([
                    //             'tender_id' => $data['Kode Tender']
                    //              ],
                    //             ['tahapan' => 'proses pengerjaan',
                    //             'ijin' => 'proses pengerjaan ijin'
                    //         ]);
                    //     }
                    // }

                    if ($hasil->wasRecentlyCreated) {
                        // Kirim Notif ke member
                        // ======== SUPER USER =========
                        $superadmin = User::where(['group_id' => '1', 'state' => true])->get();
                        static::sendNotif($superadmin, $data, 'admin', $lpse->link);

                        // ======= PERSONAL =============
                        $personals = User::where(['group_id' => '3', 'state' => true])->get();
                        static::sendNotif($personals, $data, 'personal', $lpse->link);

                        // ======= CORPORATE =============
                        $corporates = User::where(['group_id' => '4', 'state' => true])->get();
                        static::sendNotif($corporates, $data, 'corporate', $lpse->link);

                        // ======= SPECIAL =============
                        $specials = User::where(['group_id' => '5', 'state' => true])->get();
                        static::sendNotif($specials, $data, 'special', $lpse->link);

                        // Update Jumlah pagu dna jumlah Paket
                        Lpse::where('id', $lpse->id)->update([
                            'jumlah_paket' => $lpse->jumlah_paket + 1,
                            'jumlah_pagu' => $lpse->jumlah_pagu + intval($data['Pagu']),
                        ]);
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                    dd($th->getMessage());
                }
            };
        }
    }

    /**
     * Send Notifikation
     */
    protected static function sendNotif($users, $data, $group_name, $link)
    {
        foreach ($users as $user) {
            if ($user->profile->masa_berlaku > now('UTC') && $user->profile->kata_kunci != '') {
                $katakunci = $user->profile->kata_kunci . ',' . Str::random(10);
                // Notif telegram by kata kunci
                if ($user->profile->notif_telegram) {
                    static::notif($user, $data, $katakunci, 'telegram', $link, $group_name);
                }

                // Notif email by kata kunci
                if ($user->profile->notif_email) {
                    static::notif($user, $data, $katakunci, 'email', $link, $group_name);
                }

                // Notif Wahtsapp by kata kunci
                if ($user->profile->notif_whatsapp) {
                    static::notif($user, $data, $katakunci, 'whatsapp', $link, $group_name);
                }
            }
        }
    }

    /**
     * Notif 
     */
    protected static function notif($user, $data, $katakunci, $channel, $link, $group_name = 'personal',)
    {
        $urllpse = $link . '/lelang/' . $data['Kode Tender'] . '/pengumumanlelang';
        $pesan = Str::replace('{{tanggal}}', Carbon::now()->format('d M Y'), AppLpse::setting('message_notifikasi'));
        $pesan = Str::replace('{{namapaket}}', $data['Nama Paket'], $pesan);
        $pesan = Str::replace('{{link}}', $urllpse, $pesan);
        //  $data['Nama Paket']
        if ($group_name == 'personal') {
            if (Str::contains($data['Nama Paket'], explode(',', $katakunci, 4), true) && $data['jadwal_penawaran']['tanggal_akhir'] > now()) {
                Outbox::updateOrCreate([
                    'user_id' => $user->id,
                    'channel' => $channel,
                    'tender_id' => $data['Kode Tender'],
                    'pesan' => $pesan
                ]);
            }
        } else {
            if (Str::contains($data['Nama Paket'], explode(',', $user->profile->kata_kunci), true) && $data['jadwal_penawaran']['tanggal_akhir'] > now()) {
                Outbox::updateOrCreate([
                    'user_id' => $user->id,
                    'channel' => $channel,
                    'tender_id' => $data['Kode Tender'],
                    'pesan' => $pesan
                ]);
            }
        }
    }
}
