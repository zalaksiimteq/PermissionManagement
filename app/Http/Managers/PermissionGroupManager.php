<?php

namespace App\Http\Managers;

use App\Models\PermissionGroup;

class PermissionGroupManager
{
    public static function getPermissionGroup(){
        $permission_groups = PermissionGroup::get();
        return $permission_groups;
    }

    public static function store($input){
        $permission_group = new PermissionGroup;
        
        $permission_group->name = $input['name'];
        $permission_group->save();

        return $permission_group;
    }

    public static function update($input, $id){
        $permission_group = PermissionGroup::find($id);
        
        $permission_group->name = $input['name'];
        $permission_group->save();

        return $permission_group;
    }
}
