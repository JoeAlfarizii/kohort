function datatableDokter() {
    $("#table-pusat-dokter").dataTable({
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
            "url": "dokter/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-dokter').val();
                d.id_puskesmas = $('#filter-pusat-puskesmas-dokter').val();
            },
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "puskesmas" },
            { "data": "jabatan" },
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
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataDokter(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function detailDataDokter(id) {
    //alert(id);
    jQuery.ajax({
        type: 'post',
        "url": "dokter/detail-dokter",
        data: { id: id },
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            console.log(response.data);
            var nama = "<p>" + response.data[0].nama + "</p>";
            $('#detail-dokter-pusat-nama').html(nama);

            var jabatan = "<p>" + response.data[0].jabatan + "</p>";
            $('#detail-dokter-pusat-jabatan').html(jabatan);

        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            $('#modal-detail-dokter-pusat').modal('toggle');
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
                $("#filter-pusat-puskesmas-dokter").append(o);
            });
            $('#filter-pusat-puskesmas-dokter').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function cariDataDokterPusat() {
    $('#table-pusat-dokter').DataTable().ajax.reload();
}

$(document).ready(function() {
    datatableDokter();
    listPuskesmas();
});