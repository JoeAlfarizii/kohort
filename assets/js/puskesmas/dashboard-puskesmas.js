function dataDashboard() {
    jQuery.ajax({
        type: 'get',
        "url": "dashboard/data-dashboard",
        dataType: 'json',
        success: function(response) {
            console.log(response.data);
            $('#board-puskesmas-pasien').text(response.data.jumlah_pasien + " Data");
            $('#board-puskesmas-perawatan').text(response.data.jumlah_perawatan + " Data");
            $('#board-puskesmas-rekam-medis').text(response.data.jumlah_rekam_medis + " Data");
            $('#board-puskesmas-dokter').text(response.data.jumlah_dokter + " Data");
            $('#board-puskesmas-pasung').text(response.data.jumlah_pasung + " Data");
            $('#board-puskesmas-obat').text(response.data.jumlah_obat + " Data");
        },
        error: function(xhr, ajaxOptions, thrownError) {

        }
    });
}

$(document).ready(function() {
    dataDashboard();
});

//chart besar
// var statistics_chart = document.getElementById("dashboard-puskesmas").getContext('2d');

// var myChart = new Chart(statistics_chart, {
//     type: 'line',
//     data: {
//         labels: ["jan", "Feb", "Mar", "Apr", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"],
//         datasets: [{
//             label: 'Statistics',
//             data: [640, 387, 530, 302, 430, 270, 488],
//             borderWidth: 5,
//             borderColor: '#6777ef',
//             backgroundColor: 'transparent',
//             pointBackgroundColor: '#fff',
//             pointBorderColor: '#6777ef',
//             pointRadius: 4
//         }]
//     },
//     options: {
//         legend: {
//             display: false
//         },
//         scales: {
//             yAxes: [{
//                 gridLines: {
//                     display: false,
//                     drawBorder: false,
//                 },
//                 ticks: {
//                     stepSize: 150
//                 }
//             }],
//             xAxes: [{
//                 gridLines: {
//                     color: '#fbfbfb',
//                     lineWidth: 2
//                 }
//             }]
//         },
//     }
// });