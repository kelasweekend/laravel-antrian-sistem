function updateClock() {
    var currentTime = new Date();
    var currentHours = currentTime.getHours();
    var currentMinutes = currentTime.getMinutes();
    var currentSeconds = currentTime.getSeconds();

    // Pad the minutes and seconds with leading zeros, if required
    currentHours = (currentHours < 10 ? "0" : "") + currentHours;
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;

    $("#clock").html(currentTimeString);
}

$(document).ready(function () {
    setInterval('updateClock()', 1000);
});


var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

var tanggal = new Date().getDate();
var xhari = new Date().getDay();
var xbulan = new Date().getMonth();
var xtahun = new Date().getYear();

var hari = hari[xhari];
var bulan = bulan[xbulan];
var tahun = (xtahun < 1000) ? xtahun + 1900 : xtahun;
var saat_ini = hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun
$("#day").html(saat_ini);