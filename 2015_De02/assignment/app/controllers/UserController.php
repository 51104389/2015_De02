<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends BaseController {



    public $emailPattern = "/^[a-zA-Z0-9\_\.]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";

    public $passwordPattern = "/^[a-zA-Z0-9_]+$/";

    /**
     * Show the profile for the given user.
     */
    public function randomToken($length){
        return substr( md5(rand()), 0, $length);
    }

    public function showProfile($id = null)
    {
        $names = [];
        for ($i = 0; $i < $id; $i++){
            array_push($names, 'ss'.$i);
        }
        
        return View::make('index', array('name' => 1));
    }



    public function login(){
        $email = Input::get('emailLogin');
        $password = Input::get('passwordLogin');

        if ($email == ""){
            return View::make('user.register',
                array(
                    'loginMessage' => "* Email không được để trống"
                ));
        }

        if (!preg_match($this->emailPattern, $email)){
            return View::make('user.register',
                array(
                    'loginMessage' => "* Email không đúng định dạng"
                ));
        }

        if ($password == ""){
            return View::make('user.register',
                array(
                    'loginMessage' => "* Mật khẩu không được để trống"
                ));
        }

        if (!preg_match($this->passwordPattern, $password)){
            return View::make('user.register',
                array(
                    'loginMessage' => "* Mật khẩu không đúng định dạng"
                ));
        }

        $user = User::where("email", $email)
            ->where("password", md5($password))
            ->first();
        if ($user == null){
            return View::make('user.register',
                array(
                    'loginMessage' => "* Tài khoản không tồn tại"
                ));
        }



        $user->token_login = $this->randomToken(30);
        $user->save();


        Session::put('TokenLogin', $user->token_login);

        return Redirect::to('/');

    }

    public function loginForm(){
        return View::make('user.login', array('title' => "login"));

    }

    public function registerForm(){

        $tokenLogin = Session::get('TokenLogin');
        if ($tokenLogin != null)
            return Redirect::to('/');
        return View::make('user.register', array('title' => 'register'));
    }


    public function register(){
        $email = Input::get('email');
        $password = Input::get('password');
        $rePassword = Input::get('repassword');


        $temp = new User();


        return $temp->createNewUser($email, $password, $rePassword);
    }


    public function logout(){
        Session::remove("TokenLogin");
        return Redirect::to('/');
    }


    public function viewInfoForm(){
        $token = Session::get('TokenLogin');

        $user = User::where('token_login', $token)->first();
        $email = "";
        if ($user != null){
            $email = $user->email;
            return View::make('user.info', array('email' => $email, 'user' => $user));
        }
        else{
            return Redirect::to('/');
        }

    }

    public function changeUserInfo(){
        $name = Input::get('name');
        $address = Input::get('address');
        $phone = Input::get('phone');


        $temp = new User();
        if ($temp->updateInfo($address, $phone, $name)){
            $token = Session::get('TokenLogin');
            $user = User::where('token_login', $token)->first();
            if ($user != null){
                $email = $user->email;
                return View::make('user.info', array('success_message' => "Thay đổi thành công", 'email' => $email, 'user' => $user));
            }
            else {
                return Redirect::to('/');
            }
        }
        else{
            return View::make('user.info', array('error_message' => "Lỗi"));
        }




    }


    public function viewFormChangePassword(){
        $token = Session::get('TokenLogin');

        $user = User::where('token_login', $token)->first();
        $email = "";
        if ($user != null){
            $email = $user->email;
            return View::make('user.changepassword', array('email' => $email, 'user' => $user));
        }
        else{
            return Redirect::to('/');
        }
    }


    public function changeUserPassword(){
        $oldPassword = Input::get('old_password');
        $newPassword = Input::get('new_password');
        $reNewPassword = Input::get('re_new_password');

        $temp = new User();
        $user = User::where('token_login', '=', Session::get('TokenLogin'))->first();

        if ($user == null){
            return Redirect::to('/');
        }
        else{
            if ($user->password != md5($oldPassword)){
                return View::make('user.changepassword', array('email' => $user->email, 'user' => $user, 'error_message'=>"Mật khẩu cũ không đúng"));
            }
            else if ($newPassword != $reNewPassword){
                return View::make('user.changepassword', array('email' => $user->email, 'user' => $user, 'error_message'=>"2 mật khẩu mới không khớp"));
            }
            else if (!preg_match($this->passwordPattern, $newPassword)){
                return View::make('user.changepassword', array('email' => $user->email, 'user' => $user, 'error_message'=>"Mật khẩu mới không đúng định dạng"));
            }
            else {
                if ($temp->changePassword($newPassword)){
                    return View::make('user.changepassword', array('email' => $user->email, 'user' => $user, 'success_message'=>"Đổi mật khẩu thành công"));
                }
                else{
                    return View::make('user.changepassword', array('email' => $user->email, 'user' => $user, 'error_message'=>"Không thành công"));
                }
            }

        }



    }



}