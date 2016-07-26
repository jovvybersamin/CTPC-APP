@yield('before.scripts')
<script type="text/javascript" src="{{ elixir('frontend/js/site.js') }}"></script>
<script type="text/javascript" src="{{ elixir('vendors/js/all.js') }}"></script>
<script type="text/javascript" src="{{ elixir('vendors/js/site/all.js') }}"></script>
<script type="text/javascript">




$('document').ready(function(){

    //********** Headroom js functionality **********/
    // grab an element
    var myElement = document.querySelector(".navbar");
    // construct an instance of Headroom, passing the element
    var headroom  = new Headroom(myElement, {
          "offset": 205,
          "tolerance": 5,
          "classes": {
            "initial": "animated",
            "pinned": "slideDown",
            "unpinned": "slideUp"
          }
        });
    // initialise
    headroom.init();

headroom.init();

// to destroy
headroom.destroy();

    $('.dropdown').hover(function(){
        $(this).addClass('open');
    }, function(){
        $(this).removeClass('open');
    });


    $('#nav-toggle').click(function(){
        $(this).toggleClass('active');
        $('.navbar-collapse').toggle();
        $('body').toggleClass('nav-open');
    });

    $('#mobile-subnav').click(function(){
        if($('.second-nav .navbar-left').css('display') == 'block'){
            $('.second-nav .navbar-left').slideUp(function(){
                $(this).addClass('not-visible');
            });
            $(this).html('<i class="fa fa-bars"></i> Open Submenu');
        } else {
            $('.second-nav .navbar-left').slideDown(function(){
                $(this).removeClass('not-visible');
            });
            $(this).html('<i class="fa fa-close"></i> Close Submenu');
        }

    });

  });



</script>
@yield('after.scripts')
