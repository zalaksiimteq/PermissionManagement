<?php

namespace App\Http\Managers;

use App\Models\Permission;
use App\Models\PermissionGroup;

class PermissionManager
{
    public static function getPermission(){
        $permissions = Permission::get()->groupBy('group_id');
        $permission_arr = array();
        $i = 0;
        foreach ($permissions as $key => $permission){
            $permission_group = PermissionGroup::find($key);
            $permission_arr[$i]['name'] = $permission_group->name;
            $permission_arr[$i]['permission_group_id'] = $key;
            foreach($permission as $p_key => $permission_val) {
                $permission_arr[$i]['detail'][$p_key]['permission_title'] = $permission_val->permission_title; 
                $permission_arr[$i]['detail'][$p_key]['permission_key'] = $permission_val->permission_key; 
            }
            $i++;
        }
        return $permission_arr;
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
