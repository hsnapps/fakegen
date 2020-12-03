<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Support\Facades\{Storage, Log};
use Illuminate\Console\Command;

class FlushFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'files:flush {--hours=3}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes downloaded files after being in the server for 24 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hours = $this->option('hours');
        $files = Storage::disk('downloads')->files('');

        foreach ($files as $file) {
            $lastModified = Storage::disk('downloads')->lastModified($file);
            $date = Carbon::parse(date('Y-m-d H:i:s', $lastModified));
            $diffInHours = $date->diffInHours(now());
            if ($diffInHours > $hours) {
                Storage::disk('downloads')->delete($file);
            }
        }

        $count = count($files);
        if ($count > 0) {
            Log::channel('flush')->info(sprintf('Flushed %d files.', $count));
        }
    }
}
