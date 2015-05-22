<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/05/2015
 * Time: 7:39 SA
 */

class Comment  extends Eloquent{

    protected $table = 'comment';

    public function addNewComment($user_id, $post_id, $content){
        $newComment = new Comment();
        $newComment->user_id = $user_id;
        $newComment->post_id = $post_id;
        $newComment->content = strip_tags($content);
        $newComment->save();
    }

}