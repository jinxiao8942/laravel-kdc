<?php

class UserTableSeeder extends DatabaseSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'ricardovxuk@gmail.com',
            'password' => Hash::make('dmeipt.00'),
            'active' => 1
            ));
    }

}
