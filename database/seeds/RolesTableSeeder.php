<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            1 => ['superadmin', 100],
            2 => ['admin', 60],
            3 => ['owner', 50],
            4 => ['manager', 40],
            5 => ['workadmin', 30],
            6 => ['moderator', 20],
            8 => ['user', 5],
            9 => ['unverified', 1],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $key => $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem[0])->first();
            if ($newRoleItem === null) {
                DB::table('roles')->insert([
                    'id' => $key,
                    'name' => $RoleItem[0],
                    'slug' => $RoleItem[0],
                    'description' => $RoleItem[0] . ' role',
                    'level' => $RoleItem[1],
                ]);
            }
        }

        $roles = [
            1 => ['superadmin', 'admin', 'owner', 'manager', 'workadmin', 'moderator', 'worker', 'user'],
            2 => ['admin'],
            12 => ['owner', 'manager', 'workadmin'],
            20 => ['worker'],
            23 => ['worker'],
        ];

        foreach ($roles as $id => $roleArr) {
            $user = config('roles.models.defaultUser')::find($id);
            foreach ($roleArr as $rolename) {
                $role = config('roles.models.role')::where('name', '=', $rolename)->first();
                $user->attachRole($role);
            }
        }

    }
}
