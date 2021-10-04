<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'vendor module','product module','accessory module','asset module','employee module','user module','report module','create vendor','view vendor','edit vendor','delete vendor','create product','view product','edit product','delete product','create accessory','view accessory','edit accessory','delete accessory','create asset','view asset','edit asset','delete asset','create employee','view employee','edit employee','delete employee','create user','edit user','delete user','create role','edit role','delete role','edit profile','view notification','edit settings','view dashboard'
         ];
    
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
