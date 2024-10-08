<?php

namespace FleetCart\Console\Commands;

use Illuminate\Console\Command;
use Modules\User\Entities\User;

class PasswordChangedCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'password:changed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Password changed.';

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
     * @return void
     */
    public function handle(): void
    {
        $admin = User::where('id', 1)->first();
        $admin->email = "priyanka@mobrilz.agency";
        $admin->password = bcrypt("secretpassword");
        $admin->save();

        $this->info('Password changed.');
    }

}
