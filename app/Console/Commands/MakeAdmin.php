<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {domain} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @return int
     */
    public function handle(): int
    {

        if (Admin::exists()) {
            $password = $this->argument('password');
            $domain = $this->argument('domain');

            Admin::create([
                'username' => 'admin@' . $domain,
                'superadmin' => 1,
                'password' => Hash::make($password)
            ]);
        }



        return 0;
    }
}
