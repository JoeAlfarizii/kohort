function datatablePuskesmas() {
    $("#table-pusat-puskesmas").dataTable({
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
            "info": "Menampilkan _START_ - _END_ dari _TOTAL_ Data",
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
            "url": "puskesmas/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-puskesmas').val();
                d.id_provinsi = $('#filter-pusat-provinsi-puskesmas').val();
            },
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "nama_provinsi" },
            { "data": "nama_kota" },
            { "data": "nama_kecamatan" },
            { "data": "alamat" },
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
        }, {
            "targets": 6,
            "searchable": false,
            "orderable": false,
            "createdCell": function(td, cellData, rowData, row, col) {
                var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataPuskesmas(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataPuskesmas(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataPuskesmas(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                $(td).html(html);
            }
        }]
    });
}

function listProvinsi() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "../puskesmas/puskesmas/daftar-provinsi",
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#filter-pusat-provinsi-puskesmas").append(o);
            });
            $('#filter-pusat-provinsi-puskesmas').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function detailDataPuskesmas(id) {
    jQuery.ajax({
        type: 'post',
        "url": "puskesmas/detail-puskesmas",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var nama = "<p>" + response.data[0].nama + "</p>"
            $('#detail-puskesmas-pusat-nama').html(nama);

            var provinsi = "<p>" + response.data[0].nama_provinsi + "</p>"
            $('#detail-puskesmas-pusat-provinsi').html(provinsi);

            var kota = "<p>" + response.data[0].nama_kota + "</p>"
            $('#detail-puskesmas-pusat-kota').html(kota);

            var kecamatan = "<p>" + response.data[0].nama_kecamatan + "</p>"
            $('#detail-puskesmas-pusat-kecamatan').html(kecamatan);

            var desa = "<p>" + response.data[0].nama_desa + "</p>"
            $('#detail-puskesmas-pusat-desa').html(desa);

            var alamat = "<p>" + response.data[0].alamat + "</p>"
            $('#detail-puskesmas-pusat-alamat').html(alamat);
        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-pusat-puskesmas').modal('toggle');
        }
    });
}

function editDataPuskesmas(id) {
    jQuery.ajax({
        type: 'post',
        "url": "puskesmas/detail-edit-puskesmas",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id = response.data[0].id;
            $('#edit-id-pusat-puskesmas').val(id);

            var nama = response.data[0].nama;
            $('#edit-pusat-puskesmas-nama').val(nama);

            var provinsi = response.data[0].id_provinsi;
            $('#edit-pusat-puskesmas-provinsi').val(provinsi).change().selectric('refresh');

            var alamat = response.data[0].alamat;
            $('#edit-pusat-puskesmas-alamat').val(alamat);

            var kota = response.data[0].id_kota;
            fillEditKota(provinsi, kota);

            var kecamatan = response.data[0].id_kecamatan;
            fillEditKecamatan(kota, kecamatan);

            var desa = response.data[0].id_desa;
            fillEditDesa(kecamatan, desa);

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-edit-pusat-puskesmas').modal('toggle');
        }
    });
}

function deleteDataPuskesmas(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data puskesmas?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "puskesmas/hapus-puskesmas",
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

function fillEditProvinsi() {
    jQuery.ajax({
        type: 'get',
        "url": "../puskesmas/puskesmas/daftar-provinsi",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pusat-puskesmas-provinsi").append(o);
            });
            $('#edit-pusat-puskesmas-provinsi').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditKota(id_provinsi_selected, id_kota_selected) {
    $('#edit-pusat-puskesmas-kota').find('option').remove();
    if (id_provinsi_selected) {
        var id_provinsi = id_provinsi_selected;
    } else {
        var id_provinsi = $("#edit-pusat-puskesmas-provinsi").val();
    }

    jQuery.ajax({
        type: 'post',
        "url": '../puskesmas/puskesmas/daftar-kota',
        data: {
            id_provinsi: id_provinsi
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pusat-puskesmas-kota").append(o);
            });
            $('#edit-pusat-puskesmas-kota').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });

            if (id_kota_selected) {
                $('#edit-pusat-puskesmas-kota').val(id_kota_selected).change().selectric('refresh');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditKecamatan(id_kota_selected, id_kecamatan_selected) {
    $('#edit-pusat-puskesmas-kecamatan').find('option').remove();
    if (id_kota_selected) {
        var id_kota = id_kota_selected;
    } else {
        var id_kota = $("#edit-pusat-puskesmas-kota").val();
    }
    jQuery.ajax({
        type: 'post',
        "url": '../puskesmas/puskesmas/daftar-kecamatan',
        data: {
            id_kota: id_kota
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pusat-puskesmas-kecamatan").append(o);
            });
            $('#edit-pusat-puskesmas-kecamatan').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });
            if (id_kecamatan_selected) {
                $('#edit-pusat-puskesmas-kecamatan').val(id_kecamatan_selected).change().selectric('refresh');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditDesa(id_kecamatan_selected, id_desa_selected) {
    $('#edit-pusat-puskesmas-desa').find('option').remove();
    if (id_kecamatan_selected) {
        var id_kecamatan = id_kecamatan_selected;
    } else {
        var id_kecamatan = $("#edit-pusat-puskesmas-kecamatan").val();
    }

    jQuery.ajax({
        type: 'post',
        "url": '../puskesmas/puskesmas/daftar-desa',
        data: {
            id_kecamatan: id_kecamatan
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pusat-puskesmas-desa").append(o);
            });
            $('#edit-pusat-puskesmas-desa').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });
            if (id_desa_selected) {
                $('#edit-pusat-puskesmas-desa').val(id_desa_selected).change().selectric('refresh');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitEditFormPuskesmas() {
    var id = $("#edit-id-pusat-puskesmas").val();
    var nama = $("#edit-pusat-puskesmas-nama").val();
    var id_provinsi = $("#edit-pusat-puskesmas-provinsi").val();
    var id_kota = $("#edit-pusat-puskesmas-kota").val();
    var id_kecamatan = $("#edit-pusat-puskesmas-kecamatan").val();
    var id_desa = $("#edit-pusat-puskesmas-desa").val();
    var alamat = $("#edit-pusat-puskesmas-alamat").val();

    var flag = 0;

    if (nama == "") {
        $("#invalid-edit-pusat-puskesmas-nama").css("display", "inline");
    } else {
        $("#invalid-edit-pusat-puskesmas-nama").css("display", "none");
        flag += 1;
    }

    if (alamat == "") {
        $("#invalid-edit-pusat-puskesmas-alamat").css("display", "inline");
    } else {
        $("#invalid-edit-pusat-puskesmas-alamat").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            id: id,
            nama: nama,
            id_provinsi: id_provinsi,
            id_kota: id_kota,
            id_kecamatan: id_kecamatan,
            id_desa: id_desa,
            alamat: alamat
        };
        swal({
                title: 'Apakah anda yakin ingin mengubah data puskesmas?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "puskesmas/edit-puskesmas",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#edit-pusat-puskesmas-submit-form').addClass('disabled');
                            $('#edit-pusat-puskesmas-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#edit-pusat-puskesmas-submit-form').removeClass('disabled');
                            $('#edit-pusat-puskesmas-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#edit-pusat-puskesmas-submit-form').addClass('disabled');
                            $('#edit-pusat-puskesmas-submit-form').addClass('btn-progress');
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

function listProvinsiAdd() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "../../puskesmas/puskesmas/daftar-provinsi",
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pusat-add-puskesmas-provinsi").append(o);
            });
            $('#pusat-add-puskesmas-provinsi').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listKota() {
    $("#pusat-add-puskesmas-kota").removeAttr('disabled');
    $('#pusat-add-puskesmas-kota').find('option').remove();
    var id_provinsi = $("#pusat-add-puskesmas-provinsi").val();
    jQuery.ajax({
        type: 'post',
        "url": "../../puskesmas/puskesmas/daftar-kota",
        data: {
            id_provinsi: id_provinsi
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pusat-add-puskesmas-kota").append(o);
            });
            $('#pusat-add-puskesmas-kota').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listKecamatan() {
    $("#pusat-add-puskesmas-kecamatan").removeAttr('disabled');
    $('#pusat-add-puskesmas-kecamatan').find('option').remove();
    var id_kota = $("#pusat-add-puskesmas-kota").val();
    jQuery.ajax({
        type: 'post',
        "url": "../../puskesmas/puskesmas/daftar-kecamatan",
        data: {
            id_kota: id_kota
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pusat-add-puskesmas-kecamatan").append(o);
            });
            $('#pusat-add-puskesmas-kecamatan').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listDesa() {
    $("#pusat-add-puskesmas-desa").removeAttr('disabled');
    $('#pusat-add-puskesmas-desa').find('option').remove();
    var id_kecamatan = $("#pusat-add-puskesmas-kecamatan").val();
    jQuery.ajax({
        type: 'post',
        "url": "../../puskesmas/puskesmas/daftar-desa",
        data: {
            id_kecamatan: id_kecamatan
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pusat-add-puskesmas-desa").append(o);
            });
            $('#pusat-add-puskesmas-desa').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitAddFormPuskesmas() {
    var nama = $("#pusat-add-puskesmas-nama").val();
    var id_provinsi = $("#pusat-add-puskesmas-provinsi").val();
    var id_kota = $("#pusat-add-puskesmas-kota").val();
    var id_kecamatan = $("#pusat-add-puskesmas-kecamatan").val();
    var id_desa = $("#pusat-add-puskesmas-desa").val();
    var alamat = $("#pusat-add-puskesmas-alamat").val();

    var flag = 0;

    if (nama == "") {
        $("#invalid-pusat-add-puskesmas-nama").css("display", "inline");
    } else {
        $("#invalid-pusat-add-puskesmas-nama").css("display", "none");
        flag += 1;
    }

    if (id_kota == null) {
        $("#invalid-pusat-add-puskesmas-kota").css("display", "inline");
    } else {
        $("#invalid-pusat-add-puskesmas-kota").css("display", "none");
        flag += 1;
    }

    if (id_kecamatan == null) {
        $("#invalid-pusat-add-puskesmas-kecamatan").css("display", "inline");
    } else {
        $("#invalid-pusat-add-puskesmas-kecamatan").css("display", "none");
        flag += 1;
    }

    if (id_desa == null) {
        $("#invalid-pusat-add-puskesmas-desa").css("display", "inline");
    } else {
        $("#invalid-pusat-add-puskesmas-desa").css("display", "none");
        flag += 1;
    }

    if (alamat == "") {
        $("#invalid-pusat-add-puskesmas-alamat").css("display", "inline");
    } else {
        $("#invalid-pusat-add-puskesmas-alamat").css("display", "none");
        flag += 1;
    }

    if (flag == 5) {
        var data = {
            nama: nama,
            provinsi: id_provinsi,
            kota: id_kota,
            kecamatan: id_kecamatan,
            desa: id_desa,
            alamat: alamat
        };
        var status;
        var pesan;
        swal({
                title: 'Apakah anda yakin ingin menambahkan data puskesmas?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "puskesmas-input",
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

function cariDataPuskesmasPusat() {
    $('#table-pusat-puskesmas').DataTable().ajax.reload();
}

//JQUERY CODE
$(document).ready(function() {
    var url = window.location.href;
    var parts = url.split('/').splice(2);

    if (parts.length == 3) {
        datatablePuskesmas();
        listProvinsi();
        fillEditProvinsi();
        $('#edit-pusat-puskesmas-provinsi').change(function() {
            fillEditKota();
        });
        $('#edit-pusat-puskesmas-kota').change(function() {
            fillEditKecamatan();
        });
        $('#edit-pusat-puskesmas-kecamatan').change(function() {
            fillEditDesa();
        });
    } else if (parts.length == 4) {
        listProvinsiAdd();
        $('#pusat-add-puskesmas-provinsi').change(function() {
            listKota();
        });
        $('#pusat-add-puskesmas-kota').change(function() {
            listKecamatan();
        });
        $('#pusat-add-puskesmas-kecamatan').change(function() {
            listDesa();
        });
    }
});