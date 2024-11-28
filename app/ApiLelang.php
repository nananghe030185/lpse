<?php

namespace App;

use App\Models\Lelang;
use App\Models\Satker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use illuminate\Support\Str;
use OrangeSyrup\Orange;
use OrangeSyrup\Sirup;
use GuzzleHttp\Client;

// ini percobaan commit ========
class ApiLelang
{
    protected static $result;
    protected static $url = 'https://sirup.lkpp.go.id/sirup/datatablectr/dataruppenyediasatker';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function tes()
    {
        // halooooo
        // 123
    }

    public static function execute()
    {

        $client = new Client;

        set_time_limit(0);
        $query = [
            'query' => [
                'tahun'     => Carbon::now()->format('Y'),
                'sEcho'     => 1,
                'iDisplayStart' => 0,
                'iDisplayLength' => 1000,
                'sSearch'    => ''
            ]
        ];

        $satkers = Satker::where('lelang', false)->limit(AppLpse::setting('scrape_item_lelang'))->get(['kd_satker', 'kd_klpd']);
        foreach ($satkers as $i => $satker) {
            $query['query']['idSatker'] = $satker->kd_satker; // Satker Badan kepegawaian Aceh => 107070
            $result = $client->get('https://sirup.lkpp.go.id/sirup/datatablectr/dataruppenyediasatker', $query)->getBody()->getContents();
            static::save($result, $satker->kd_klpd, $satker->kd_satker);

            Satker::where('kd_satker', $satker->kd_satker)->update(['lelang' => true]);
        }
    }

    protected static function save($data, $kd_klpd, $kd_satker)
    {
        $data = json_decode($data);
        foreach ($data->aaData as $key => $data) {
            try {
                Lelang::updateOrCreate(
                    [
                        'kd_rup'            => $data[0]
                    ],
                    [
                        'kd_klpd'           => $kd_klpd,
                        'kd_satker'         => $kd_satker,
                        'nama_paket'        => Str::limit($data[1], 250),
                        'pagu'              => $data[2],
                        'metode_pemilihan'  => $data[3],
                        'sumber_dana'       => Str::contains($data[4], ',') ? explode(',', $data[4])[0] : $data[4],
                        'waktu_pemilihan'   => $data[6]
                    ]
                );
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        };
    }
}
