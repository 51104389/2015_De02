<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/05/2015
 * Time: 9:00 CH
 */

class SocialController extends BaseController{

    public function home(){

        $tokenLogin = Session::get('TokenLogin');
        $user = User::where('token_login', $tokenLogin)->first();

        if ($user == null)
            return Redirect::to('/user/register');

        return View::make("social.general", array('email' => $user->email));
    }

    public function getFile(){
        $filename = Input::get('s');
        $path = storage_path().DIRECTORY_SEPARATOR.$filename;

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.$filename,
        ]);
    }

    public function getUser(){
        $user = User::where('token_login', "=", Session::get('token_login'));
        return $user->email;
    }


}