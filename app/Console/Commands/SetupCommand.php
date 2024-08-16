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
        Artisan::call('env:decrypt', [
            '--key' => 'base64:7SwevmTpXwD5rm9gJhoP3e3N0vohO0KPNd1ibj1SutM='
        ]);

        Artisan::call('migrate:fresh --seed');

        $token = User::find(1)->createToken(Str::random())->plainTextToken;

        $this->info('Token: ' . $token);

    }
}
