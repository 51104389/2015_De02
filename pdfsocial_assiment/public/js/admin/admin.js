function test(userId, catId) {
    $.ajax({
        url: '/admin/delete/category',
        type: "post",
        data: {'userId': userId, 'catId': catId},
        success: function (data) {
            window.location.reload();
        }
    });
}

function removeUser(adminId, userId) {
    var confirm = window.confirm('Bạn có chắc muốn xóa.');
    if (confirm) {
        $.ajax({
            url: '/admin/delete/user',
            type: "post",
            data: {'adminId': adminId, 'userId': userId},
            success: function (data) {
                window.location.reload();
            }
        });
    }
}

function removePost(adminId, postId){
    var confirm = window.confirm('Bạn có chắc muốn xóa.');
    if (confirm){
        $.ajax({
            url: '/admin/delete/post',
            type: "post",
            data: {'adminId': adminId, 'postId': postId},
            success: function (data) {
                //console.log(data);
                window.location.reload();
            }
        });
    }

}