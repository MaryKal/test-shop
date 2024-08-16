<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all commands for project setup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!file_exists(config('database.connections.sqlite.database'))) {

            file_put_contents(config('database.connections.sqlite.database'), '');

        }

        Artisan::call('env:decrypt', [
            '--key' => 'base64:y0rXT6ess8vqkO6KtEcbPN/7tsz60y4od1QYxu3Txmk=',
        ]);

        Artisan::call('migrate:fresh --seed');

        $token = User::find(1)->createToken(Str::random())->plainTextToken;


    }
}
