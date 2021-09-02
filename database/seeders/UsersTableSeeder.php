<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();
//        DB::table('users')->truncate();
        DB::table('role_users')->truncate();

        $superRole = Role::where('name','super_admin')->first();
//        $userRole = Role::where('name','user')->first();

//        $carbo = Carbon::now()->getTimestamp();
//        $date = Str::substr($carbo.'',0,strlen($carbo.'')/2);
////        dd($date);
//        $str = Str::replaceArray($date,[$date.'1'],$carbo.'');
        $super = User::create([
            'civilite' => 'Mr',
            'nom' => 'Nabil',
            'prenom' => 'Marouan',
            'email' => 'tamkine@gmail.com',
            'password' => Hash::make('tamkine@gmail.com'),
            'slug' => Str::slug(Str::lower('Nabil Marouan')),
        ]);
//        $carbo = Carbon::now()->getTimestamp();
//        $date = Str::substr($carbo.'',0,strlen($carbo.'')/2);
//        $str = Str::replaceArray($date,[$date.'2'],$carbo.'');
//        $user = User::create([
//            'username' => 'Generic User',
//            'first_name' => 'Generic',
//            'last_name' => 'User',
//            'email' => 'user@user.com',
//            'password' => Hash::make('password'),
//            'slug' => Str::slug(Str::lower('Generic User')).'-'.$str,
//        ]);

        $super->roles()->attach($super);
//        $user->roles()->attach($user);
    }
}
