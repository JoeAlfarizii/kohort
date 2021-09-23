function datatablePasung() {
    $("#table-pusat-pasung").dataTable({
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
            "url": "pasung/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-pasung').val();
                d.id_puskesmas = $('#filter-pusat-puskesmas-pasung').val();
            },
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
                    $(td).html(html);
                }
            }
        ]
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
            $('#detail-pasung-pusat-nama').html(nama);

            var jenis_tindakan = "<p>" + response.data[0].jenis_tindakan + "</p>";
            $('#detail-pasung-pusat-jenis-tindakan').html(jenis_tindakan);

            var options = { weekday: 'short', year: 'numeric', month: 'long', day: 'numeric' };
            var date = new Date(response.data[0].tanggal_penindakan.replace(/-/g, "/"));
            var exec = date.toLocaleDateString("en-US", options);
            var tanggal = "<p>" + exec + "</p>";
            $('#detail-pasung-pusat-tanggal-penindakan').html(tanggal);

            var alasan = "<p>" + response.data[0].alasan + "</p>";
            $('#detail-pasung-pusat-alasan').html(alasan);

        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-pasung-pusat').modal('toggle');
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
                $("#filter-pusat-puskesmas-pasung").append(o);
            });
            $('#filter-pusat-puskesmas-pasung').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function cariDataPasungPusat() {
    $('#table-pusat-pasung').DataTable().ajax.reload();
}


function dataManajemenPasung() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "pasung/data-manajemen-pasung",
        dataType: 'json',
        success: function(response) {
            console.log(response.data)
            $('#pusat-pasung-total-pelepasan').text(response.data[0].total_pelepasan_pasung);
            $('#pusat-pasung-total-pemasangan').text(response.data[0].total_pemasangan_pasung);
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

$(document).ready(function() {
    dataManajemenPasung();
    listPuskesmas();
    datatablePasung();
});