<?php


namespace CryptaEve\Seat\SquadSync\Console;

use Illuminate\Console\Command;
use CryptaEve\Seat\SquadSync\Models\Sync;

/**
 * Class Synchronise.
 *
 * @package CryptaEve\Seat\SquadSync\Console
 */
class Synchronise extends Command
{

     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'squadsync:sync {sync_name? : Optional sync name to update}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'synchoronise all "sync" definitions';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $syncs = Sync::all()
            ->when($this->argument('sync_name'), function ($syncs) {

                return $syncs->where('name', $this->argument('sync_name'));
            })
            ->each(function ($sync) {

                $this->info($sync->name);
            });

    }

}