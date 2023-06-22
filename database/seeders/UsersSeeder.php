<?php

namespace Database\Seeders;

use App\Models\Promotor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('users')->insert(['email' => 'admin@joseito.com','name' => 'Admin','password' => Hash::make('admin123')]);*/

        //1
        User::create(['name'=>'Admin','email'=>'administrador@joseito.com','rol'=>'administrador','estado'=>'a','password'=>Hash::make('admin123')]);

        //2
        User::create(['name'=>'Auxiliar','email'=>'auxiliar@joseito.com','rol'=>'auxiliar','estado'=>'a','password'=>Hash::make('auxiliar123')]);
        //3
        User::create(['name'=>'promotor','email'=>'promotor@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('promotor123')]);

        //4
        User::create(['name'=>'Admin','email'=>'admin@admin.com','rol'=>'administrador','estado'=>'a','password'=>Hash::make('admin123')]);

        //5
        User::create(['name'=>'Susana','email'=>'susana@auxiliar.com','rol'=>'auxiliar','estado'=>'a','password'=>Hash::make('susana123')]);
        //6
        User::create(['name'=>'Despacho','email'=>'despacho@auxiliar.com','rol'=>'auxiliar','estado'=>'a','password'=>Hash::make('despacho123')]);
        //7
        User::create(['name'=>'Oficina','email'=>'oficina@auxiliar.com','rol'=>'auxiliar','estado'=>'a','password'=>Hash::make('oficina123')]);

        //8
        User::create(['name'=>'Richard','email'=>'richard@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('richard123')]);
        //9
        User::create(['name'=>'Wilmar','email'=>'wilmar@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('wilmar123')]);
        //10
        User::create(['name'=>'Consuelo','email'=>'consuelo@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('consuelo123')]);
        //11
        User::create(['name'=>'Fanny','email'=>'fanny@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('fanny123')]);
        //12
        User::create(['name'=>'Melisa','email'=>'melisa@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('melisa123')]);
        //13
        User::create(['name'=>'Jose luis','email'=>'joseluis@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('joseluis123')]);
        //14
        User::create(['name'=>'Modesto','email'=>'modesto@joseito.com','rol'=>'promotor','estado'=>'a','password'=>Hash::make('modesto123')]);

    }
}
