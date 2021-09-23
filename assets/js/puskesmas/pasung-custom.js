function datatablePasung() {
    $("#table-puskesmas-pasung").dataTable({
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
            "url": "pasung/datatable-pasung",
            "data": function(d) {},
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "jenis_tindakan" },
            { "data": "tanggal_penindakan" },
            { "data": "alasan" },
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

                    var options = { weekday: 'short', year: 'numeric', month: 'long', day: 'numeric' };
                    var date = new Date(rowData.tanggal_penindakan.replace(/-/g, "/"));
                    var exec = date.toLocaleDateString("en-US", options);
                    $(td).html(exec);
                }
            },
            {
                "targets": 5,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataPasung(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataPasung(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataPasung(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function editDataPasung(id) {
    $('#modal-edit-pasung').modal('toggle');
    jQuery.ajax({
        type: 'post',
        "url": "pasung/detail-edit-pasung",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id_pasung = response.data[0].id;
            $('#edit-id-pasung').val(id_pasung);

            var id_pasien = response.data[0].id_pasien;
            $('#edit-pasung-nama').val(id_pasien).change().selectric('refresh');

            var jenis_tindakan = response.data[0].jenis_tindakan;
            $('#edit-pasung-jenis-tindakan').val(jenis_tindakan).change().selectric('refresh');

            var alasan = response.data[0].alasan;
            $('#edit-pasung-alasan').val(alasan);

            var tanggal = response.data[0].tanggal_penindakan;
            $('#edit-pasung-tanggal-penindakan').val(tanggal)

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {

        }
    });
}

function detailDataPasung(id) {
    //alert(id);
    jQuery.ajax({
        type: 'post',
        "url": "pasung/detail-pasung",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var nama = "<p>" + response.data[0].nama + "</p>";
            $('#detail-pasung-nama').html(nama);

            var jenis_tindakan = "<p>" + response.data[0].jenis_tindakan + "</p>";
            $('#detail-pasung-jenis-tindakan').html(jenis_tindakan);

            var options = { weekday: 'short', year: 'numeric', month: 'long', day: 'numeric' };
            var date = new Date(response.data[0].tanggal_penindakan.replace(/-/g, "/"));
            var exec = date.toLocaleDateString("en-US", options);
            var tanggal = "<p>" + exec + "</p>";
            $('#detail-pasung-tanggal-penindakan').html(tanggal);

            var alasan = "<p>" + response.data[0].alasan + "</p>";
            $('#detail-pasung-alasan').html(alasan);

        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-pasung').modal('toggle');
        }
    });
}

function deleteDataPasung(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data pasung?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "pasung/hapus-pasung",
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

function listPasienSehat() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "../perawatan/daftar-pasien-sehat",
        dataType: 'json',
        success: function(response) {
            console.log(response);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pasung-pasien").append(o);
            });
            $('#pasung-pasien').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditSelectric() {
    jQuery.ajax({
        type: 'get',
        "url": "./perawatan/daftar-pasien-sehat",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pasung-nama").append(o);
            });
            $('#edit-pasung-nama').selectric();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitEditFormPasung() {
    var id = $("#edit-id-pasung").val();
    var id_pasien = $("#edit-pasung-nama").val();
    var tanggal_penindakan = $("#edit-pasung-tanggal-penindakan").val();
    var jenis_tindakan = $("#edit-pasung-jenis-tindakan").val();
    var alasan = $("#edit-pasung-alasan").val();
    var flag = 0;

    if (alasan == "") {
        $("#invalid-edit-pasung-alasan").css("display", "inline");
    } else {
        $("#invalid-edit-pasung-alasan").css("display", "none");
        flag += 1;
    }

    if (flag == 1) {
        var data = {
            id: id,
            id_pasien: id_pasien,
            tanggal_penindakan: tanggal_penindakan,
            jenis_tindakan: jenis_tindakan,
            alasan: alasan
        }

        swal({
                title: 'Apakah anda yakin ingin mengubah data pasung?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "pasung/edit-pasung",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#edit-pasung-submit-form').addClass('disabled');
                            $('#edit-pasung-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#edit-pasung-submit-form').removeClass('disabled');
                            $('#edit-pasung-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#edit-pasung-submit-form').addClass('disabled');
                            $('#edit-pasung-submit-form').addClass('btn-progress');
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

function submitFormPasung() {
    var id_pasien = $("#pasung-pasien").val();
    var tanggal_penindakan = $("#pasung-tanggal-penindakan").val();
    var jenis_tindakan = $("#pasung-jenis-tindakan").val();
    var alasan = $("#pasung-alasan").val();
    var flag = 0;

    if (id_pasien == "") {
        $("#invalid-pasung-pasien").css("display", "inline");
    } else {
        $("#invalid-pasung-pasien").css("display", "none");
        flag += 1;
    }

    if (alasan == "") {
        $("#invalid-pasung-alasan").css("display", "inline");
    } else {
        $("#invalid-pasung-alasan").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            id_pasien: id_pasien,
            tanggal_penindakan: tanggal_penindakan,
            jenis_tindakan: jenis_tindakan,
            alasan: alasan
        }
        swal({
                title: 'Apakah anda yakin ingin menambahkan data pasung?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "pasung-input",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#btn-pasung-submit-form').addClass('disabled');
                            $('#btn-pasung-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#btn-pasung-submit-form').removeClass('disabled');
                            $('#btn-pasung-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#btn-pasung-submit-form').addClass('disabled');
                            $('#btn-pasung-submit-form').addClass('btn-progress');
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
        datatablePasung();
        fillEditSelectric();
    } else {
        if (parts.length == 4) {
            listPasienSehat();
        }
    }
});