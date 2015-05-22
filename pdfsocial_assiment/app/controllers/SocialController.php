<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/05/2015
 * Time: 9:00 CH
 */
class SocialController extends BaseController
{

    public function home()
    {

        $tokenLogin = Session::get('TokenLogin');
        $user = User::where('token_login', $tokenLogin)->first();

        if ($user == null)
            return Redirect::to('/user/register');

        $t = DB::table('user')
            ->join('post', 'user.id', "=", 'post.user_id')
            ->join('category', 'post.cat_id', "=", "category.id")
            ->select('user.email', 'post.title', 'post.link_file', 'post.content', 'category.title as cat_title',
                'user.id as user_id', 'post.id as post_id', 'category.id as cat_id', 'post.created_at')
            ->get();


        return View::make("social.index",
            array('email' => $user->email, 'allCats' => Category::all(), 'allPosts' => $t));
    }

    public function showPostInCat()
    {
        $cat_id = Input::get('id');

        $tokenLogin = Session::get('TokenLogin');
        $user = User::where('token_login', $tokenLogin)->first();

        if ($user == null)
            return Redirect::to('/user/register');

        $t = DB::table('user')
            ->join('post', 'user.id', "=", 'post.user_id')
            ->join('category', 'post.cat_id', "=", "category.id")
            ->select('user.email', 'post.title', 'post.link_file', 'post.content', 'category.title as cat_title',
                'user.id as user_id', 'post.id as post_id', 'category.id as cat_id', 'post.created_at')
            ->where("category.id", "=", $cat_id)
            ->get();


        return View::make("social.index",
            array('email' => $user->email, 'allCats' => Category::all(), 'allPosts' => $t));
    }

    public function getFile()
    {
        $filename = Input::get('s');
        $path = storage_path() . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . $filename;

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; ' . $filename,
        ]);
    }

    public function getUser()
    {
        $user = User::where('token_login', "=", Session::get('token_login'));
        return $user->email;
    }

    public function showPost()
    {
        $tempUser = new User();
        $user = $tempUser->getUserByToken();

        if ($user == null)
            return Redirect::to('/user/register');

        $post_id = Input::get('id');
        $tempPost = new Post();
        //$post = $tempPost->getPostById($post_id);
        $post = DB::table('post')
            ->join('user', 'post.user_id', "=", 'user.id')
            ->where("post.id", "=", $post_id)
            ->select('post.content','post.title', 'post.id', 'post.link_file', 'user.email', 'post.created_at')
            ->first();

        if ($post == null) {
            return "File not found";
        } else {
            $t = DB::table('user')
                ->join('comment', "user.id", "=", "comment.user_id")
                ->where('comment.post_id', "=", $post->id)
                ->select('user.email', 'comment.content', 'comment.created_at')
                ->orderBy('comment.created_at', "DESC")
                ->get();
            return View::make('social.post',
                array('allCats' => Category::all(), 'post' => $post, 'comments' => $t, 'user_id' => $user->id,'email' => $user->email));
        }
    }

    public function postComment()
    {
        $data = Input::all();
        $tempUser = new User();
        $user = $tempUser->getUserById($data['userId']);
        $tempPost = new Post();
        $post = $tempPost->getPostById($data['postId']);
        if ($user == null || $post == null) {
            return Response::json(array('status' => "400"));
        } else {
            $tempComment = new Comment();
            $tempComment->addNewComment($data['userId'], $data['postId'], $data['content']);
            return Response::json(array('status' => "200"));
        }

    }
}