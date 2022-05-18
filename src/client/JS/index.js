$(function(){
    $.ajax({
        method:'GET',
        url:'../../server/Controllers/posts.php',
        success:function(response){
            console.log(response);
            if (response){
                $('#content').html(response);
            }
        },
        error:function(response){
            console.log(response);
        }
    });
});