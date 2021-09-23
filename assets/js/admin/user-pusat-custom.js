function datatableUserPusat() {
    $("#table-pusat-user-pusat").dataTable({
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
            "url": "user-pusat/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-user-pusat').val();
            },
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama_lengkap" },
            { "data": "username" },
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
                "targets": 3,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailUserPusat(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataUserPusat(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataUserPusat(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function detailUserPusat(id) {
    jQuery.ajax({
        type: 'post',
        "url": "user-pusat/detail",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var nama = "<p>" + response.data[0].nama_lengkap + "</p>";
            $('#detail-user-pusat-nama').html(nama);

            var username = "<p>" + response.data[0].username + "</p>";
            $('#detail-user-pusat-username').html(username);

            // var puskesmas = "<p>" + response.data[0].nama + "</p>";
            // $('#detail-user-puskesmas-puskesmas').html(puskesmas);

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-detail-user-pusat').modal('toggle');
        }
    });
}

function editDataUserPusat(id) {
    jQuery.ajax({
        type: 'post',
        "url": "user-pusat/detail",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id = response.data[0].id;
            $('#edit-id-user-pusat').val(id);

            var username = response.data[0].username;
            $('#edit-user-pusat-username').val(username);

            var password = response.data[0].password;
            $('#edit-user-pusat-password').val(password);

            var nama_lengkap = response.data[0].nama_lengkap;
            $('#edit-user-pusat-nama').val(nama_lengkap);

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-edit-user-pusat').modal('toggle');
        }
    });
}

function deleteDataUserPusat(id) {
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
                    "url": "user-pusat/hapus",
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

function submitEditUserPusat() {
    var id = $('#edit-id-user-pusat').val();
    var username = $('#edit-user-pusat-username').val();
    var password = $('#edit-user-pusat-password').val();
    var nama_lengkap = $('#edit-user-pusat-nama').val();
    var flag = 0;

    if (username == "") {
        $("#invalid-edit-user-pusat-username").css("display", "inline");
    } else {
        $("#invalid-edit-user-pusat-username").css("display", "none");
        flag += 1;
    }

    if (password == "") {
        $("#invalid-edit-user-pusat-password").css("display", "inline");
    } else {
        $("#invalid-edit-user-pusat-password").css("display", "none");
        flag += 1;
    }

    if (nama_lengkap == "") {
        $("#invalid-edit-user-pusat-nama").css("display", "inline");
    } else {
        $("#invalid-edit-user-pusat-nama").css("display", "none");
        flag += 1;
    }

    if (flag == 3) {
        var data = {
            id: id,
            username: username,
            password: password,
            nama_lengkap: nama_lengkap
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
                        "url": "user-pusat/edit",
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

function submitAddUserPusat() {
    var nama_lengkap = $('#pusat-user-pusat-nama').val();
    var username = $('#pusat-user-pusat-username').val();
    var password = $('#pusat-user-pusat-password').val();
    var flag = 0;

    if (nama_lengkap == "") {
        $("#invalid-pusat-add-user-pusat-nama").css("display", "inline");
    } else {
        $("#invalid-pusat-add-user-pusat-nama").css("display", "none");
        flag += 1;
    }

    if (username == "") {
        $("#invalid-pusat-add-user-pusat-username").css("display", "inline");
    } else {
        $("#invalid-pusat-add-user-pusat-username").css("display", "none");
        flag += 1;
    }

    if (password == "") {
        $("#invalid-pusat-add-user-pusat-password").css("display", "inline");
    } else {
        $("#invalid-pusat-add-user-pusat-password").css("display", "none");
        flag += 1;
    }

    if (flag == 3) {
        var data = {
            nama_lengkap: nama_lengkap,
            username: username,
            password: password
        };
        console.log(data);
        var status;
        var pesan;
        swal({
                title: 'Apakah anda yakin ingin menambahkan User pusat?',
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

function cariDataUserPusat() {
    $('#table-pusat-user-pusat').DataTable().ajax.reload();
}

$(document).ready(function() {
    datatableUserPusat();
});