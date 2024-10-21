<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

return [
    /**
     * set the default status that all messages will have when received.
     */
    'users' => [
        [
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => '11112222',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Admin',
            'email' => 'admin1@admin.com',
            'role_id' => 2,
            'password' => '11112222',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'User',
            'email' => 'User@gmail.com',
            'role_id' => 3,
            'password' => '11112222',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ],
    'roles' => [
        [
            'name' => 'Super Admin',
            'detail' => 'for admin',
        ],
        [
            'name' => 'Admin',
            'detail' => 'for admin',
        ],
        [
            'name' => 'User',
            'detail' => 'for user',
        ],
    ],
    'banner_type' => [
      [
          'name' => 'Home',
      ],
        [
            'name' => 'Event',
        ],
        [
            'name' => 'Blog',
        ],
        [
            'name' => 'About',
        ],
        [
            'name' => 'Service',
        ],
        [
            'name' => 'Industry Partner',
        ],
        [
            'name' => 'Career',
        ],
        [
            'name' => 'Contact',
        ],
    ],
];
