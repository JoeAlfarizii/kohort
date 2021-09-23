"use strict";

//chart besar
// var ctx = document.getElementById("myChart").getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Okt", "Nov", "Des"],
//         datasets: [{
//                 label: 'Sehat',
//                 data: [3200, 1800, 4305, 3022, 6310, 5120, 5880, 6154],
//                 borderWidth: 2,
//                 backgroundColor: 'rgba(63,82,227,.8)',
//                 borderWidth: 0,
//                 borderColor: 'transparent',
//                 pointBorderWidth: 0,
//                 pointRadius: 3.5,
//                 pointBackgroundColor: 'transparent',
//                 pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
//             },
//             {
//                 label: 'Meninggal',
//                 data: [2207, 3403, 2200, 5025, 2302, 4208, 3880, 4880],
//                 borderWidth: 2,
//                 backgroundColor: 'rgba(254,86,83,.7)',
//                 borderWidth: 0,
//                 borderColor: 'transparent',
//                 pointBorderWidth: 0,
//                 pointRadius: 3.5,
//                 pointBackgroundColor: 'transparent',
//                 pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
//             }
//         ]
//     },
//     options: {
//         legend: {
//             display: false
//         },
//         scales: {
//             yAxes: [{
//                 gridLines: {
//                     // display: false,
//                     drawBorder: false,
//                     color: '#f2f2f2',
//                 },
//                 ticks: {
//                     beginAtZero: true,
//                     stepSize: 1500,
//                     callback: function(value, index, values) {
//                         return value;
//                     }
//                 }
//             }],
//             xAxes: [{
//                 gridLines: {
//                     display: false,
//                     tickMarkLength: 15,
//                 }
//             }]
//         },
//     }
// });

//test chart
var balance_chart = document.getElementById("test-chart").getContext('2d');

var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

var myChart = new Chart(balance_chart, {
    type: 'line',
    data: {
        labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
        datasets: [{
            label: 'Balance',
            data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
            backgroundColor: balance_chart_bg_color,
            borderWidth: 0,
            borderColor: 'rgba(63,82,227,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 0,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }]
    },
    options: {
        layout: {
            padding: {
                bottom: -1,
                left: -1
            }
        },
        tooltips: {
            enabled: false
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    beginAtZero: true,
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    drawBorder: false,
                    display: false,
                },
                ticks: {
                    display: false
                }
            }]
        },
    }
});

//balance chart
var balance_chart = document.getElementById("balance-chart").getContext('2d');

var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

var myChart = new Chart(balance_chart, {
    type: 'line',
    data: {
        labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
        datasets: [{
            label: 'Balance',
            data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
            backgroundColor: balance_chart_bg_color,
            borderWidth: 0,
            borderColor: 'rgba(63,82,227,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 0,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }]
    },
    options: {
        layout: {
            padding: {
                bottom: -1,
                left: -1
            }
        },
        tooltips: {
            enabled: false
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    beginAtZero: true,
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    drawBorder: false,
                    display: false,
                },
                ticks: {
                    display: false
                }
            }]
        },
    }
});

//sales card chart
var sales_chart = document.getElementById("sales-chart").getContext('2d');

var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

var myChart = new Chart(sales_chart, {
    type: 'line',
    data: {
        labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
        datasets: [{
            label: 'Sales',
            data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
            borderWidth: 2,
            backgroundColor: balance_chart_bg_color,
            borderWidth: 0,
            borderColor: 'rgba(63,82,227,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 0,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }]
    },
    options: {
        layout: {
            padding: {
                bottom: -1,
                left: -1
            }
        },
        tooltips: {
            enabled: false
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    beginAtZero: true,
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    drawBorder: false,
                    display: false,
                },
                ticks: {
                    display: false
                }
            }]
        },
    }
});

$("#products-carousel").owlCarousel({
    items: 3,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    loop: true,
    responsive: {
        0: {
            items: 2
        },
        768: {
            items: 2
        },
        1200: {
            items: 3
        }
    }
});

function chartUtamaDashboardPusat(sehat, meninggal) {
    var ctx = document.getElementById("myChart").getContext('2d');
    var dataset_sehat = sehat;
    var dataset_meninggal = meninggal;

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                    label: 'Sehat',
                    data: dataset_sehat,
                    borderWidth: 2,
                    backgroundColor: 'rgba(63,82,227,.8)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                },
                {
                    label: 'Meninggal',
                    data: dataset_meninggal,
                    borderWidth: 2,
                    backgroundColor: 'rgba(254,86,83,.7)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                }
            ]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        // display: false,
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 10, //maksimal horizontal
                        callback: function(value, index, values) {
                            return value;
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        tickMarkLength: 15,
                    }
                }]
            },
        }
    });
}

function getDataChartDashboardPusat() {
    var tanggal = $('#filter-pusat-tanggal-dashboard').val();
    var id_puskesmas = $('#filter-pusat-dashboard').val();
    var dataset_sehat;
    var dataset_meninggal;
    jQuery.ajax({
        type: 'post',
        "url": "dashboard/main-chart",
        data: {
            tanggal: tanggal,
            id_puskesmas: id_puskesmas
        },
        dataType: 'json',
        success: function(response) {
            //console.log(response.data);
            dataset_sehat = response.data.pasien_sehat;
            dataset_meninggal = response.data.pasien_meninggal;

            chartUtamaDashboardPusat(dataset_sehat, dataset_meninggal)
        },
        error: function(xhr, ajaxOptions, thrownError) {

        },
        complete: function(response) {
            if(tanggal == ""){
                tanggal = new Date().getFullYear();
            }
            $("#main-chart-kondisi-tahun").text(tanggal);
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
                $("#filter-pusat-dashboard").append(o);
            });
            $('#filter-pusat-dashboard').select2();
            // $('#filter-pusat-puskesmas-pasien').selectric({
            //     maxHeight: 200,
            //     preventWindowScroll: false
            // });
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function getDataManajemenDashboard() {
    var tanggal = $('#filter-pusat-tanggal-dashboard').val();
    var id_puskesmas = $('#filter-pusat-dashboard').val();
    jQuery.ajax({
        type: 'post',
        "url": "dashboard/data-manajemen",
        data: {
            tanggal: tanggal,
            id_puskesmas: id_puskesmas
        },
        dataType: 'json',
        success: function(response) {
            var jumlah_odgj = response.data.jumlah_pasien;
            $('#dashboard-pusat-jumlah-odgj').text(jumlah_odgj + " Pasien");

            var jumlah_konsumsi_obat = response.data.jumlah_berobat;
            $('#dashboard-pusat-jumlah-konsumsi-obat').text(jumlah_konsumsi_obat + " Obat");

            var jumlah_perawatan = response.data.jumlah_perawatan;
            $('#dashboard-pusat-jumlah-perawatan').text(jumlah_perawatan + " Kasus");
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

function cariDataDashboardPusat() {
    getDataManajemenDashboard();
    getDataChartDashboardPusat();
    $('#table-pusat-dashboard-recent').DataTable().ajax.reload();
}

function datatableDashboardRecent() {
    $("#table-pusat-dashboard-recent").dataTable({
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
            "url": "dashboard/data-recent-pasung",
            "data": function(d) {
                d.tanggal = $('#filter-pusat-tanggal-dashboard').val();
                d.id_puskesmas = $('#filter-pusat-dashboard').val();
            },
            "dataSrc": function(response) {
                return response.data;
            }
        },
        "columns": [
            { "data": null },
            { "data": "nama" },
            { "data": "puskesmas" },
            { "data": "kode_tindakan" },
            { "data": "tanggal_penindakan" },
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
                "searchable": true,
                "orderable": false,
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).addClass('text-center');
                    if (rowData.kode_tindakan == 0) {
                        var html = "<p><span class='badge badge-primary'>Pelepasan</span></p>"
                        $(td).html(html);
                    } else {
                        var html = "<p><span class='badge badge-danger'>Pemasangan</span></p>"
                        $(td).html(html);
                    }
                }
            }
        ]
    });
}

$(document).ready(function() {
    $('#filter-pusat-tanggal-dashboard').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
    });
    listPuskesmas();
    //chartUtamaDashboardPusat()
    getDataManajemenDashboard();
    datatableDashboardRecent();
    getDataChartDashboardPusat();
});