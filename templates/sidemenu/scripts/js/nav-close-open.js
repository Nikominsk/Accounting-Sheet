//if page completely loaded
$(window).on("load", function() {

    var expanded = true;
    //resize from mobile (sidemenu is closed) to desktop
    //-> sidemenu and bar not shown
  
    //if user uses smartphone or tablet
    if(window.innerWidth < 1630) {
        //everytime opens a new page, dont show the nav (navs width 100%) -> do collapse
        collapse();
    } 

    //Listener, if User clicked on menu icon
    //#icon-nav-bar is clickable when user uses software on Desktop-/Tablet-screen
    //.icon-nav is clickable when user uses software on Mobile-screen
    $( "#icon-nav-bar, .icon-nav" ).click(function( event ) {

        //if sidemenu extended
        if(expanded == true) { 
            //currently expanded
            //do a collapse
            collapse();

        } else {
            //currently collapsed
            //do an expand
            expand();

        }
    });

    function collapse() {
        let sidemenu = $('#sidemenu');
        let navElements = $('#nav-elements-wrapper ul');

        //there are two types of collpasing 
        //1. for PC-Screen and Tablet-Screen
        //2. Mobile-Screen

        sidemenu.removeClass('expand');
        sidemenu.addClass('collapse');

        navElements.removeClass('show');
        navElements.addClass('hide');
    
        $("#icon-nav-bar").html("&#9776");
        

        expanded = !expanded; 

    }

    function expand() {
        let sidemenu = $('#sidemenu');
        let navElements = $('#nav-elements-wrapper ul');
       
        //there are two types of collpasing 
        //1. for PC-Screen and Tablet-Screen
        //2. Mobile-Screen

        sidemenu.removeClass('collapse');
        sidemenu.addClass('expand');
        
        navElements.removeClass('hide');
        navElements.addClass('show');

        $("#icon-nav-bar").html("||");
        

        expanded = !expanded;
        
    }


});