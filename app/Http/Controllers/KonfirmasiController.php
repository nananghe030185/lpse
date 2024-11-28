<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Komisi;
use App\Models\KonfirmasiPembayaran;
use App\Models\LaporanKeuangan;
use App\Models\Outbox;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\PseudoTypes\IntegerValue;

class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $konfirmasi = KonfirmasiPembayaran::orderBy('id', 'ASC')->filter()->paginate();
        if (request('search')) {
            $konfirmasi->appends(['search' => request('search')]);
        }
        $params = [
            'title' => 'Konfimasi Pembayaran',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $konfirmasi,
        ];

        return view('backend/konfirmasi', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'status' => 'required',
            'pemilik' => 'required',
            'nominal' => 'required|numeric',
            'tanggal' => 'required',
            'bukti_transfer' => 'image|file|max:1024',
            'catatan' => 'required'
        ]);

        if ($request->file('bukti_transfer')) {
            $validate['bukti_transfer'] = $request->file('bukti_transfer')->store('konfirmasi');
        }
        $validate['tanggal'] = Carbon::parse($request->tanggal)->format('Y-m-d H:i:s');

        KonfirmasiPembayaran::create($validate);

        // Kirim Pesan ke Admin
        $admins = User::where('group_id', 1)->get();
        foreach ($admins as $admin) {
            Outbox::create([
                'user_id' => $admin->id,
                'tender_id' => 0,
                'pesan' => 'Konfimasi Pembayaran Member dengan <br>Nama : ' . $request->pemilik . ' <br>ID :' . $request->user_id . ' <br>Nominal :' . $request->nominal,
                'channel' => 'telegram',
                'state' => false
            ]);

            Outbox::create([
                'user_id' => $admin->id,
                'tender_id' => 0,
                'pesan' => 'Konfimasi Pembayaran Member dengan <br>Nama : ' . $request->pemilik . ' <br>ID :' . $request->user_id . ' <br>Nominal :' . $request->nominal,
                'channel' => 'whatsapp',
                'state' => false
            ]);

            Outbox::create([
                'user_id' => $admin->id,
                'tender_id' => 0,
                'pesan' => 'Konfimasi Pembayaran Member dengan <br>Nama : ' . $request->pemilik . ' <br>ID :' . $request->user_id . ' <br>Nominal :' . $request->nominal,
                'channel' => 'email',
                'state' => false
            ]);
        }

        return redirect()->back()->with('success', __('global.message.store', ['view' => 'Konfirmasi Pembayaran']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = new Carbon();
        $user = User::where('id', $request->user_id)->first();

        // $userprofile = UserProfile::where('user_id', $request->user_id);
        $masa_berlaku = $user->profile->masa_berlaku;
        $durasi = 0;
        if ($request->nominal == AppLpse::setting('harga_personal')) {
            $durasi = intval(AppLpse::setting('durasi_personal'));
            // Masukan user ke group personal
            User::where('id', $request->user_id)->update(['group_id' => 3]);
        } elseif ($request->nominal == AppLpse::setting('harga_corporate')) {
            $durasi = intval(AppLpse::setting('durasi_corporate'));
            // Masukan user ke group Corporate
            User::where('id', $request->user_id)->update(['group_id' => 4]);
        } elseif ($request->nominal == AppLpse::setting('harga_special')) {
            $durasi = intval(AppLpse::setting('durasi_special'));
            // Masukan user ke group Special
            User::where('id', $request->user_id)->update(['group_id' => 5]);
        }

        if ($masa_berlaku > $date->format('Y-m-d 00:00:00')) {
            // Jika masa berlaku masih ada maka tambahkan sisanya
            $hari = $durasi + ceil($date->diffInDays($masa_berlaku, true));
            $user->profile->update(['masa_berlaku' => $date->add($hari . ' days')->format('Y-m-d 00:00:00')]);
        } else {
            // Jika Masa berlaku sudah lewat
            $user->profile->update(['masa_berlaku' => $date->add($durasi . ' days')->format('Y-m-d 00:00:00')]);
        }

        KonfirmasiPembayaran::where('id', $id)->update([
            'status' => true
        ]);

        // Masukan ke laporan keuangan
        LaporanKeuangan::create([
            'user_id' => $request->user_id,
            'tanggal' => now(),
            'keterangan' => 'Pembayaran Keanggotaan a/n ' . $user->name . ' dengan ID ' . $request->user_id . ' selama ' . $durasi . ' Hari',
            'pemasukan' => $request->nominal
        ]);

        // Kirim Pesan ke User
        if ($user->profile->notif_email) {
            Outbox::create([
                'user_id' => $request->user_id,
                'tender_id' => 0,
                'pesan' => 'Masa berlaku akun anda sudah diperpanjang selama ' . $durasi . ' hari<br>Terima Kasih<br>Admin ' . config('app.name', 'LPSE Indonesia'),
                'channel' => 'email',
                'state' => false
            ]);
        }

        if ($user->profile->notif_telegram && $user->profile->telegram != '') {
            Outbox::create([
                'user_id' => $request->user_id,
                'tender_id' => 0,
                'pesan' => 'Masa berlaku akun anda sudah diperpanjang selama ' . $durasi . ' hari<br>Terima Kasih<br>Admin ' . config('app.name', 'LPSE Indonesia'),
                'channel' => 'telegram',
                'state' => false
            ]);
        }

        if ($user->profile->notif_whatsapp && $user->profile->whatsapp != '') {
            Outbox::create([
                'user_id' => $request->user_id,
                'tender_id' => 0,
                'pesan' => 'Masa berlaku akun anda sudah diperpanjang selama ' . $durasi . ' hari<br>Terima Kasih<br>Admin ' . config('app.name', 'LPSE Indonesia'),
                'channel' => 'whatsapp',
                'state' => false
            ]);
        }

        // Kirim Komisi untuk upline 10%
        $username_upline = UserProfile::where('user_id', $request->user_id)->first()->upline;
        $user_upline = User::where('username', $username_upline)->first();
        $komisi = Komisi::where('id_downline', $request->user_id);
        if (!$komisi->count()) {
            $persenKomisi = intval(AppLpse::setting('persen_komisi'));
            // Tambahkan Record komisi
            Komisi::create([
                'id_upline' => $user_upline->id,
                'id_downline' => $request->user_id,
                'nominal' => $persenKomisi / 100 * $request->nominal
            ]);

            // Masukan komisi ke laporan keuangan
            LaporanKeuangan::create([
                'user_id' => $user_upline->id,
                'tanggal' => now(),
                'keterangan' => 'Komisi a/n ' . $user_upline->name . ' dengan ID ' . $user_upline->id . ' sebesar ' . $persenKomisi / 100 * $request->nominal,
                'pengeluaran' => $persenKomisi / 100 * $request->nominal
            ]);
        }


        return redirect(route('konfirmasi.index'))->with('success', __('global.message.update', ['view' => 'Konfirmasi Pembayaran']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KonfirmasiPembayaran::destroy($id);
        return redirect(route('konfirmasi.index'))->with('success', __('global.message.destroy', ['view' => 'Konfirmasi Pembayaran']));
    }
}
