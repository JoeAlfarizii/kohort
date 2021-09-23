function datatableObat() {
    $("#table-puskesmas-obat").dataTable({
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
            "url": "obat/datatable-obat",
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "kategori" },
            { "data": "komposisi" },
            { "data": "deskripsi" },
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
                    if (rowData.kategori == 0) {
                        $(td).html("Golongan A");
                    } else if (rowData.kategori == 1) {
                        $(td).html("Golongan B");
                    } else if (rowData.kategori == 2) {
                        $(td).html("Golongan C");
                    } else if (rowData.kategori == 3) {
                        $(td).html("Golongan D");
                    } else if (rowData.kategori == 4) {
                        $(td).html("Golongan X");
                    }
                }
            },
            {
                "targets": 5,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataObat(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    html += "<button class='btn btn-sm btn-warning'  style='margin-left: 10px;' onclick='editDataObat(" + rowData.id + ");'><i class='fas fa-pencil-alt'></i> Ubah</button>";
                    html += "<button class='btn btn-sm btn-danger'  style='margin-left: 10px;' onclick='deleteDataObat(" + rowData.id + ");'><i class='fas fa-trash'></i> Hapus</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function editDataObat(id) {
    $('#modal-edit-obat').modal('toggle');
    jQuery.ajax({
        type: 'post',
        "url": "obat/detail-obat",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var id_obat = response.data[0].id;
            $('#edit-id-obat').val(id_obat);

            var nama = response.data[0].nama;
            $('#edit-obat-nama').val(nama);

            var kategori = response.data[0].kategori;
            $('#edit-obat-kategori').val(kategori).change().selectric('refresh');

            var komposisi = response.data[0].komposisi;
            $('#edit-obat-komposisi').val(komposisi);

            var deskripsi = response.data[0].deskripsi;
            $('#edit-obat-deskripsi').val(deskripsi);
        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {

        }
    });
}

function detailDataObat(id) {
    //alert(id);
    jQuery.ajax({
        type: 'post',
        "url": "obat/detail-obat",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            var nama = "<p>" + response.data[0].nama + "</p>";
            $('#detail-obat-nama').html(nama);

            if (response.data[0].kategori == 0) {
                var kategori = "<p>Golongan A</p>";
            } else if (response.data[0].kategori == 1) {
                var kategori = "<p>Golongan B</p>";
            } else if (response.data[0].kategori == 2) {
                var kategori = "<p>Golongan C</p>";
            } else if (response.data[0].kategori == 3) {
                var kategori = "<p>Golongan D</p>";
            } else if (response.data[0].kategori == 4) {
                var kategori = "<p>Golongan X</p>";
            }
            $('#detail-obat-kategori').html(kategori);

            var komposisi = "<p>" + response.data[0].komposisi + "</p>";
            $('#detail-obat-komposisi').html(komposisi);

            var deskripsi = "<p>" + response.data[0].deskripsi + "</p>";
            $('#detail-obat-deskripsi').html(deskripsi);

        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-obat').modal('toggle');
        }
    });
}

function deleteDataObat(id) {
    var data = {
        id: id
    }
    swal({
            title: 'Apakah anda yakin ingin menghapus data obat?',
            text: 'periksa kembali sebelum hapus data anda',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'post',
                    "url": "obat/hapus-obat",
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

function submitEditFormObat() {
    var id = $("#edit-id-obat").val();
    var nama = $("#edit-obat-nama").val();
    var komposisi = $("#edit-obat-komposisi").val();
    var kategori = $("#edit-obat-kategori").val();
    var deskripsi = $("#edit-obat-deskripsi").val();
    var flag = 0;

    if (nama == "") {
        $("#invalid-edit-obat-nama").css("display", "inline");
    } else {
        $("#invalid-edit-obat-nama").css("display", "none");
        flag += 1;
    }

    if (komposisi == "") {
        $("#invalid-edit-obat-komposisi").css("display", "inline");
    } else {
        $("#invalid-edit-obat-komposisi").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            id: id,
            nama: nama,
            kategori: kategori,
            komposisi: komposisi,
            deskripsi: deskripsi
        }
        swal({
                title: 'Apakah anda yakin ingin mengubah data obat?',
                text: 'periksa kembali sebelum submit data anda',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "obat/edit-obat",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#edit-obat-submit-form').addClass('disabled');
                            $('#edit-obat-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#edit-obat-submit-form').removeClass('disabled');
                            $('#edit-obat-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#edit-obat-submit-form').addClass('disabled');
                            $('#edit-obat-submit-form').addClass('btn-progress');
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

function submitFormObat() {
    var nama = $("#obat-nama").val();
    var komposisi = $("#obat-komposisi").val();
    var kategori = $("#obat-kategori").val();
    var deskripsi = $("#obat-deskripsi").val();
    var flag = 0;

    if (nama == "") {
        $("#invalid-obat-nama").css("display", "inline");
    } else {
        $("#invalid-obat-nama").css("display", "none");
        flag += 1;
    }

    if (komposisi == "") {
        $("#invalid-obat-komposisi").css("display", "inline");
    } else {
        $("#invalid-obat-komposisi").css("display", "none");
        flag += 1;
    }

    if (flag == 2) {
        var data = {
            nama: nama,
            kategori: kategori,
            komposisi: komposisi,
            deskripsi: deskripsi
        }
        console.log(data);
        swal({
                title: 'Apakah anda yakin ingin menambahkan data obat?',
                text: 'periksa kembali sebelum input data anda',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.ajax({
                        type: 'post',
                        "url": "obat-input",
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $('#btn-obat-submit-form').addClass('disabled');
                            $('#btn-obat-submit-form').addClass('btn-progress');
                        },
                        success: function(response) {
                            $('#btn-obat-submit-form').removeClass('disabled');
                            $('#btn-obat-submit-form').removeClass('btn-progress');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $('#btn-obat-submit-form').addClass('disabled');
                            $('#btn-obat-submit-form').addClass('btn-progress');
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
        datatableObat();
    }
});