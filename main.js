// I didn't create the createCookie or getCookie functions, but I utilized them since they were already on the site.
function createCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
    }
    else expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    var end;
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
}

var VERB = {};
VERB.europeBanner = function(){
    // If user hasn't clicked for cookie permissions, set .cookie_banner to display: block
    if(getCookie('europeBannerShown')==null) {
        $(".cookie_banner").css('display','block');
    }

    // If user clicks the agree button, create the cookie for a year, and then fadeout the cookie banner.
    $("#banner_agree").click(function() {
        createCookie('europeBannerShown', 'true', '365');
        $(".cookie_banner").fadeOut();
    });
};

$(document).ready(function() {
    VERB.europeBanner();
});
