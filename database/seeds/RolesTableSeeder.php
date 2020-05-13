<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->save();

        $user = new Role();
        $user->name = 'User';
        $user->save();

        $subscriber = new Role();
        $subscriber->name = 'Subscriber';
        $subscriber->save();
    }
}
