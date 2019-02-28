<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'petar';
        $user->email = 'petar@petar.com';
        $user->password = Hash::make('petar');
        $user->subscribed = 1;
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        
        $user = new User();
        $user->name = 'sam';
        $user->email = 'sam@sam.com';
        $user->password = Hash::make('sam');
        $user->subscribed = 0;
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        
        $user = new User();
        $user->name = 'john';
        $user->email = 'john@john.com';
        $user->password = Hash::make('john');
        $user->subscribed = 0;
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
    }
}
