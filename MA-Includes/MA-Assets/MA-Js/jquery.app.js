/**
 * Theme: Ubold Admin Template
 * Author: Coderthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initNavbar() {

        $('.navbar-toggle').on('click', function (event) {
            $(this).toggleClass('open');
            $('#navigation').slideToggle(400);
        });

        $('.navigation-menu>li').slice(-1).addClass('last-elements');

        $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
            }
        });
    }

    function init() {
        initNavbar();
    }

    init();

})(jQuery);
$("html").niceScroll({
    cursorcolor: "#5fbeaa",
    cursorborder: "1px solid #5fbeaa",
    cursorborderradius: "0px"
});
$('.slimscroll-noti').slimScroll({
    height: '230px',
    position: 'right',
    size: "5px",
    color: '#98a6ad',
    wheelStep: 10
});

// === following js will activate the menu in left side bar based on url ====
$(document).ready(function () {
    $(".navigation-menu a").each(function () {
        if (this.href == window.location.href) {
            $(this).parent().addClass("active"); // add active to li of the current link
            $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
            $(this).parent().parent().parent().parent().parent().addClass("active"); // add active class to an anchor
        }
    });
});
