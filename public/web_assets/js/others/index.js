/* Customers Feedback for home page */
$(document).ready(function(){
  $('.customer_feedback').owlCarousel({
       center: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 9000,
        responsiveClass: true,
        center: true,
        rewind: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,
        margin: 0,
        stagePadding: 0,
        merge: false,
        mergeFit: true,
        autoWidth: false,
        startPosition: 0,
        rtl: false,
        smartSpeed: 1000,
        fluidSpeed: false,
        dragEndSpeed: false,
        dots:false,        
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        450: {
          items: 1,
          nav: false
        },
        767: {
          items: 2,
          nav: false
        },
        768: {
          items: 2,
          nav: false
        },
        1000: {
          items: 2,
          nav: false
        },
        1200: {
          items: 4,
          nav: false
        },
        1400: {
          items: 4,
          nav: false
        },
        1700: {
          items: 4,
          nav: false
        }
      }
  })
  });