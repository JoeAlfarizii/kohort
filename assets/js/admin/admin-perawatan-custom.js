function datatablePerawatan() {
    $("#table-pusat-perawatan").dataTable({
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
            "url": "perawatan/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-perawatan').val();
                d.id_puskesmas = $('#filter-pusat-puskesmas-perawatan').val();
            },
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
                    $(td).html(html);
                }
            }
        ]
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
            $('#detail-perawatan-pusat-nama').html(nama);

            if (response.data[0].jenis_perawatan == 0) {
                var jenis = "<p>Mandiri</p>"
            } else {
                var jenis = "<p>Rujuk</p>"
            }
            $('#detail-perawatan-pusat-jenis').html(jenis);

            if (response.data[0].status_rujuk_balik == 0) {
                var status_rujuk = "<p>Non Rujukan</p>"
            } else {
                var status_rujuk = "<p>Rujukan</p>"
            }
            $('#detail-perawatan-pusat-status-rujuk').html(status_rujuk);

            if (response.data[0].status_kemandirian == 0) {
                var status_kemandirian = "<p>Mandiri</p>"
            } else {
                var status_kemandirian = "<p>Non Mandiri</p>"
            }
            $('#detail-perawatan-pusat-status-kemandirian').html(status_kemandirian);

            var alasan = "<p>" + response.data[0].alasan + "</p>";
            $('#detail-perawatan-pusat-alasan').html(alasan);

        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-perawatan-pusat').modal('toggle');
        }
    });
}

function dataManajemenPerawatan() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "perawatan/data-manajemen-perawatan",
        dataType: 'json',
        success: function(response) {
            $('#pusat-perawatan-total').text(response.data[0].total_perawatan);
            $('#pusat-perawatan-total-mandiri').text(response.data[0].total_perawatan_mandiri);
            $('#pusat-perawatan-total-rujuk').text(response.data[0].total_status_rujuk);
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function listPuskesmas() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "../puskesmas/puskesmas/daftar-puskesmas",
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            $.each(response.data, function(i, item) {
                var o = new Option(item.nama, item.id);
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(item.nama + ' - ' + item.nama_kecamatan + ', ' + item.nama_kota);
                $("#filter-pusat-puskesmas-perawatan").append(o);
            });
            $('#filter-pusat-puskesmas-perawatan').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function cariDataPerawatanPusat() {
    $('#table-pusat-perawatan').DataTable().ajax.reload();
}

//JQUERY CODE
$(document).ready(function() {
    dataManajemenPerawatan();
    datatablePerawatan();
    listPuskesmas();
});