$(document).ready(function(){
    $("#incorrect").hide();

    $("#myForm").on('submit', function(){
    
        var data = {};
    
        $(this).find('[name]').each(function(index, value){
            var actualElm = $(this);
            var name = actualElm.attr('name');
            var elmValue = actualElm.val();
            
            data[name] = elmValue;
        });
    
        $.ajax({
            url: "login.php",
            type: "post",
            data: data,
            dataType:"text",
            success: function(response){
                if(response === "Error"){
                    $('[name=password]').val('');
                    $("#incorrect").fadeIn();
                    setTimeout(() => $("#incorrect").fadeOut(),3000);
                }
            }
        });
    
        return false;
    
    });
});