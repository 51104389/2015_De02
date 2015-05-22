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

        $tempUser = new User();
        $user = $tempUser->getUserByToken();
        if ($user == null){
            Session::forget('TokenLogin');
            Session::forget('name');
            Session::forget('email');
            return View::make('user.register', array('title' => 'register'));
        }
        else{
            return Redirect::to('/');
        }
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

    public function viewFormArticle(){

        $tempUser = new User();
        $user = $tempUser->getUserByToken();
        $email = "";
        if ($user != null){
            $email = $user->email;
            return View::make('user.article', array('allCats' => Category::all(), 'email' => $email, 'user' => $user));
        }
        else{
            return Redirect::to('/');
        }


    }

    public function addArticle(){

        $tempUser = new User();
        $user = $tempUser->getUserByToken();
        $email = "";



        $title = Input::get('title');
        $cat_id = Input::get('catId');
        $content = Input::get('content');


        if (!Input::hasFile('pdf'))
        {
            if ($user != null){
                $email = $user->email;
                return View::make('user.article', array('allCats' => Category::all(), 'email' => $email, 'user' => $user, 'error_message' => "Chưa chọn file"));
            }
            else{
                return Redirect::to('/');
            }
        }
        else if (Input::file('pdf')->getClientOriginalExtension() != 'pdf'){
            if ($user != null){
                $email = $user->email;
                return View::make('user.article', array('allCats' => Category::all(), 'email' => $email, 'user' => $user, 'error_message' => "File tải lên không phải pdf"));
            }
            else{
                return Redirect::to('/');
            }
        }
        else if ($title == "" || $content == ""){
            if ($user != null){
                $email = $user->email;
                return View::make('user.article', array('allCats' => Category::all(), 'email' => $email, 'user' => $user, 'error_message' => "Không được để trống trường nào"));
            }
            else{
                return Redirect::to('/');
            }
        }
        else{
            $name = Input::file('pdf')->getClientOriginalName();
            Input::file('pdf')->move('app/storage/file', $name);

            $tempPost = new Post();
            $tempPost->addNewPost($title, $name, $content, $user->id, $cat_id);
            return View::make('user.article', array('allCats' => Category::all(), 'email' => $email, 'user' => $user, 'success_message' => "Thêm bài viết mới thành công"));
        }



    }

}