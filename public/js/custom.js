
  $(function () {

    

    // MENU
    $('.nav-link').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });


    // AOS ANIMATION
    AOS.init({
      disable: 'mobile',
      duration: 800,
      anchorPlacement: 'center-bottom'
    });
     // Sticky Navbar
    $(window).scroll(function () {
      if ($(this).scrollTop() > 0) {
          $('.navbar').addClass('nav-sticky');
      } else {
          $('.navbar').removeClass('nav-sticky');
      }
  });


    // SMOOTH SCROLL
    $(function() {
      $('.nav-link').on('click', function(event) {
        var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 0
          }, 1500);
            event.preventDefault();
      });
    });  


    // Back to top
  $(document).scroll(function() {
  return $(document).scrollTop() > 100 ? $('.ignielToTop').addClass('show') : $('.ignielToTop').removeClass('show')
  }), $('.ignielToTop').click(function() {
    return $('html,body').animate({
      scrollTop: '0'
    });
  });

    // PROJECT SLIDE
    $('#project-slide').owlCarousel({
      loop: true,
      center: true,
      autoplayHoverPause: false,
      autoplay: true,
      margin: 30,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          768:{
              items:2,
          }
      }
    });

  });


    

