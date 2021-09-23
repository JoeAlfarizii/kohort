function authLogin() {
    var username = $('#login-username').val();
    var password = $('#login-password').val();
    var flag = 0;

    if (username != "") {
        flag += 1;
    }

    if (password != "") {
        flag += 1;
    }

    if(flag == 2){
        var data = {
            username: username,
            password: password
        };
        jQuery.ajax({
            type: 'post',
            url: 'auth',
            data: data,
            dataType: 'json',
            beforeSend: function() {
                swal({
                    icon: "info",
                    text: "Silahkan Tunggu ...",
                    button: false,
                    closeOnClickOutside: false,
                });
            },
            success: function(response) {
                if(response.data == false){
                    swal.close();
                    swal({
                        icon: "error",
                        title: "Username not registered!",
                        text: "silahkan masukkan data kembali"
                    })
                }else{
                    location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {

            },
            complete: function(response) {
                //location.reload()
            }
        });
    }else{
        swal({
            icon: "error",
            text: "Silahkan isi username dan password anda!",
        });
    }

    // swal('Berhasil', 'Data Berhasil Dimasukkan', 'success').then((data) => {

    // });
    // if (flag == 2) {
    //     var data = {
    //         username: username,
    //         password: password
    //     };
    //     jQuery.ajax({
    //         type: 'post',
    //         "url": "auth",
    //         data: data,
    //         dataType: 'json',
    //         beforeSend: function() {

    //         },
    //         success: function(response) {

    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {

    //         },
    //         complete: function(response) {

    //         }
    //     });
    // }
}

$(document).ready(function() {
    $("#login-submit").click(function(event){
        event.preventDefault();
        authLogin();
    });
});