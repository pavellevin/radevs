<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Hash;
use DB;


class UserRepository
{
    public function all()
    {
        return User::orderBy('id','DESC')->paginate(5);
    }

    public function getRoles()
    {
        return Role::pluck('name','name');
    }

    public function create($request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return true;
    }

    public function delete($user)
    {
        return $user->delete();
    }

    public function update($request, $user)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));
    }

    public function getRolesForUser($user)
    {
        return $user->roles->pluck('name','name')->all();
    }
}
