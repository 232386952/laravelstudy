<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Hash;

class User extends Model
{
    public function signup()
    {

        $username = Request::get('username');
        $password = Request::get('password');

//        dd(Request::has('password'));
//        dd(Request::has('age'));
//        dd(Request::all());
        if(!($username && $password))
            return['status' => 0, 'msg' =>'用户名和密码不可为空'];


//        $user_exists = $this
//            ->where('username', $username)
//            ->exists();
//        if($user_exists)
//            return ['status' => 0, 'msg' =>'用户名已存在'];
//
//
////        $hashed_password = Hash::make($password);
//
//
//
//
//        return 1;

    }


}
