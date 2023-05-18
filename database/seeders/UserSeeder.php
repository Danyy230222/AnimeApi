<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Hector Daniel Niño Nieto',
            'email'=>'hector.nino@unach.mx',
            'password'=>bcrypt('Danyyhec961$'),
        ]);
    }
}
