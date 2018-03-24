$("#incorrect").hide();

$("#myForm").on('submit', function(){

    

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = {};
    var success;

    $(this).find('[name]').each(function(index, value){
        var actualElm = $(this);
        var name = actualElm.attr('name');
        var elmValue = actualElm.val();
        
        data[name] = elmValue;
    });
    
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function(response){
            $("#incorrect").fadeIn();
        }
    });
    return false;
});