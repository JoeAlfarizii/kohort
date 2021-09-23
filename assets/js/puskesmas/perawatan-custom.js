function datatablePerawatan() {
    $("#table-puskesmas-perawatan").dataTable({
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
            "url": "perawatan/datatable-perawatan",
            "data": function(d) {},
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama_pasien" },
            { "data": "jenis_perawatan" },
            { "data": "alasan" },
            { "data": "status_rujuk_balik" },
            { "data": "status_kemandirian" },
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
                "targets": 2,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    if (rowData.jenis_perawatan == 0) {
                        $(td).html("mandiri");
                    } else {
                        $(td).html("rujuk");
                    }
                }
            },
            {
                "targets": 4,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    if (rowData.status_rujuk_balik == 0) {
                        $(td).html("Non Rujukan");
                    } else {
                        $(td).html("Rujukan");
                    }
                }
            },
            {
                "targets": 5,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    if (rowData.status_kemandirian == 0) {
                        $(td).html("Mandiri");
                    } else {
                        $(td).html("Non Mandiri");
                    }
                }
            },
            {
                "targets": 6,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataPerawatan(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataPerawatan(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataPerawatan(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function editDataPerawatan(id) {
    $('#modal-edit-perawatan').modal('toggle');
    jQuery.ajax({
        type: 'post',
        "url": "perawatan/detail-edit-perawatan",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id_perawatan = response.data[0].id;
            $('#edit-id-perawatan').val(id_perawatan);

            var id_pasien = response.data[0].id_pasien;
            $('#edit-perawatan-nama').val(id_pasien).change().selectric('refresh');

            var jenis_perawatan = response.data[0].jenis_perawatan;
            $('#edit-perawatan-jenis').val(jenis_perawatan).change().selectric('refresh');

            var alasan = response.data[0].alasan;
            $('#edit-perawatan-alasan').val(alasan);

            var status_rujuk = response.data[0].status_rujuk_balik;
            $('#edit-perawatan-status-rujuk').val(status_rujuk).change().selectric('refresh');

            var status_kemandirian = response.data[0].status_kemandirian;
            $('#edit-perawatan-status-mandiri').val(status_kemandirian).change().selectric('refresh');
        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {

        }
    });
    //$('#').val(id).change().selectric('refresh');
}

function fillEditSelectric() {
    jQuery.ajax({
        type: 'get',
        "url": "perawatan/daftar-pasien-sehat",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-perawatan-nama").append(o);
            });
            $('#edit-perawatan-nama').selectric();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function detailDataPerawatan(id) {
    //alert(id);
    jQuery.ajax({
        type: 'post',
        "url": "perawatan/detail-perawatan",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var nama = "<p>" + response.data[0].nama_pasien + "</p>";
            $('#detail-perawatan-nama').html(nama);

            if (response.data[0].jenis_perawatan == 0) {
                var jenis = "<p>Mandiri</p>"
            } else {
                var jenis = "<p>Rujuk</p>"
            }
            $('#detail-perawatan-jenis').html(jenis);

            if (response.data[0].status_rujuk_balik == 0) {
                var status_rujuk = "<p>Non Rujukan</p>"
            } else {
                var status_rujuk = "<p>Rujukan</p>"
            }
            $('#detail-perawatan-status-rujuk').html(status_rujuk);

            if (response.data[0].status_kemandirian == 0) {
                var status_kemandirian = "<p>Mandiri</p>"
            } else {
                var status_kemandirian = "<p>Non Mandiri</p>"
            }
            $('#detail-perawatan-status-kemandirian').html(status_kemandirian);

            var alasan = "<p>" + response.data[0].alasan + "</p>";
            $('#detail-perawatan-alasan').html(alasan);

        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-perawatan').modal('toggle');
        }
    });
}

function deleteDataPerawatan(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data perawatan?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "perawatan/hapus-perawatan",
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

function listPasienSehat(url) {
    //test output json
    $('#perawatan-nama').select2('destroy');
    jQuery.ajax({
        type: 'get',
        "url": url,
        dataType: 'json',
        success: function(response) {
            console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                //$(o).html(item.nama);
                $("#perawatan-nama").append(o);
            });
            $('#perawatan-nama').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitEditFormPerawatan() {
    var id = $("#edit-id-perawatan").val();
    var id_pasien = $("#edit-perawatan-nama").val();
    var alasan = $("#edit-perawatan-alasan").val();
    var jenis_perawatan = $("#edit-perawatan-jenis").val();
    var status_rujuk_balik = $("#edit-perawatan-status-rujuk").val();
    var status_kemandirian = $("#edit-perawatan-status-mandiri").val();
    var flag = 0;

    if (alasan == "") {
        $("#invalid-edit-perawatan-alasan").css("display", "inline");
    } else {
        $("#invalid-edit-perawatan-alasan").css("display", "none");
        flag += 1;
    }

    if (flag == 1) {
        var data = {
            id: id,
            id_pasien: id_pasien,
            alasan: alasan,
            jenis_perawatan: jenis_perawatan,
            status_rujuk_balik: status_rujuk_balik,
            status_kemandirian: status_kemandirian
        };
        console.log(data);

        swal({
                title: 'Apakah anda yakin ingin mengubah data perawatan?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "perawatan/edit-perawatan",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#edit-perawatan-submit-form').addClass('disabled');
                            $('#edit-perawatan-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#edit-perawatan-submit-form').removeClass('disabled');
                            $('#edit-perawatan-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#edit-perawatan-submit-form').addClass('disabled');
                            $('#edit-perawatan-submit-form').addClass('btn-progress');
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

function submitFormPerawatan() {
    var id_pasien = $("#perawatan-nama").val();
    var alasan = $("#perawatan-alasan").val();
    var jenis_perawatan = $("#perawatan-jenis-perawatan").val();
    var status_rujuk_balik = $("#perawatan-status-rujuk").val();
    var status_kemandirian = $("#perawatan-status-mandiri").val();
    var flag = 0;

    if (id_pasien == "") {
        $("#invalid-perawatan-nama").css("display", "inline");
    } else {
        $("#invalid-perawatan-nama").css("display", "none");
        flag += 1;
    }

    if (alasan == "") {
        $("#invalid-perawatan-alasan").css("display", "inline");
    } else {
        $("#invalid-perawatan-alasan").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            id_pasien: id_pasien,
            alasan: alasan,
            jenis_perawatan: jenis_perawatan,
            status_rujuk_balik: status_rujuk_balik,
            status_kemandirian: status_kemandirian
        };
        swal({
                title: 'Apakah anda yakin ingin menambahkan data perawatan?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "perawatan-input",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#btn-perawatan-submit-form').addClass('disabled');
                            $('#btn-perawatan-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#btn-perawatan-submit-form').removeClass('disabled');
                            $('#btn-perawatan-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#btn-perawatan-submit-form').addClass('disabled');
                            $('#btn-perawatan-submit-form').addClass('btn-progress');
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

//JQUERY CODE
$(document).ready(function() {
    var url = window.location.href;
    var parts = url.split('/').splice(2);

    if (parts.length == 3) {
        datatablePerawatan();
        fillEditSelectric();
    } else {
        if (parts[3] == "perawatan-form") {
            listPasienSehat("../perawatan/daftar-pasien-sehat");
        }
    }
});