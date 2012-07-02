$(function(){

   

    // $('.terms').click(function(e){
    //     e.preventDefault();
    //     ('#terms').toggle();
    // });
    $('.close').click(function(){
         $('#terms').hide();
    });
    $('.terms').click(function(){
        $('#terms').modal({
            overlayClose:true,
            opacity:80,
            overlayCss: {backgroundColor:"#000"}
        });
    });

    
});

