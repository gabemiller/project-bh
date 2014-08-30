$(document).ready(function() {

    /**
     * 
     */

    $('.nav-menu').metisMenu();

    $('.nav-menu').find('.fa.fa-bars').on('click', this, function(e) {
        e.preventDefault();
        window.location = $(this).closest('li').find('a').attr('href');
    });
    
    /**
     * 
     * @type Number|@call;$@call;height
     */
    var height = 0;
    
    $('.gallery').find('.gallery-item').each(function(){
       
       if($(this).height()>height)
           height = $(this).height();
       
    });
    
    
    $('.gallery').find('.gallery-item').each(function(){
       
           $(this).height((height+20)+'px');
       
    });
    

});