<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/05/2015
 * Time: 10:46 SA
 */

class AdminController extends BaseController {
    private $emailPattern = "/^[a-zA-Z0-9\_\.]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";

    private $passwordPattern = "/^[a-zA-Z0-9_]+$/";

    public function randomToken($length){
        return substr( md5(rand()), 0, $length);
    }

    public function homepage(){

        $temp = new User();


        $user = $temp->getUserByToken();

        if ($user == null){
            return View::make('admin.login');
        }
        else if ($user->role == 1){
            return View::make('admin.index', array('email' => $user->email));
        }
        else{
            return "Không phải admin, ko có quyền truy cập trang này";
        }

    }

    public function viewFormLogin(){

        return View::make('admin.login');

    }


    public function login(){

        $email = Input::get('email');
        $password = Input::get('password');

        $temp = new User();

        if ($email == ""){
            return View::make('admin.login', array('error_message' => "* Email không được để trống"));
        }
        else if ($password == ""){
            return View::make('admin.login', array('error_message' => "* Mật khẩu không được để trống"));
        }
        else {
            $user = $temp->getUserByEmailPassword($email, $password);
            if ($user == null){
                return View::make('admin.login', array('error_message' => "* Email hoặc mật khẩu không đúng"));
            }
            else if ($user->role != 1){
                return View::make('admin.login', array('error_message' => "* Bạn không có quyền truy cập trang này"));
            }
            else{
                $token = $this->randomToken(30);
                $user->token_login = $token;
                $user->save();
                Session::forget('TokenLogin');
                Session::put('TokenLogin', $token);
                Session::forget('Email');
                Session::put('Email', $user->email);


                return Redirect::to('/admin');
            }
        }


    }




    public function viewAddCategory(){

        $temp = new User();
        $user = $temp->getUserByToken();
        if ($user == null){
            return View::make('admin.login');
        }
        else{
            return View::make('admin.addcategory');
        }
    }

    public function addCategory(){

        $title = Input::get('category');

        $temp = new Category();

        return $temp->addCategory($title);

    }

    public function viewControlCategory(){

        $temp = new User();
        $user = $temp->getUserByToken();
        if ($user == null){
            return View::make('admin.login');
        }
        else{
            $allCats = Category::all();
            return View::make('admin.controlcategory', array('allCats' => $allCats, 'user'=>$user));
        }

    }


    public function logout(){

        $temp = new User();
        $user = $temp->getUserByToken();
        if ($user == null){
            return View::make('admin.login');
        }
        else{

            $user->token_login = "";
            $user->save();
            Session::forget('TokenLogin');
            Session::forget('Email');
            return Redirect::to('/admin/login');
        }
    }


    public function removeCategory(){
        if (Request::ajax()){
            $data = Input::all();
            $tempUser = new User();
            $user = $tempUser->getUserById($data['userId']);

            if ($user == null){
                return Response::json(array('status' => "404"));
            }
            else if ($user->role != 1){
                return Response::json(array('status' => "401"));
            }
            else {
                $tempCat = new Category();
                $tempCat->removeCatById($data['catId']);
                return Response::json(array('status' => '200'));
            }
        }
    }


    public function viewControlUser(){

        $temp = new User();
        $user = $temp->getUserByToken();
        if ($user == null){
            return View::make('admin.login');
        }
        else{
            $allCats = Category::all();
            return View::make('admin.controluser', array('allUsers' => User::all(), 'admin' => $user));
        }

    }


    public function removeUser(){
        if (Request::ajax()){
            $data = Input::all();
            $tempUser = new User();
            $user = $tempUser->getUserById($data['adminId']);

            if ($user == null){
                return Response::json(array('status' => "404"));
            }
            else if ($user->role != 1){
                return Response::json(array('status' => "401"));
            }
            else {
                $tempUser->removeUserById($data['userId']);
                return Response::json(array('status' => '200'));
            }
        }


    }

    public function viewAddUser(){

        return View::make('admin.adduser');

    }

    public function addUser(){
        $email = Input::get('email');
        $password = Input::get('password');
        $rePassword = Input::get('rePassword');
        $role = Input::get('role');

        if ($email == "" || $password == "" || $rePassword == ""){
            return View::make('admin.adduser', array('error_message' => "Không được để trống trường nào"));
        }
        else if (!preg_match($this->emailPattern, $email)){
            return View::make('admin.adduser', array('error_message' => "Email không đúng"));
        }
        else if (!preg_match($this->passwordPattern, $password)){
            return View::make('admin.adduser', array('error_message' => "Mật khẩu không đúng"));
        }
        else if ($password != $rePassword){
            return View::make('admin.adduser', array('error_message' => "2 mật khẩu không khớp"));
        }
        else if (strlen($rePassword) < 6){
            return View::make('admin.adduser', array('error_message' => "Mật khẩu ít nhất 6 kí tự"));
        }
        else if ($role != 0 && $role != 1){
            return View::make('admin.adduser', array('error_message' => "Quyền không đúng"));
        }
        else{
            $tempUser = new User();
            $tempUser->addNewUserByAdmin($email, $password, $role);
            return View::make('admin.adduser', array('success_message' => "Đã tạo người dùng thành công." ));
        }
    }

}