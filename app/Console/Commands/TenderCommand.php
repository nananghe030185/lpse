<?php

namespace App\Console\Commands;

use App\ApiTender;
use App\Models\Lpse;
use App\Models\Outbox;
use App\Models\Tender;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TenderCommand extends Command
{
    protected static $result = null;
    protected static $link = 'https://isb.lkpp.go.id/isb-2/api/satudata/TenderUmumPublik/';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tender-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk mengupdate Data Tender 2x sehari setiap jam 1 malam dan jam 13 siang';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // eksekusi tender
        // $this->getTender();
        ApiTender::execute();
    }
}
