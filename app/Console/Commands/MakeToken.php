<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate api token';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $escaped = preg_quote('='.$this->laravel['config']['app.token'], '/');


        file_put_contents($this->laravel->environmentFilePath(), preg_replace(
            "/^APP_TOKEN{$escaped}/m",
            'APP_TOKEN='. Str::random(32),
            file_get_contents($this->laravel->environmentFilePath())
        ));

        $this->info('Api Token generated successfully.');

        return true;
    }
}
