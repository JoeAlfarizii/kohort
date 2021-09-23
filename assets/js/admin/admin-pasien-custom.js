function datatablePasien() {
    $("#table-pusat-pasien").dataTable({
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
            "url": "pasien/datatable",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-pasien').val();
                d.id_puskesmas = $('#filter-pusat-puskesmas-pasien').val();
            },
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
                    var html = "<button class='btn btn-sm btn-primary'  style='margin-left: 10px;' onclick='detailDataPasien(" + rowData.id + ");'><i class='fas fa-eye'></i> Detail</button>";
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
            $('#detail-pasien-pusat-nama').html(nama);

            var puskesmas = "<p>" + response.data[0].nama_puskesmas + "</p>"
            $('#detail-pasien-pusat-puskesmas').html(puskesmas);

            var jenis_kelamin = "<p>" + response.data[0].jenis_kelamin + "</p>"
            $('#detail-pasien-pusat-jenis-kelamin').html(jenis_kelamin);


            var options = { weekday: 'short', year: 'numeric', month: 'long', day: 'numeric' };
            var date = new Date(response.data[0].tanggal_lahir.replace(/-/g, "/"));
            var exec = date.toLocaleDateString("en-US", options);
            var tanggal_lahir = "<p>" + exec + "</p>";
            $('#detail-pasien-pusat-tanggal-lahir').html(tanggal_lahir);

            var alamat = "<p>" + response.data[0].alamat + "</p>"
            $('#detail-pasien-pusat-alamat').html(alamat);

            var kota = "<p>" + response.data[0].nama_kota + "</p>"
            $('#detail-pasien-pusat-kota').html(kota);

            var rt = "<p>" + response.data[0].rt + "</p>"
            $('#detail-pasien-pusat-rt').html(rt);

            var rw = "<p>" + response.data[0].rw + "</p>"
            $('#detail-pasien-pusat-rw').html(rw);

            var kecamatan = "<p>" + response.data[0].nama_kecamatan + "</p>"
            $('#detail-pasien-pusat-kecamatan').html(kecamatan);

            var desa = "<p>" + response.data[0].nama_desa + "</p>"
            $('#detail-pasien-pusat-desa').html(desa);

            var provinsi = "<p>" + response.data[0].nama_provinsi + "</p>"
            $('#detail-pasien-pusat-provinsi').html(provinsi);

            if (response.data[0].status_jkn == 1) {
                var status_jkn = "<p>JKN</p>"
            } else {
                var status_jkn = "<p>Non JKN</p>"
            }
            $('#detail-pasien-pusat-status-jkn').html(status_jkn);

            if (response.data[0].status_pengobatan == 1) {
                var status_pengobatan = "<p>Aktif</p>"
            } else {
                var status_pengobatan = "<p>Tidak Aktif</p>"
            }
            $('#detail-pasien-pusat-status-pengobatan').html(status_pengobatan);
        },
        error: function(xhr, ajaxOptions, thrownError) {},
        complete: function(response) {
            $('#modal-detail-pusat-pasien').modal('toggle');
        }
    });
}

function dataManajemenPasien() {
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "pasien/data-manajemen-pasien",
        dataType: 'json',
        success: function(response) {
            $('#pusat-pasien-total-odgj-pria').text(response.data[0].total_odgj_pria);
            $('#pusat-pasien-total-odgj-wanita').text(response.data[0].total_odgj_wanita);
            $('#pusat-pasien-total-odgj-terdaftar').text(response.data[0].total_odgj_terdaftar);
            $('#pusat-pasien-total-aktif-pengobatan').text(response.data[0].total_aktif_pengobatan);
            $('#pusat-pasien-total-pasif-pengobatan').text(response.data[0].total_pasif_pengobatan);
            $('#pusat-pasien-total-kematian').text(response.data[0].total_kematian_pasien);
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
                $("#filter-pusat-puskesmas-pasien").append(o);
            });
            $('#filter-pusat-puskesmas-pasien').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function cariDataPasienPusat() {
    $('#table-pusat-pasien').DataTable().ajax.reload();
}

//JQUERY CODE
$(document).ready(function() {
    dataManajemenPasien();
    datatablePasien();
    listPuskesmas();
});