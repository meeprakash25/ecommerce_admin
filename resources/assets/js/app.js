/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

// Vars

var wrapper    = $("#site-wrapper"),
    menu       = $(".menu"),
    menuLinks  = $(".menu ul li a"),
    toggle     = $(".nav-toggle"),
    toggleIcon = $(".nav-toggle span");

function toggleThatNav() {
    if (menu.hasClass("show-nav")) {
        if (!Modernizr.csstransforms) {
            menu.removeClass("show-nav");
            toggle.removeClass("show-nav");
            menu.animate({
                right: "-=300"
            }, 500);
            toggle.animate({
                right: "-=300"
            }, 500);
        } else {
            menu.removeClass("show-nav");
            toggle.removeClass("show-nav");
        }

    } else {
        if (!Modernizr.csstransforms) {
            menu.addClass("show-nav");
            toggle.addClass("show-nav");
            menu.css("right", "0px");
            toggle.css("right", "330px");
        } else {
            menu.addClass("show-nav");
            toggle.addClass("show-nav");
        }
    }
}

function changeToggleClass() {
    toggleIcon.toggleClass("fa-times");
    toggleIcon.toggleClass("fa-bars");
}

$(function() {
    toggle.on("click", function(e) {
        e.stopPropagation();
        e.preventDefault();
        toggleThatNav();
        changeToggleClass();
    });
    // Keyboard Esc event support
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            if (menu.hasClass("show-nav")) {
                if (!Modernizr.csstransforms) {
                    menu.removeClass("show-nav");
                    toggle.removeClass("show-nav");
                    menu.css("right", "-300px");
                    toggle.css("right", "30px");
                    changeToggleClass();
                } else {
                    menu.removeClass("show-nav");
                    toggle.removeClass("show-nav");
                    changeToggleClass();
                }
            }
        }
    });
});



var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

