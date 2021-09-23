function datatableObat() {
    $("#table-pusat-obat").dataTable({
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
            "url": "obat/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-obat').val();
                d.kategori = $('#filter-pusat-kategori-obat').val();
            },
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
                    $(td).html(html);
                }
            }
        ]
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
            $('#detail-obat-pusat-nama').html(nama);

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
            $('#detail-obat-pusat-kategori').html(kategori);

            var komposisi = "<p>" + response.data[0].komposisi + "</p>";
            $('#detail-obat-pusat-komposisi').html(komposisi);

            var deskripsi = "<p>" + response.data[0].deskripsi + "</p>";
            $('#detail-obat-pusat-deskripsi').html(deskripsi);

        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-obat-pusat').modal('toggle');
        }
    });
}

function cariDataObatPusat() {
    $('#table-pusat-obat').DataTable().ajax.reload();
}

$(document).ready(function() {
    datatableObat();
    // $('#btn-obat-add-form').click(function(){
    //     $(form).appendTo('#form-obat');
    //     $('select.test-select').select2();
    // });
});