/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
//"use strict";

// function pasienDataTable(){
//     //test output json
//     jQuery.ajax({
//         type: 'get',
//         "url": "daftar-pasien",
//         dataType : 'json',
//         success: function (response) { 
//            console.log(response);
//         },
//         error: function (xhr, ajaxOptions, thrownError) {

//         }
//     });
// }

//JQUERY CODE
$(document).ready(function() {
    var url = window.location.href;
    var parts = url.split('/').splice(2);

    if (parts[3] != "dashboard") {
        $('.picker-month').MonthPicker({
            MonthFormat: 'yy-mm',
            Button: false
        });
    }
});