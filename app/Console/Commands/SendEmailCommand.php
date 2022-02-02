<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test {name?*} {--queue=default//}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->argument('name');
        //$this->info($this->argument('name') ?? 'no arg');

//        $ans = $this->ask('What?');
//        $this->info($ans);

        $ans = $this->secret('What?');
        $this->info($ans);

        return Command::SUCCESS;
    }
}
