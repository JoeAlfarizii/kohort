function datatableUserPuskesmas() {
    $("#table-pusat-user-puskesmas").dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "emptyTable": "Data tidak tersedia",
            "zeroRecords": "Tidak ada data yang ditemukan",
            "infoFiltered": "",
            "infoEmpty": "",
            "paginate": {
                "previous": '‹',
                "next": '›'
            },
            "info": "Menampilkan _START_ - _END_ dari _TOTAL_ Tabel",
            "aria": {
                "paginate": {
                    "previous": 'Previous',
                    "next": 'Next'
                }
            }
        },
        "processing": true,
        "ajax": {
            "type": "POST",
            "url": "user-puskesmas/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-user-puskesmas').val();
                d.id_puskesmas = $('#filter-pusat-puskesmas-user-puskesmas').val();
            },
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama_lengkap" },
            { "data": "username" },
            { "data": "nama" },
            { "data": null }
        ],
        "columnDefs": [{
                "targets": 0,
                "searchable": true,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    $(td).html(row + 1);
                }
            },
            {
                "targets": 4,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailUserPuskesmas(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataUserPuskesmas(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataUserPuskesmas(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function detailUserPuskesmas(id) {
    jQuery.ajax({
        type: 'post',
        "url": "user-puskesmas/detail",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var nama = "<p>" + response.data[0].nama_lengkap + "</p>";
            $('#detail-user-puskesmas-nama').html(nama);

            var username = "<p>" + response.data[0].username + "</p>";
            $('#detail-user-puskesmas-username').html(username);

            var puskesmas = "<p>" + response.data[0].nama + "</p>";
            $('#detail-user-puskesmas-puskesmas').html(puskesmas);

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-detail-user-puskesmas').modal('toggle');
        }
    });
}

function editDataUserPuskesmas(id) {
    jQuery.ajax({
        type: 'post',
        "url": "user-puskesmas/detail",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id = response.data[0].id;
            $('#edit-id-user-puskesmas').val(id);

            var username = response.data[0].username;
            $('#edit-user-puskesmas-username').val(username);

            var password = response.data[0].password;
            $('#edit-user-puskesmas-password').val(password);

            var nama_lengkap = response.data[0].nama_lengkap;
            $('#edit-user-puskesmas-nama').val(nama_lengkap);

            var puskesmas = response.data[0].id_puskesmas;
            $('#edit-user-puskesmas-puskesmas').val(puskesmas).change().selectric('refresh');

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-edit-user-puskesmas').modal('toggle');
        }
    });
}

function deleteDataUserPuskesmas(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data User?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "user-puskesmas/hapus",
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(response) {

                    },
                    error: function(xhr, ajaxOptions, thrownError) {

                    },
                    complete: function(response) {
                        swal('Berhasil', 'Data Berhasil Dihapus', 'success').then((data) => {
                            location.reload()
                        });
                    }
                });
            } else {

            }
        });
}

function submitEditUserPuskesmas() {
    var id = $('#edit-id-user-puskesmas').val();
    var username = $('#edit-user-puskesmas-username').val();
    var password = $('#edit-user-puskesmas-password').val();
    var nama_lengkap = $('#edit-user-puskesmas-nama').val();
    var id_puskesmas = $('#edit-user-puskesmas-puskesmas').val();
    var flag = 0;

    if (username == "") {
        $("#invalid-edit-user-puskesmas-username").css("display", "inline");
    } else {
        $("#invalid-edit-user-puskesmas-username").css("display", "none");
        flag += 1;
    }

    if (password == "") {
        $("#invalid-edit-user-puskesmas-password").css("display", "inline");
    } else {
        $("#invalid-edit-user-puskesmas-password").css("display", "none");
        flag += 1;
    }

    if (nama_lengkap == "") {
        $("#invalid-edit-user-puskesmas-nama").css("display", "inline");
    } else {
        $("#invalid-edit-user-puskesmas-nama").css("display", "none");
        flag += 1;
    }

    if (flag == 3) {
        var data = {
            id: id,
            username: username,
            password: password,
            nama_lengkap: nama_lengkap,
            id_puskesmas: id_puskesmas
        };
        swal({
                title: 'Apakah anda yakin ingin mengubah data user?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "user-puskesmas/edit",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {

                        },
                        success: function(response) {

                        },
                        error: function(xhr, ajaxOptions, thrownError) {

                        },
                        complete: function(response) {
                            swal('Berhasil', 'Data Berhasil Diubah', 'success').then((data) => {
                                location.reload()
                            });
                        }
                    });
                } else {

                }
            });
    }
}

function listPuskesmas() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "../../puskesmas/puskesmas/daftar-puskesmas",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama + ' - ' + item.nama_kecamatan + ', ' + item.nama_kota);
                $("#filter-pusat-puskesmas-user-puskesmas").append(o);
            });
            $('#filter-pusat-puskesmas-user-puskesmas').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listPuskesmasInput() {
    //test output json
    //alert('test');
    jQuery.ajax({
        type: 'get',
        "url": "../../../puskesmas/puskesmas/daftar-puskesmas",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama + ' - ' + item.nama_kecamatan + ', ' + item.nama_kota);
                $("#pusat-user-puskesmas-puskesmas").append(o);
            });
            $('#pusat-user-puskesmas-puskesmas').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listEditPuskesmas() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "../../puskesmas/puskesmas/daftar-puskesmas",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama + ' - ' + item.nama_kecamatan + ', ' + item.nama_kota);
                $("#edit-user-puskesmas-puskesmas").append(o);
            });
            $('#edit-user-puskesmas-puskesmas').selectric();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitAddUserPuskesmas() {
    var id_puskesmas = $('#pusat-user-puskesmas-puskesmas').val();
    var nama_lengkap = $('#pusat-user-puskesmas-nama').val();
    var username = $('#pusat-user-puskesmas-username').val();
    var password = $('#pusat-user-puskesmas-password').val();
    var flag = 0;

    if (nama_lengkap == "") {
        $("#invalid-pusat-add-user-puskesmas-nama").css("display", "inline");
    } else {
        $("#invalid-pusat-add-user-puskesmas-nama").css("display", "none");
        flag += 1;
    }

    if (username == "") {
        $("#invalid-pusat-add-user-puskesmas-username").css("display", "inline");
    } else {
        $("#invalid-pusat-add-user-puskesmas-username").css("display", "none");
        flag += 1;
    }

    if (password == "") {
        $("#invalid-pusat-add-user-puskesmas-password").css("display", "inline");
    } else {
        $("#invalid-pusat-add-user-puskesmas-password").css("display", "none");
        flag += 1;
    }

    if (flag == 3) {
        var data = {
            id_puskesmas: id_puskesmas,
            nama_lengkap: nama_lengkap,
            username: username,
            password: password
        };
        var status;
        var pesan;
        swal({
                title: 'Apakah anda yakin ingin menambahkan User puskesmas?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "input",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {

                        },
                        success: function(response) {
                            pesan = response.message;
                            status = response.data;
                        },
                        error: function(xhr, ajaxOptions, thrownError) {

                        },
                        complete: function(response) {
                            if (status) {
                                swal('Berhasil', 'Data Berhasil Dimasukkan', 'success').then((data) => {
                                    location.reload()
                                });
                            } else {
                                swal('Error', pesan, 'error').then((data) => {});
                            }
                        }
                    });
                } else {

                }
            });
    }
}

function cariDataUserPuskesmas() {
    $('#table-pusat-user-puskesmas').DataTable().ajax.reload();
}

$(document).ready(function() {
    var url = window.location.href;
    var parts = url.split('/').splice(2);
    
    if (parts.length == 4) {
        datatableUserPuskesmas();
        listPuskesmas();
        listEditPuskesmas();
    } else {
        listPuskesmasInput();
    }
});