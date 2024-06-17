<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanUpEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct(); 
    }
    public function handle()
    {
        DB::delete(
            "DELETE FROM events WHERE dates_end < NOW() OR (dates_end IS NULL AND dates_begin < NOW())"
        );
        $this->info('Прошедшие мероприятия удалены');
    }
}
