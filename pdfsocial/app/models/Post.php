<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/05/2015
 * Time: 7:39 SA
 */

class Post  extends Eloquent{

    protected $table = 'post';

    public function user(){
        return $this->belongsTo('User');
    }

    public function category(){
        return $this->belongsTo('Category');
    }

    public function addNewPost($title, $link, $content, $user_id, $cat_id){
        $newPost = new Post();
        $newPost->title = $title;
        $newPost->content = strip_tags($content);
        $newPost->user_id = $user_id;
        $newPost->cat_id = $cat_id;
        $newPost->link_file = $link;
        $newPost->save();
    }

    public function removePost($id){
        Post::find($id)->delete();
    }

    public function getPostById($id){
        return Post::where('id', "=", $id)->first();
    }

}