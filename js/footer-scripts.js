(function ($) {

    function animateCSS(element, animationName, callback) {
        const node = document.querySelector(element);
        node.classList.add('animated', animationName);

        function handleAnimationEnd() {
            node.classList.remove('animated', animationName);
            node.removeEventListener('animationend', handleAnimationEnd);
            if (typeof callback === 'function') callback()
        }

        node.addEventListener('animationend', handleAnimationEnd);
    }

    $(".navbar-item.has-dropdown.is-hoverable").hover(function () {
        animateCSS('.navbar-dropdown', 'fadeIn');
    }, function() {
        $( '.navbar-dropdown' ).fadeOut( "slow" );
    });
    

    var stickySideBar = new Waypoint.Sticky({
        element: $('aside.widget-area')[0],
        stuckClass: 'is-fixed sideMove',
        offset: '-75%'
    });

})(jQuery);
