<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'npm'   => '123456789',
            'password' => bcrypt('12345678'),
        ];
        User::create($user); 
        $user = [
            'name' => 'dosen',
            'email' => 'dosenwaliadmin@gmail.com',
            'npm'   => '123456789',
            'role' => 'dosen',
            'password' => bcrypt('bapsi1234'),
        ];


        User::create($user);

        $user = [
            'name' => 'pembimbing',
            'email' => 'pembimbing@gmail.com',
            'npm'   => '123456789',
            'role' => 'dosen',
            'password' => bcrypt('pembimbing123'),
        ];
       

        $user = [
            'name' => 'pembimbing',
            'email' => 'pembimbing@gmail.com',
            'npm'   => '123456789',
            'role' => 'dosen',
            'password' => bcrypt('pembimbing123'),
        ];


        User::create($user);
       
        // DB::table('mata_kuliah')->insert([
        //     'kode_matkul' => '14025',
        //     'nama_matkul' => 'pemograman berbasis web',
        //     'sks' => '2',
        // ]);
        // DB::table('mata_kuliah')->insert([
        //     'kode_matkul' => '14029',
        //     'nama_matkul' => 'object oriented programming',
        //     'sks' => '4',
        // ]);

        // DB::table('mata_kuliah')->insert([
        //     'kode_matkul' => '14090',
        //     'nama_matkul' => 'data scients',
        //     'sks' => '3 ',
        // ]);
    }
   
}
