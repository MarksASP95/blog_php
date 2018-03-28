$(document).ready(function(){

    var data = {};

    $("#new_post_form").on('submit',function(){

        $(this).find('[name]').each(function(){
        
            var actualElm = $(this);
            var name = actualElm.attr('name');
            data[name] = actualElm.val();
        });
    
        $.ajax({
            url: 'new_post.php',
            type: 'post',
            dataType:'text',
            data: data,
            success:function(response){
                if(response === "Success"){
                    alert("Your post is public!");
                }
                else{
                    console.log(response);
                }
                console.log(response);
            }
        });

        return false;
    });
});