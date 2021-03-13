<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //factory(User::class,15)->create();
        DB::table('users')->insert([
            'firstname' => 'Junmar',
            'lastname' => 'Sales',
            'code' => 5001,
            'class_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
    }
}

