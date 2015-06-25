/* jQuery Cookie Min */
jQuery.cookie=function(key,value,options){if(arguments.length>1&&String(value)!=="[object Object]"){options=jQuery.extend({},options);if(value===null||value===undefined){options.expires=-1}if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setDate(t.getDate()+days)}value=String(value);return(document.cookie=[encodeURIComponent(key),'=',options.raw?value:encodeURIComponent(value),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''))}options=value||{};var result,decode=options.raw?function(s){return s}:decodeURIComponent;return(result=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?decode(result[1]):null};


/* Banner Settings */
var BannerASP = {};

BannerASP.headerBanner = function(cookieName, expireDays) {
    var $banner = jQuery('.top-banner'),
    cookie = jQuery.cookie(cookieName),
    $menu = jQuery('#upper-menu-container');
    
    if (cookie !== 'banner-hidden') {
    jQuery('#upper-menu-container').css('margin-top','85px');
    
    $banner.removeClass('banner-hidden').find('.close-icon').mousedown(function() {
        $banner.addClass('fade');
        window.closeButtonTimeout = setTimeout(function() {
        jQuery.cookie(cookieName, 'banner-hidden', {path: '/', expires: expireDays});
        $menu.animate({marginTop: 0}, 'fast');
        $banner.slideUp('fast');
        }, 2000);
        }).bind('mouseup mouseleave', function() {
                clearTimeout(window.closeButtonTimeout);
                $banner.removeClass('fade');
                });	
       }
};

jQuery(document).ready(function(e) {BannerASP.headerBanner('Banner-ASP', 1);});




