<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    public $emailPattern = "/^[a-zA-Z0-9\_\.]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";

    public $passwordPattern = "/^[a-zA-Z0-9_]+$/";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');


    public function posts()
    {

        //get all post of this user
        return $this->hasMany('post', 'user_id');
    }


    public function createNewUser($email, $password, $rePassword)
    {
        if ($email == "")
            return View::make('user.register', array(
                'title' => 'register',
                'message' => "* Email không được để trống",
                'oldEmail' => $email,
                'oldPassword' => $password
            ));


        else if (!preg_match($this->emailPattern, $email)) {
            return View::make('user.register', array(
                'title' => 'register',
                'message' => "* Email không đúng định dạng",
                'oldEmail' => $email,
                'oldPassword' => $password
            ));
        } else if (strlen($password) < 6)
            return View::make('user.register', array(
                'title' => 'register',
                'message' => "* Mật khẩu quá ngắn, ít nhất 6 kí tự",
                'oldEmail' => $email,
                'oldPassword' => $password
            ));


        else if (!preg_match($this->passwordPattern, $password)) {
            return View::make('user.register', array(
                'title' => 'register',
                'message' => "* Mật khẩu không đúng định dạng",
                'oldEmail' => $email,
                'oldPassword' => $password
            ));
        } else if ($password != $rePassword)
            return View::make('user.register', array(
                'title' => 'register',
                'message' => "* Hai mật khẩu không khớp",
                'oldEmail' => $email,
                'oldPassword' => $password
            ));

        else {
            $user = User::where('email', '=', $email)->first();
            if ($user != null) {
                return View::make('user.register', array(
                    'title' => 'register',
                    'message' => "* Email đã tồn tại",
                    'oldEmail' => $email,
                    'oldPassword' => $password
                ));
            } else {
                $user = new User;
                $user->email = $email;
                $user->password = md5($password);
                $user->save();

                return View::make('user.successRegister');
            }
        }

    }

    public function getUserByToken(){

        return User::where('token_login', '=', Session::get('TokenLogin'))->first();

    }


    public function updateInfo($address, $phone, $name){

        $user = User::where("token_login", "=", Session::get('TokenLogin'))->first();

        if ($user != null){
            //print_r($user);
            $user->address = strip_tags($address);
            $user->phone = strip_tags($phone);
            $user->name = strip_tags($name);
            $user->save();
            return true;
        }
        else{
            return false;
        }


    }


    public function changePassword($newPassword){
        $user = User::where("token_login", "=", Session::get('TokenLogin'))->first();

        if ($user != null){
            //print_r($user);
            $user->password = md5($newPassword);
            $user->save();
            return true;
        }
        else{
            return false;
        }
    }



    public function getUserByEmailPassword($email, $password){
        return User::where("email", "=", $email)->where("password", "=", md5($password))->first();
    }

    public function getUserById($id){
        return User::where("id", "=", $id)->first();
    }

    public function removeUserById($id){
        User::find($id)->delete();
    }

    public function addNewUserByAdmin($email, $password, $role){
        $newUser = new User();
        $newUser->email = $email;
        $newUser->password == $password;
        $newUser->role = $role;
        $newUser->save();
    }

}
