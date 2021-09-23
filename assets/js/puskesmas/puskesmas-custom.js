// /**
//  *
//  * You can write your JS code here, DO NOT touch the default style file
//  * because it will make it harder for you to update.
//  * 
//  */
// //"use strict";

// $.fn.serializeObject = function() {
//     var o = {};
//     var a = this.serializeArray();
//     $.each(a, function() {
//         if (o[this.name]) {
//             if (!o[this.name].push) {
//                 o[this.name] = [o[this.name]];
//             }
//             o[this.name].push(this.value || '');
//         } else {
//             o[this.name] = this.value || '';
//         }
//     });
//     return o;
// };

function datatablePuskesmas() {
    $("#table-puskesmas-puskesmas").dataTable({
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
            "url": "http://localhost/sim-odgj-server/api/puskesmas/daftar-puskesmas",
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
            { "data": "nama_desa" },
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
            },
            {
                "targets": 6,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {

                }
            },
            {
                "targets": 7,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    var html = "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataPuskesmas(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
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

function listProvinsi() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "daftar-provinsi",
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#puskesmas-provinsi").append(o);
            });
            $('#puskesmas-provinsi').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listKota() {
    $("#puskesmas-kota").removeAttr('disabled');
    $('#puskesmas-kota').find('option').remove();
    var id_provinsi = $("#puskesmas-provinsi").val();
    jQuery.ajax({
        type: 'post',
        "url": "daftar-kota",
        data: {
            id_provinsi: id_provinsi
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#puskesmas-kota").append(o);
            });
            $('#puskesmas-kota').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listKecamatan() {
    $("#puskesmas-kecamatan").removeAttr('disabled');
    $('#puskesmas-kecamatan').find('option').remove();
    var id_kota = $("#puskesmas-kota").val();
    jQuery.ajax({
        type: 'post',
        "url": "daftar-kecamatan",
        data: {
            id_kota: id_kota
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#puskesmas-kecamatan").append(o);
            });
            $('#puskesmas-kecamatan').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listDesa() {
    $("#puskesmas-desa").removeAttr('disabled');
    $('#puskesmas-desa').find('option').remove();
    var id_kecamatan = $("#puskesmas-kecamatan").val();
    jQuery.ajax({
        type: 'post',
        "url": "daftar-desa",
        data: {
            id_kecamatan: id_kecamatan
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#puskesmas-desa").append(o);
            });
            $('#puskesmas-desa').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitFormPuskesmas() {
    var nama = $("#puskesmas-nama").val();
    var provinsi = $("#puskesmas-provinsi").val();
    var kota = $("#puskesmas-kota").val();
    var kecamatan = $("#puskesmas-kecamatan").val();
    var desa = $("#puskesmas-desa").val();
    var alamat = $("#puskesmas-alamat").val();
    var flag = 0;
    if (nama == "") {
        $("#invalid-puskesmas-nama").css("display", "inline");
    } else {
        $("#invalid-puskesmas-nama").css("display", "none");
        flag += 1;
    }

    if (provinsi == null) {
        $("#invalid-puskesmas-provinsi").css("display", "inline");
    } else {
        $("#invalid-puskesmas-provinsi").css("display", "none");
        flag += 1;
    }

    if (kota == null) {
        $("#invalid-puskesmas-kota").css("display", "inline");
    } else {
        $("#invalid-puskesmas-kota").css("display", "none");
        flag += 1;
    }

    if (kecamatan == null) {
        $("#invalid-puskesmas-kecamatan").css("display", "inline");
    } else {
        $("#invalid-puskesmas-kecamatan").css("display", "none");
        flag += 1;
    }

    if (desa == null) {
        $("#invalid-puskesmas-desa").css("display", "inline");
    } else {
        $("#invalid-puskesmas-desa").css("display", "none");
        flag += 1;
    }
    if (alamat == "") {
        $("#invalid-puskesmas-alamat").css("display", "inline");
    } else {
        $("#invalid-puskesmas-alamat").css("display", "none");
        flag += 1;
    }

    if (flag == 6) {
        console.log(flag);
        var data = {
            nama: nama,
            provinsi: provinsi,
            kota: kota,
            kecamatan: kecamatan,
            desa: desa,
            alamat: alamat
        };
        console.log(data)
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
                            $('#btn-puskesmas-submit').addClass('disabled');
                            $('#btn-puskesmas-submit').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#btn-puskesmas-submit').removeClass('disabled');
                            $('#btn-puskesmas-submit').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#btn-puskesmas-submit').addClass('disabled');
                            $('#btn-puskesmas-submit').addClass('btn-progress');
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
    datatablePuskesmas();
    // $('#btn-obat-add-form').click(function(){
    //     $(form).appendTo('#form-obat');
    //     $('select.test-select').select2();
    // });
    listProvinsi();
    $('#puskesmas-provinsi').change(function() {
        listKota();
    });
    $('#puskesmas-kota').change(function() {
        listKecamatan();
    });
    $('#puskesmas-kecamatan').change(function() {
        listDesa();
    });
});