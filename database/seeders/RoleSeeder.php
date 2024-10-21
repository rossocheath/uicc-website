<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleData = config('uicc.roles');
        foreach ($roleData as $data) {
            $role = Role::where('name', '=', $data['name'])->first();
            if (empty($role)) {
                $data['detail'] = $data['detail'];
                Role::create($data);
            }
        }
    }
}
