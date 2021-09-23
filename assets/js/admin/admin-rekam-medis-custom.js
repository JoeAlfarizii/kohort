function datatableRekamMedis() {
    $("#table-pusat-rekam-medis").dataTable({
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
            "url": "rekam-medis/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-rekam-medis').val();
                d.id_puskesmas = $('#filter-pusat-puskesmas-rekam-medis').val();
            },
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama_pasien" },
            { "data": "nama_dokter" },
            { "data": "diagnosis" },
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
                    if (rowData.diagnosis == "") {
                        $(td).html('tidak ada');
                    }
                }
            },
            {
                "targets": 4,
                "searchable": false,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataRekamMedis(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
                    $(td).html(html);
                }
            }
        ]
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

            var nama = "<p>" + response.data.nama_pasien + "</p>";
            $('#detail-pusat-rekam-medis-pasien').html(nama);

            var dokter = "<p>" + response.data.nama_dokter + "</p>";
            $('#detail-pusat-rekam-medis-dokter').html(dokter);

            var diagnosis = response.data.diagnosis;
            if (diagnosis == "") {
                var diagnosis = "<p>Tidak Ada</p>";
            } else {
                var diagnosis = "<p>" + response.data.diagnosis + "</p>";
            }
            $('#detail-pusat-rekam-medis-diagnosis').html(diagnosis);

            $("#detail-pusat-rekam-medis-obat").empty();
            $.each(response.data.data_berobat, function(i, item) {
                var o = "<p>" + item.nama + " " + "(Jumlah : " + item.jumlah + ")</p>";
                $("#detail-pusat-rekam-medis-obat").append(o);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-pusat-rekam-medis').modal('toggle');
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
                $("#filter-pusat-puskesmas-rekam-medis").append(o);
            });
            $('#filter-pusat-puskesmas-rekam-medis').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function cariDataRekamMedisPusat() {
    $('#table-pusat-rekam-medis').DataTable().ajax.reload();
}

$(document).ready(function() {
    datatableRekamMedis();
    listPuskesmas();
    // $('#btn-obat-add-form').click(function(){
    //     $(form).appendTo('#form-obat');
    //     $('select.test-select').select2();
    // });
});