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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('111111'),
            'remember_token' => str_random(10),
            'family_id'=>'1',
        ]);

        factory(App\User::class, 20)->create();
    }
}
