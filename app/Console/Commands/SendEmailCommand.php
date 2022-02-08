<?php

namespace App\Console\Commands;

use App\Mail\BingoMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:test {name} {--queue=default//}';
    protected $signature = 'command:email {userId} {text}';

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
        //$this->argument('name');
        //$this->info($this->argument('name') ?? 'no arg');

//        $ans = $this->ask('What?');
//        $this->info($ans);

        //$ans = $this->secret('What?');
        //$this->info($ans);

        $userId = $this->argument('userId');
        $text = $this->argument('text');
        $user = User::find($userId);

        $this->info($user->email);
        Mail::to($user->email)
            ->send(new BingoMail($user->name, $text));

        return Command::SUCCESS;
    }
}
