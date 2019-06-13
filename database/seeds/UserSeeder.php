<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = '2fellows';
        $user->email = 'admin@2fellows.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('root');
        $user->tel = '00000000';
        $user->position = 'dev';
        $user->permission = 'admin';
        $user->save();
    }
}
