<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'package_setting_create',
            ],
            [
                'id'    => 18,
                'title' => 'package_setting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'package_setting_show',
            ],
            [
                'id'    => 20,
                'title' => 'package_setting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'package_setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'setting_access',
            ],
            [
                'id'    => 23,
                'title' => 'level_setting_edit',
            ],
            [
                'id'    => 24,
                'title' => 'level_setting_show',
            ],
            [
                'id'    => 25,
                'title' => 'level_setting_access',
            ],
            [
                'id'    => 26,
                'title' => 'admin_wallet_create',
            ],
            [
                'id'    => 27,
                'title' => 'admin_wallet_edit',
            ],
            [
                'id'    => 28,
                'title' => 'admin_wallet_show',
            ],
            [
                'id'    => 29,
                'title' => 'admin_wallet_access',
            ],
            [
                'id'    => 30,
                'title' => 'general_setting_edit',
            ],
            [
                'id'    => 31,
                'title' => 'general_setting_show',
            ],
            [
                'id'    => 32,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 33,
                'title' => 'cash_wallet_show',
            ],
            [
                'id'    => 34,
                'title' => 'cash_wallet_access',
            ],
            [
                'id'    => 35,
                'title' => 'mining_wallet_access',
            ],
            [
                'id'    => 36,
                'title' => 'bonus_wallet_access',
            ],
            [
                'id'    => 37,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
