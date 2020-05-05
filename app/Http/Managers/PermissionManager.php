<?php

namespace App\Http\Managers;

use App\Models\Permission;
use App\Models\PermissionGroup;

class PermissionManager
{
    public static function getPermission(){
        $permissions = PermissionGroup::with('Permission')->get();
        return $permissions;
    }

    public static function store($input){
        $permission = new Permission;
        
        $permission->permission_key = $input['permission_key'];
        $permission->permission_title = $input['permission_title'];
        $permission->group_id = $input['group_id'];
        $permission->save();

        return $permission;
    }
}
