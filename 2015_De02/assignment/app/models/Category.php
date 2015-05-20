<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/05/2015
 * Time: 7:40 SA
 */

class Category  extends Eloquent{

    protected $table = 'category';


    public function addCategory($title){


        $tempUser = new User();
        $user = $tempUser->getUserByToken();

        if ($title == "")
        {
            return View::make('admin.addcategory', array('user' => $user, 'error_message' => "Tiêu đề không được để trống"));
        }
        else {

            $cat = Category::where('title',"=", strtolower($title))->first();

            if ($user == null){
                return Redirect::to('/');
            }
            else{
                if ($cat != null){
                    return View::make('admin.addcategory', array('user' => $user, 'error_message' => "Đã có chuyên mục này."));
                }
                else{

                    $newCat = new Category();
                    $newCat->title = $title;
                    $newCat->save();

                    return View::make('admin.addcategory', array('user' => $user, 'success_message' => "Chuyên mục ".$title." được thêm thành công"));
                }
            }


        }



    }


    public function removeCatById($id){
        Category::find($id)->delete();
    }
}