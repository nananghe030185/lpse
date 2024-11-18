<?php

namespace App\Console\Commands;

use App\ApiSwakelola;
use App\Models\Satker;
use App\Models\Swakelola;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SwakelolaCommand extends Command
{
    protected $result;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:swakelola-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        ApiSwakelola::execute();
    }
}
