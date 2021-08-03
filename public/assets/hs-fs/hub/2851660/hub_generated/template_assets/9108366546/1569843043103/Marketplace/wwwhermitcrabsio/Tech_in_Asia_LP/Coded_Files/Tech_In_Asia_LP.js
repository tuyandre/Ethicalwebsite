 $(document).ready(function(){
var images = $(".background-image").find("img");
$.each(images, function (index, item) {
   var $item = $(item),
    src = $item.attr('src'),
    
   cont = $item.closest('.sec-bg').css('background-image', 'url( '+ src +'  )');

});

});