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
            
            'name' => 'Super Admin',
            'email' => 'nahorr@gmail.com',
            'password' => bcrypt('123456'),
            'registration_code' => 'nnamdico',
            'is_admin' => 1,
            'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
            
            
            
        ]);
    }
}
