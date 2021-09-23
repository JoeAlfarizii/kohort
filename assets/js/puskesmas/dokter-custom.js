function datatableDokter() {
    $("#table-puskesmas-dokter").dataTable({
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
            "url": "dokter/datatable-dokter",
            "data": function(d) {},
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "jabatan" },
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
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataDokter(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataDokter(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataDokter(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function editDataDokter(id) {
    $('#modal-edit-dokter').modal('toggle');
    jQuery.ajax({
        type: 'post',
        "url": "dokter/detail-dokter",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id_dokter = response.data[0].id;
            $('#edit-id-dokter').val(id_dokter);

            var nama = response.data[0].nama;
            $('#edit-dokter-nama').val(nama)

            var jabatan = response.data[0].jabatan;
            $('#edit-dokter-jabatan').val(jabatan).change();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {

        }
    });
}

function detailDataDokter(id) {
    //alert(id);
    jQuery.ajax({
        type: 'post',
        "url": "dokter/detail-dokter",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            console.log(response.data);
            var nama = "<p>" + response.data[0].nama + "</p>";
            $('#detail-dokter-nama').html(nama);

            var jabatan = "<p>" + response.data[0].jabatan + "</p>";
            $('#detail-dokter-jabatan').html(jabatan);

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-detail-dokter').modal('toggle');
        }
    });
}

function deleteDataDokter(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data dokter?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "dokter/hapus-dokter",
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

function submitEditFormDokter() {
    var id = $("#edit-id-dokter").val();
    var nama = $("#edit-dokter-nama").val();
    var jabatan = $("#edit-dokter-jabatan").val();
    var flag = 0;

    if (nama == "") {
        $("#invalid-edit-dokter-nama").css("display", "inline");
    } else {
        $("#invalid-edit-dokter-nama").css("display", "none");
        flag += 1;
    }

    if (jabatan == "") {
        $("#invalid-edit-dokter-jabatan").css("display", "inline");
    } else {
        $("#invalid-edit-dokter-jabatan").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            id: id,
            nama: nama,
            jabatan: jabatan
        };
        swal({
                title: 'Apakah anda yakin ingin mengubah data dokter?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "dokter/edit-dokter",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#edit-dokter-submit-form').addClass('disabled');
                            $('#edit-dokter-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#edit-dokter-submit-form').removeClass('disabled');
                            $('#edit-dokter-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#edit-dokter-submit-form').addClass('disabled');
                            $('#edit-dokter-submit-form').addClass('btn-progress');
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

function submitFormDokter() {
    var nama = $("#dokter-nama").val();
    var jabatan = $("#dokter-jabatan").val();
    var flag = 0;

    if (nama == "") {
        $("#invalid-dokter-nama").css("display", "inline");
    } else {
        $("#invalid-dokter-nama").css("display", "none");
        flag += 1;
    }

    if (jabatan == "") {
        $("#invalid-dokter-jabatan").css("display", "inline");
    } else {
        $("#invalid-dokter-jabatan").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            nama: nama,
            jabatan: jabatan
        };
        swal({
                title: 'Apakah anda yakin ingin menambahkan data dokter?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "dokter-input",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#btn-dokter-submit-form').addClass('disabled');
                            $('#btn-dokter-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#btn-dokter-submit-form').removeClass('disabled');
                            $('#btn-dokter-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#btn-dokter-submit-form').addClass('disabled');
                            $('#btn-dokter-submit-form').addClass('btn-progress');
                        },
                        complete: function(response) {
                            swal('Berhasil', 'Data Berhasil Dimasukkan', 'success').then((data) => {
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

    var url = window.location.href;
    var parts = url.split('/').splice(2);

    if (parts.length == 3) {
        datatableDokter();
    } else {

    }
});