(function($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 72)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#mainNav',
        offset: 75
    });

    // Collapse Navbar
    var navbarCollapse = function() {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-scrolled");
        } else {
            $("#mainNav").removeClass("navbar-scrolled");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);

    //SCROLLING NAVBAR
    $("a.item-home").on('click', function() {
        $('html, body').stop().animate({scrollTop:0}, 500);
    });
    $("a.item-cv").on('click', function() {
        $('html, body').stop().animate({scrollTop:685}, 500);
    });
    $("a.item-portfolio").on('click', function() {
        $('html, body').stop().animate({scrollTop:1140}, 500);
    });
    $("a.item-contact").on('click', function() {
        $('html, body').stop().animate({scrollTop:1500}, 500);
    });


})(jQuery); // End of use strict

$('button.btn-contact').on('click', function () {

    var formData = $('form.form-contact').serialize();
    var url = site_url + 'welcome';
    var elementSelected = $('p.field-error');

    $.ajax({
        url : url,
        type : 'POST',
        data : formData,
        success : function (data) {
            if (data.error) {

                elementSelected.each(function () {
                    for (var key in data.error) {
                        if ($(this).attr('data-field') === key) {
                            $(this).html(data.error[key]);
                        }
                    }
                })

            } else {

                //console.log(data.success);

                Swal.fire({
                    position : 'center',
                    icon : 'success',
                    title : 'Votre compte a été créé avec succès',
                    showConfirmButton : false,
                    timer : 1500
                });

            }
        }
    });

    console.log(formData);

});