<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \Interested\User::firstOrCreate(['email' => 'jill@harvard.edu']);
        $user->name = 'Jill';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');

        $user->address = '120 Allston Street, Boston';
        $user->phone_no = '123456789';
        $user->age = '25';

        $user->save();


        $user = \Interested\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
        $user->name = 'Jamal';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->address = '120 Waltham Street, Boston';
        $user->phone_no = '987654321';
        $user->age = '30';
        $user->save();

    }
}
