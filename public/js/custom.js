$(document).ready(function () {
	$('.alert').delay(3000).hide(0);
})

/*$("#number").intlTelInput({
    geoIpLookup: function(callback) {
      $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
      });
    },
    preferredCountries: ['mm'],
    // initialCountry: "auto",
    separateDialCode: true,
    utilsScript: "../frontend/intl-tel-input/build/js/utils.js"
});*/


function flag_box_click(event)
{
    
    var sel=$(event).children('span.dial-code').html();
    $('input[name=country_code]').val(sel);
}




    