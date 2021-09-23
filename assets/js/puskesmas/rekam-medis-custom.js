function datatableRekamMedis() {
    $("#table-puskesmas-rekam-medis").dataTable({
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
            "url": "rekam-medis/datatable-rekam-medis",
            "data": function(d) {},
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama_pasien" },
            { "data": "nama_dokter" },
            { "data": "diagnosis" },
            { "data": "cdate" },
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
                "searchable": true,
                "orderable": true,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                }
            },
            {
                "targets": 5,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataRekamMedis(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataRekamMedis(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataRekamMedis(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function editDataRekamMedis(id) {
    var row = 1;
    jQuery.ajax({
        type: 'post',
        "url": "rekam-medis/detail-edit-rekam-medis",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {
            $('#edit-form-obat').empty();
        },
        success: function(response) {
            //console.log(response.data);
            var id = response.data.id;
            $('#edit-id-rekam-medis').val(id);

            var pasien = response.data.id_pasien;
            $('#edit-rekam-medis-pasien').val(pasien).change().selectric('refresh');

            var dokter = response.data.id_dokter;
            $('#edit-rekam-medis-dokter').val(dokter).change().selectric('refresh');

            var diagnosis = response.data.diagnosis;
            $('#edit-rekam-medis-diagnosis').val(diagnosis);

            $.each(response.data.data_berobat, function(i, item) {
                var id_obat = item.id_obat;
                var jumlah = item.jumlah;
                addEditFormObat(row, id_obat, jumlah);
                row++;
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-edit-rekam-medis').modal('toggle');
        }
    });
}

function addEditFormObat(id, id_obat, jumlah) {
    var html = '<div class="col-7 col-md-7 col-lg-7" id="edit-wrapper-jenis-' + id + '"><div class="form-group"><label><h6>Jenis Obat</h6></label><select id="edit-daftar-obat-' + id + '" class="form-control" name="id_obat[]"></select></div></div>' +
        '<div class="col-3 col-md-3 col-lg-3" id="edit-wrapper-jumlah-' + id + '"><div class="form-group"><label><h6>Jumlah Obat</h6></label><input type="number" id="edit-jumlah-obat' + id + '" class="form-control" name="jumlah[]" value="0"></div></div>' +
        '<div class="col-2 col-md-2 col-lg-2" id="edit-wrapper-remove-' + id + '"><button type="button" id="edit-remove-' + id + '" class="btn btn-danger btn_edit_remove" style="margin-top: 40px">X</button></div>';
    $('#edit-form-obat').append(html);
    //listEditObat("edit-daftar-obat-" + id + "", id_obat, jumlah);
    listEditObat(id, id_obat, jumlah);
}

function listEditObat(id_tag, id_obat, jumlah) {
    if (id_tag) {
        var tag = '#edit-daftar-obat-' + id_tag;
    }
    jQuery.ajax({
        type: 'get',
        "url": 'rekam-medis/daftar-obat',
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                //$(o).html(item.nama);
                $(tag).append(o);
            });
            $(tag).select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            if (id_obat && jumlah) {
                //alert(id_obat);
                $(tag).val(id_obat).trigger('change');
                $('#edit-jumlah-obat' + id_tag).val(jumlah);
            }
        }
    });
}

function fillEditPasien() {
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
                $("#edit-rekam-medis-pasien").append(o);
            });
            $('#edit-rekam-medis-pasien').selectric();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditDokter() {
    jQuery.ajax({
        type: 'get',
        "url": "rekam-medis/daftar-dokter",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-rekam-medis-dokter").append(o);
            });
            $('#edit-rekam-medis-dokter').selectric();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function detailDataRekamMedis(id) {
    jQuery.ajax({
        type: 'post',
        "url": "rekam-medis/detail-rekam-medis",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            console.log(response);

            var nama = "<p>" + response.data.nama_pasien + "</p>";
            $('#detail-rekam-medis-pasien').html(nama);

            var dokter = "<p>" + response.data.nama_dokter + "</p>";
            $('#detail-rekam-medis-dokter').html(dokter);

            var diagnosis = response.data.diagnosis;
            if (diagnosis == "") {
                var diagnosis = "<p>Tidak Ada</p>";
            } else {
                var diagnosis = "<p>" + response.data.diagnosis + "</p>";
            }
            $('#detail-rekam-medis-diagnosis').html(diagnosis);

            $("#detail-rekam-medis-obat").empty();
            $.each(response.data.data_berobat, function(i, item) {
                var o = "<p>" + item.nama + " " + "(Jumlah : " + item.jumlah + ")</p>";
                $("#detail-rekam-medis-obat").append(o);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-rekam-medis').modal('toggle');
        }
    });
}

function listPasienSehat() {
    //test output json
    $('#rekam-medis-pasien').select2('destroy');
    jQuery.ajax({
        type: 'get',
        "url": '../perawatan/daftar-pasien-sehat',
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                //$(o).html(item.nama);
                $("#rekam-medis-pasien").append(o);
            });
            $('#rekam-medis-pasien').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listDokter() {
    //test output json
    $('#rekam-medis-dokter').select2('destroy');
    jQuery.ajax({
        type: 'get',
        "url": '../rekam-medis/daftar-dokter',
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                //$(o).html(item.nama);
                $("#rekam-medis-dokter").append(o);
            });
            $('#rekam-medis-dokter').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listObat(id_tag) {
    if (id_tag) {
        var tag = '#' + id_tag;
    } else {
        var tag = "#medis-daftar-obat"
    }
    jQuery.ajax({
        type: 'get',
        "url": '../rekam-medis/daftar-obat',
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                //$(o).html(item.nama);
                $(tag).append(o);
            });
            $(tag).select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function addFormObat(id) {
    var html = '<div class="col-7 col-md-7 col-lg-7" id="wrapper-jenis-' + id + '"><div class="form-group"><label><h6>Jenis Obat</h6></label><select id="daftar-obat-' + id + '" class="form-control select2" name="id_obat[]"></select></div></div>' +
        '<div class="col-3 col-md-3 col-lg-3" id="wrapper-jumlah-' + id + '"><div class="form-group"><label><h6>Jumlah Obat</h6></label><input type="number" class="form-control" name="jumlah[]" value="0"></div></div>' +
        '<div class="col-2 col-md-2 col-lg-2" id="wrapper-remove-' + id + '"><button type="button" id="remove-' + id + '" class="btn btn-danger btn_remove" style="margin-top: 40px">X</button></div>';
    $('#form-obat').append(html);
    listObat("daftar-obat-" + id + "");
}

function deleteDataRekamMedis(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data rekam medis?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "rekam-medis/hapus-rekam-medis",
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

function submitFormRekamMedis() {
    var data = $('#form-add-rekam-medis').serialize();
    //console.log(JSON.stringify(data));
    swal({
            title: 'Apakah anda yakin ingin menambahkan data rekam medis pasien?',
            text: 'periksa kembali sebelum input data anda',
            icon: 'info',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "rekam-medis-input",
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(response) {

                    },
                    error: function(xhr, ajaxOptions, thrownError) {

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

function submitEditFormRekamMedis() {
    var data = $('#form-edit-rekam-medis').serialize();
    //console.log(JSON.stringify(data));
    swal({
            title: 'Apakah anda yakin ingin mengubah data rekam medis pasien?',
            text: 'periksa kembali sebelum input data anda',
            icon: 'info',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "rekam-medis/edit-rekam-medis",
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {

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

$(document).ready(function() {
    var i = 1;
    var j = 100;
    var url = window.location.href;
    var parts = url.split('/').splice(2);

    $('#button-tambah-obat').click(function() {
        addFormObat(i);
        i++;
    });

    $('#button-edit-tambah-obat').click(function() {
        addEditFormObat(j, null, null);
        j++;
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        var id = button_id.substr(button_id.length - 1);
        //alert(id);
        $('#wrapper-jenis-' + id + '').remove();
        $('#wrapper-jumlah-' + id + '').remove();
        $('#wrapper-remove-' + id + '').remove();
    });

    $(document).on('click', '.btn_edit_remove', function() {
        var button_id = $(this).attr("id");
        var id = button_id.slice(12);
        //alert(id);
        $('#edit-wrapper-jenis-' + id + '').remove();
        $('#edit-wrapper-jumlah-' + id + '').remove();
        $('#edit-wrapper-remove-' + id + '').remove();
    });

    if (parts.length == 3) {
        datatableRekamMedis();
        fillEditPasien();
        fillEditDokter();
    } else {
        listPasienSehat();
        listDokter();
        listObat();
    }
});