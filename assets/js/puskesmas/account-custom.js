function dataAccount() {
    jQuery.ajax({
        type: 'get',
        "url": "setting/data-setting",
        dataType: 'json',
        success: function(response) {
            $('#puskesmas-setting-puskesmas').val(response.data.puskesmas);
            $('#puskesmas-setting-nama').val(response.data.nama_lengkap);
            $('#puskesmas-setting-username').val(response.data.username);
            $('#puskesmas-setting-password').val(response.data.password);
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitDataAccount() {
    var nama = $('#puskesmas-setting-nama').val();
    var username = $('#puskesmas-setting-username').val();
    var password = $('#puskesmas-setting-password').val();
    var flag = 0;

    if (nama == "") {
        $("#puskesmas-setting-nama").css("border", "1px solid red");
    } else {
        $("#puskesmas-setting-nama").css("border", "none");
        flag += 1;
    }

    if (username == "") {
        $("#puskesmas-setting-username").css("border", "1px solid red");
    } else {
        $("#puskesmas-setting-username").css("border", "none");
        flag += 1;
    }

    if (password == "") {
        $("#puskesmas-setting-password").css("border", "1px solid red");
    } else {
        $("#puskesmas-setting-password").css("border", "none");
        flag += 1;
    }

    if (flag == 3) {
        var data = {
            nama: nama,
            username: username,
            password: password
        }

        console.log(data);
        swal({
                title: 'Apakah anda yakin ingin mengubah data anda?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "setting/user-update-setting",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {

                        },
                        success: function(response) {

                        },
                        error: function(xhr, ajaxOptions, thrownError) {

                        },
                        complete: function(response) {
                            swal('Berhasil', 'Data Akun Berhasil Diubah', 'success').then((data) => {
                                location.reload()
                            });
                        }
                    });
                } else {

                }
            });
    }
}

$(document).ready(function() {
    dataAccount();
});