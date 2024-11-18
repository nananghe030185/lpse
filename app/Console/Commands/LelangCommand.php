<?php

namespace App\Console\Commands;

use App\ApiLelang;
use App\Models\Lelang;
use App\Models\Satker;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use illuminate\Support\Str;

class LelangCommand extends Command
{
    protected $result;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lelang-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk mengupdate data lelang 2x sehari setiap jam 1 malam dan 13 siang';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        ApiLelang::execute();
    }
}
