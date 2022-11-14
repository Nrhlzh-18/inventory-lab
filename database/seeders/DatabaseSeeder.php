<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pengujian;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Desy Setiawati',
            'email'     => 'DesySetiawati@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'kepala'
        ]);

        User::create([
            'name'      => 'Eva Yusniawati',
            'email'     => 'EvaYusniawati@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'subag'
        ]);

        User::create([
            'name'      => 'Tidar Aryani',
            'email'     => 'TidarAryani@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'verifikator'
        ]);

        User::create([
            'name'      => 'Dian Purnamasari',
            'email'     => 'DianPurnamasari@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'analis'
        ]);

        User::create([
            'name'      => 'Rina Marlina',
            'email'     => 'RinaMarlina@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'analis'
        ]);

        User::create([
            'name'      => 'Dian Nuryana',
            'email'     => 'DianNuryana@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'analis'
        ]);

        User::create([
            'name'      => 'Inayah Ramadhita',
            'email'     => 'InayahRamadhita@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'analis'
        ]);

        User::create([
            'name'      => 'Donna Al Fitria',
            'email'     => 'DonnaAlFitria@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'analis'
        ]);

        Pengujian::create([
            'namaPengujian' => 'Air Bersih'
        ]);

        Pengujian::create([
            'namaPengujian' => 'Air Permukaan'
        ]);

        Pengujian::create([
            'namaPengujian' => 'Air Limbah'
        ]);

        Pengujian::create([
            'namaPengujian' => 'Udara Ambient'
        ]);
    }
}
