<?php

namespace App\Console\Commands;

use Bouncer;
use DB;
use Illuminate\Console\Command;
use Str;

class InspectBouncerQuery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspect:bouncer-query';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inspects the query executed by Bouncer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        auth()->loginUsingId(1);

        DB::enableQueryLog();

        dump(Bouncer::can('whatever'));

        collect(DB::getQueryLog())
            ->map(fn ($log) => Str::replaceArray('?', $log['bindings'], $log['query']))
            ->dump();
    }
}
