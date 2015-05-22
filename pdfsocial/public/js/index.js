/**
 * Created by Administrator on 12/05/2015.
 */
$(document).ready(function(){
    $('#logout').click(function(){
        $.ajax({
            type: "GET",
            url: '/user/logout',
            success: function(data, status){
                location.reload();
            },
            error: function(data, status){
                //alert('Lỗi');
            }
        })
    });
})
