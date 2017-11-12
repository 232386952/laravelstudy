<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Hash;

class User extends Model
{
    //
//    public $table = 'user_table';
      public function signup()
      {

          if(!$this->has_usernam_and_password())
              return ['status' => 0, 'msg' => '用户名和密码皆不可为空'];



         $user_exists = $this
             ->where('username', $username)
             ->exists();

         if($user_exists)
             return ['status' => 0, 'msg' => '用户名已存在'];



         $hashed_password = Hash::make($password);

         $user = $this;
         $user->password = $hashed_password;
         $user->username = $username;
         if($user->save())

             return ['status' => 1, 'id' => $user->id];
         else
             return ['status' => 0, 'msg' => 'db insert failed'];


      }


      public  function login()
      {
          $this->has_usernam_and_password();

      }



      public function has_usernam_and_password()
      {
          $username = Request::get('username');
          $password = Request::get('password');
         if($username && $password)
             return [$username, $password];
         return false;
      }


}
