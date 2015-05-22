/**
 * Created by Administrator on 12/05/2015.
 */


function postComment(userId, postId) {
    if ($("#comment-input").val() != "") {
        var config = {'userId': userId, 'postId': postId, 'content': $("#comment-input").val()};
        console.log(config);
        $.ajax({
            url: '/social/comment',
            type: "post",
            data: config,
            success: function (data) {
                if (data.status == 200){
                    window.location.reload();
                }
                else{
                    console.log("hello world");
                }
            }
        });
    }
}