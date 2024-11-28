<?php

namespace App;

use App\Models\Satker;
use App\Models\Swakelola;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use illuminate\Support\Str;
use GuzzleHttp\Client;

class ApiSwakelola
{
    protected static $result;
    protected static $url = 'https://sirup.lkpp.go.id/sirup/datatablectr/datarupswakelolasatker';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function execute()
    {
        set_time_limit(0);
        $q = [
            'query' => [
                'tahun'     => Carbon::now()->format('Y'),
                'sEcho'     => 1,
                'iDisplayStart' => 0,
                'iDisplayLength' => 1000,
                'sSearch'    => ''
            ]
        ];

        $client = new Client();
        $satkers = Satker::where('swakelola', false)->limit(AppLpse::setting('scrape_item_swakelola'))->get(['kd_satker', 'kd_klpd']);
        foreach ($satkers as $i => $satker) {
            $q['query']['idSatker'] = $satker->kd_satker; // Satker Badan kepegawaian Aceh
            $result = $client->get('https://sirup.lkpp.go.id/sirup/datatablectr/datarupswakelolasatker', $q)->getBody()->getContents();
            self::save($result, $satker->kd_klpd, $satker->kd_satker);
            Satker::where('kd_satker', $satker->kd_satker)->update(['swakelola' => true]);
        }
    }

    /**
     * Simpan data ke database
     */
    protected static function save($data, $kd_klpd, $kd_satker)
    {
        $data = json_decode($data);
        foreach ($data->aaData as $key => $data) {
            try {
                Swakelola::updateOrCreate(
                    [
                        'kd_rup'            => $data[0]
                    ],
                    [
                        'kd_klpd'           => $kd_klpd,
                        'kd_satker'         => $kd_satker,
                        'nama_kegiatan'     => $data[1],
                        'nama_paket'        => Str::limit($data[2], 250),
                        'pagu'              => $data[3],
                        'sumber_dana'       => Str::contains($data[4], ',') ? explode(',', $data[4])[0] : $data[4],
                        'waktu_pemilihan'   => $data[6]
                    ]
                );
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        };
    }
}
