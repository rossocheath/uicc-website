<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = config('uicc.users');
        foreach ($userData as $data) {
            $user = User::where('email', '=', $data['email'])->first();
            if (empty($user)) {
                $data['password'] = Hash::make($data['password']);
                User::create($data);
            }
        }
    }
}
