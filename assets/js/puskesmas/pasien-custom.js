function datatablePasien() {
    $("#table-puskesmas-pasien").dataTable({
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
            "url": "pasien/datatable-pasien",
            "data": function(d) {},
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "nama_puskesmas" },
            { "data": "alamat" },
            { "data": "status_jkn" },
            { "data": "status_pasien" },
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
                    if (rowData.status_jkn == 1) {
                        $(td).html("Aktif");
                    } else {
                        $(td).html("Tidak Aktif");
                    }
                }
            },
            {
                "targets": 5,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    if (rowData.status_pasien == 1) {
                        var html = "<p><span class='badge badge-primary'>Sehat</span></p>"
                        $(td).html(html);
                    } else {
                        var html = "<p><span class='badge badge-danger'>Meninggal</span></p>"
                        $(td).html(html);
                    }
                }
            },
            {
                "targets": 6,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    var html = "<button class='btn btn-sm btn-primary' style='margin-left: 10px;' onclick='detailDataPasien(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning' style='margin-left: 10px;' onclick='editDataPasien(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger' style='margin-left: 10px;' onclick='deleteDataPasien(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function detailDataPasien(id) {
    //alert(id);
    jQuery.ajax({
        type: 'post',
        "url": "pasien/detail-pasien",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            if (response.data[0].status_pasien == 1) {
                var nama = "<p>" + response.data[0].nama + " <span class='badge badge-primary'>Sehat</span></p>";
            } else {
                var nama = "<p>" + response.data[0].nama + " <span class='badge badge-danger'>Meninggal</span></p>";
            }
            $('#detail-pasien-nama').html(nama);

            var puskesmas = "<p>" + response.data[0].nama_puskesmas + "</p>"
            $('#detail-pasien-puskesmas').html(puskesmas);

            var jenis_kelamin = "<p>" + response.data[0].jenis_kelamin + "</p>"
            $('#detail-pasien-jenis-kelamin').html(jenis_kelamin);


            var options = { weekday: 'short', year: 'numeric', month: 'long', day: 'numeric' };
            var date = new Date(response.data[0].tanggal_lahir.replace(/-/g, "/"));
            var exec = date.toLocaleDateString("en-US", options);
            var tanggal_lahir = "<p>" + exec + "</p>";
            $('#detail-pasien-tanggal-lahir').html(tanggal_lahir);

            var alamat = "<p>" + response.data[0].alamat + "</p>"
            $('#detail-pasien-alamat').html(alamat);

            var kota = "<p>" + response.data[0].nama_kota + "</p>"
            $('#detail-pasien-kota').html(kota);

            var rt = "<p>" + response.data[0].rt + "</p>"
            $('#detail-pasien-rt').html(rt);

            var rw = "<p>" + response.data[0].rw + "</p>"
            $('#detail-pasien-rw').html(rw);

            var kecamatan = "<p>" + response.data[0].nama_kecamatan + "</p>"
            $('#detail-pasien-kecamatan').html(kecamatan);

            var desa = "<p>" + response.data[0].nama_desa + "</p>"
            $('#detail-pasien-desa').html(desa);

            var provinsi = "<p>" + response.data[0].nama_provinsi + "</p>"
            $('#detail-pasien-provinsi').html(provinsi);

            if (response.data[0].status_jkn == 1) {
                var status_jkn = "<p>JKN</p>"
            } else {
                var status_jkn = "<p>Non JKN</p>"
            }
            $('#detail-pasien-status-jkn').html(status_jkn);

            if (response.data[0].status_pengobatan == 1) {
                var status_pengobatan = "<p>Aktif</p>"
            } else {
                var status_pengobatan = "<p>Tidak Aktif</p>"
            }
            $('#detail-pasien-status-pengobatan').html(status_pengobatan);
        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-pasien').modal('toggle');
        }
    });
}

function editDataPasien(id) {
    $('#modal-edit-pasien').modal('toggle');
    jQuery.ajax({
        type: 'post',
        "url": "pasien/detail-edit-pasien",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id = response.data[0].id;
            $('#edit-id-pasien').val(id);

            var nama = response.data[0].nama;
            $('#edit-pasien-nama').val(nama);

            var alamat = response.data[0].alamat;
            $('#edit-pasien-alamat').val(alamat);

            var tanggal_lahir = response.data[0].tanggal_lahir;
            $('#edit-pasien-tanggal-lahir').val(tanggal_lahir);

            var jenis_kelamin = response.data[0].jenis_kelamin;
            $('#edit-pasien-jenis-kelamin').val(jenis_kelamin).change().selectric('refresh');

            var rt = response.data[0].rt;
            $('#edit-pasien-rt').val(rt);

            var rw = response.data[0].rw;
            $('#edit-pasien-rw').val(rw);

            var status_jkn = response.data[0].status_jkn;
            $('#edit-pasien-status-jkn').val(status_jkn).change().selectric('refresh');

            var status_pengobatan = response.data[0].status_pengobatan;
            $('#edit-pasien-status-pengobatan').val(status_pengobatan).change().selectric('refresh');

            var status_pasien = response.data[0].status_pasien;
            $('#edit-pasien-status-pasien').val(status_pasien).change().selectric('refresh');

            var provinsi = response.data[0].id_provinsi;
            $('#edit-pasien-provinsi').val(provinsi).change().selectric('refresh');

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

        }
    });
}

function fillEditProvinsi() {
    jQuery.ajax({
        type: 'get',
        "url": "puskesmas/daftar-provinsi",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pasien-provinsi").append(o);
            });
            $('#edit-pasien-provinsi').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditKota(id_provinsi_selected, id_kota_selected) {
    $('#edit-pasien-kota').find('option').remove();
    if (id_provinsi_selected) {
        var id_provinsi = id_provinsi_selected;
        console.log("id provinsi : " + id_provinsi);
    } else {
        var id_provinsi = $("#edit-pasien-provinsi").val();
        console.log("id provinsi : " + id_provinsi);
    }

    jQuery.ajax({
        type: 'post',
        "url": 'puskesmas/daftar-kota',
        data: {
            id_provinsi: id_provinsi
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pasien-kota").append(o);
            });
            $('#edit-pasien-kota').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });

            if (id_kota_selected) {
                $('#edit-pasien-kota').val(id_kota_selected).change().selectric('refresh');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditKecamatan(id_kota_selected, id_kecamatan_selected) {
    $('#edit-pasien-kecamatan').find('option').remove();
    if (id_kota_selected) {
        var id_kota = id_kota_selected;
        console.log("id kota : " + id_kota_selected);
    } else {
        var id_kota = $("#edit-pasien-kota").val();
        console.log("id kota : " + id_kota);
    }
    jQuery.ajax({
        type: 'post',
        "url": 'puskesmas/daftar-kecamatan',
        data: {
            id_kota: id_kota
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pasien-kecamatan").append(o);
            });
            $('#edit-pasien-kecamatan').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });
            if (id_kecamatan_selected) {
                $('#edit-pasien-kecamatan').val(id_kecamatan_selected).change().selectric('refresh');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function fillEditDesa(id_kecamatan_selected, id_desa_selected) {
    $('#edit-pasien-desa').find('option').remove();
    if (id_kecamatan_selected) {
        var id_kecamatan = id_kecamatan_selected;
        console.log("id kecamatan : " + id_kecamatan);
    } else {
        var id_kecamatan = $("#edit-pasien-kecamatan").val();
        console.log("id kecamatan : " + id_kecamatan);
    }

    jQuery.ajax({
        type: 'post',
        "url": 'puskesmas/daftar-desa',
        data: {
            id_kecamatan: id_kecamatan
        },
        dataType: 'json',
        success: function(response) {
            console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#edit-pasien-desa").append(o);
            });
            $('#edit-pasien-desa').selectric({
                maxHeight: 200,
                preventWindowScroll: false
            });
            if (id_desa_selected) {
                $('#edit-pasien-desa').val(id_desa_selected).change().selectric('refresh');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function deleteDataPasien(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data pasien?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "pasien/hapus-pasien",
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

function listProvinsi(url) {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": url,
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pasien-provinsi").append(o);
            });
            $('#pasien-provinsi').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listKota(url) {
    $("#pasien-kota").removeAttr('disabled');
    $('#pasien-kota').find('option').remove();
    var id_provinsi = $("#pasien-provinsi").val();
    jQuery.ajax({
        type: 'post',
        "url": url,
        data: {
            id_provinsi: id_provinsi
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pasien-kota").append(o);
            });
            $('#pasien-kota').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listKecamatan() {
    $("#pasien-kecamatan").removeAttr('disabled');
    $('#pasien-kecamatan').find('option').remove();
    var id_kota = $("#pasien-kota").val();
    jQuery.ajax({
        type: 'post',
        "url": "../puskesmas/daftar-kecamatan",
        data: {
            id_kota: id_kota
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pasien-kecamatan").append(o);
            });
            $('#pasien-kecamatan').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listDesa() {
    $("#pasien-desa").removeAttr('disabled');
    $('#pasien-desa').find('option').remove();
    var id_kecamatan = $("#pasien-kecamatan").val();
    jQuery.ajax({
        type: 'post',
        "url": "../puskesmas/daftar-desa",
        data: {
            id_kecamatan: id_kecamatan
        },
        dataType: 'json',
        success: function(response) {
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama);
                $("#pasien-desa").append(o);
            });
            $('#pasien-desa').select2();
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function submitFormPasien() {
    var nama = $("#pasien-nama").val();
    var alamat = $("#pasien-alamat").val();
    var tanggal_lahir = $("#pasien-tanggal-lahir").val();
    var jenis_kelamin = $("#pasien-jenis-kelamin").val();
    var rt = $("#pasien-rt").val();
    var rw = $("#pasien-rw").val();
    var id_provinsi = $("#pasien-provinsi").val();
    var id_kota = $("#pasien-kota").val();
    var id_kecamatan = $("#pasien-kecamatan").val();
    var id_desa = $("#pasien-desa").val();
    var status_jkn = $("#pasien-status-jkn").val();
    var status_pengobatan = $("#pasien-status-pengobatan").val();
    var status_pasien = $("#pasien-status-pasien").val();
    var flag = 0;

    if (nama == "") {
        $("#invalid-pasien-nama").css("display", "inline");
    } else {
        $("#invalid-pasien-nama").css("display", "none");
        flag += 1;
    }

    if (alamat == "") {
        $("#invalid-pasien-alamat").css("display", "inline");
    } else {
        $("#invalid-pasien-alamat").css("display", "none");
        flag += 1;
    }

    if (rt == "") {
        $("#invalid-pasien-rt").css("display", "inline");
    } else {
        $("#invalid-pasien-rt").css("display", "none");
        flag += 1;
    }

    if (rw == "") {
        $("#invalid-pasien-rw").css("display", "inline");
    } else {
        $("#invalid-pasien-rw").css("display", "none");
        flag += 1;
    }

    if (id_provinsi == null) {
        $("#invalid-pasien-provinsi").css("display", "inline");
    } else {
        $("#invalid-pasien-provinsi").css("display", "none");
        flag += 1;
    }

    if (id_kota == null) {
        $("#invalid-pasien-kota").css("display", "inline");
    } else {
        $("#invalid-pasien-kota").css("display", "none");
        flag += 1;
    }

    if (id_kecamatan == null) {
        $("#invalid-pasien-kecamatan").css("display", "inline");
    } else {
        $("#invalid-pasien-kecamatan").css("display", "none");
        flag += 1;
    }

    if (id_desa == null) {
        $("#invalid-pasien-desa").css("display", "inline");
    } else {
        $("#invalid-pasien-desa").css("display", "none");
        flag += 1;
    }

    if (flag == 8) {
        var data = {
            nama: nama,
            alamat: alamat,
            tanggal_lahir: tanggal_lahir,
            jenis_kelamin: jenis_kelamin,
            rt: rt,
            rw: rw,
            id_provinsi: id_provinsi,
            id_kota: id_kota,
            id_kecamatan: id_kecamatan,
            id_desa: id_desa,
            status_jkn: status_jkn,
            status_pengobatan: status_pengobatan,
            status_pasien: status_pasien
        };
        console.log(data);
        swal({
                title: 'Apakah anda yakin ingin menambahkan data pasien?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "pasien-input",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#btn-pasien-submit-form').addClass('disabled');
                            $('#btn-pasien-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#btn-pasien-submit-form').removeClass('disabled');
                            $('#btn-pasien-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#btn-pasien-submit-form').addClass('disabled');
                            $('#btn-pasien-submit-form').addClass('btn-progress');
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

function submitEditFormPasien() {
    var id = $("#edit-id-pasien").val();
    var nama = $("#edit-pasien-nama").val();
    var alamat = $("#edit-pasien-alamat").val();
    var tanggal_lahir = $("#edit-pasien-tanggal-lahir").val();
    var jenis_kelamin = $("#edit-pasien-jenis-kelamin").val();
    var rt = $("#edit-pasien-rt").val();
    var rw = $("#edit-pasien-rw").val();
    var id_provinsi = $("#edit-pasien-provinsi").val();
    var id_kota = $("#edit-pasien-kota").val();
    var id_kecamatan = $("#edit-pasien-kecamatan").val();
    var id_desa = $("#edit-pasien-desa").val();
    var status_jkn = $("#edit-pasien-status-jkn").val();
    var status_pengobatan = $("#edit-pasien-status-pengobatan").val();
    var status_pasien = $("#edit-pasien-status-pasien").val();
    var flag = 0;

    if (nama == "") {
        $("#invalid-edit-pasien-nama").css("display", "inline");
    } else {
        $("#invalid-edit-pasien-nama").css("display", "none");
        flag += 1;
    }

    if (alamat == "") {
        $("#invalid-edit-pasien-alamat").css("display", "inline");
    } else {
        $("#invalid-edit-pasien-alamat").css("display", "none");
        flag += 1;
    }

    if (rt == "") {
        $("#invalid-edit-pasien-rt").css("display", "inline");
    } else {
        $("#invalid-edit-pasien-rt").css("display", "none");
        flag += 1;
    }

    if (rw == "") {
        $("#invalid-edit-pasien-rw").css("display", "inline");
    } else {
        $("#invalid-edit-pasien-rw").css("display", "none");
        flag += 1;
    }

    if (flag == 4) {
        var data = {
            id: id,
            nama: nama,
            alamat: alamat,
            tanggal_lahir: tanggal_lahir,
            jenis_kelamin: jenis_kelamin,
            rt: rt,
            rw: rw,
            id_provinsi: id_provinsi,
            id_kota: id_kota,
            id_kecamatan: id_kecamatan,
            id_desa: id_desa,
            status_jkn: status_jkn,
            status_pengobatan: status_pengobatan,
            status_pasien: status_pasien
        };
        swal({
                title: 'Apakah anda yakin ingin mengubah data pasien?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "pasien/edit-pasien",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#edit-pasien-submit-form').addClass('disabled');
                            $('#edit-pasien-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#edit-pasien-submit-form').removeClass('disabled');
                            $('#edit-pasien-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#edit-pasien-submit-form').addClass('disabled');
                            $('#edit-pasien-submit-form').addClass('btn-progress');
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

//JQUERY CODE
$(document).ready(function() {
    var url = window.location.href;
    var parts = url.split('/').splice(2);

    if (parts.length == 3) {
        fillEditProvinsi();
        datatablePasien();
        $('#edit-pasien-provinsi').change(function() {
            fillEditKota();
        });
        $('#edit-pasien-kota').change(function() {
            fillEditKecamatan();
        });
        $('#edit-pasien-kecamatan').change(function() {
            fillEditDesa();
        });
    } else {
        if (parts[3] == "pasien-form") {
            listProvinsi("../puskesmas/daftar-provinsi");
            $('#pasien-provinsi').change(function() {
                listKota("../puskesmas/daftar-kota");
            });
            $('#pasien-kota').change(function() {
                listKecamatan();
            });
            $('#pasien-kecamatan').change(function() {
                listDesa();
            });
        }
    }
});