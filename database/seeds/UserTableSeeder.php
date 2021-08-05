<?php


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'johnkennethlopez.lnsinterns@gmail.com')->first();
        
        if (!$user){
            User::create([
                'name' => 'John Kenneth Lopez',
                'email' => 'johnkennethlopez.lnsinterns@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    
    
    }



}
