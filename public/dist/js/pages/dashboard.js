//Ambil data dari file \resources\views\dashboard\index.blade.php
var k = document.getElementById("json").getAttribute("data-kendaraan");
var ps = document.getElementById("json").getAttribute("data-perawatan");

//Buat data yang telah diambil menjadi JSON
var kendaraan = JSON.parse(k);
var perawatan = JSON.parse(ps);
var tahunPS = JSON.parse(ps.toString());
var bulanPS = JSON.parse(ps.toString());
var chartData = JSON.parse(ps.toString());

//Menampilkan Banyaknya kendaraan yang ada di database
document.getElementById("jk1").value = kendaraan.length;

//Menampilkan Jenis Perawatan ke Header Chart
document.getElementById('jp1').addEventListener('input', function(event) {
    document.getElementById('chart-jenis').innerHTML = event.target.value;

    var pb1 = document.getElementById('pb1').value;
    var pt1 = document.getElementById('pt1').value;
    if(pt1 != '') {
        buatChart(event.target.value, pt1);
    } else {
        chartKosong();
    }

    if(pt1 != '') {
        hitungTotal(pt1, event.target.value, pb1);
    } else {
        document.getElementById('t1').value = 'Rp' + new Intl.NumberFormat().format(0);
    }
});

//Memfilter dan menghitung total biaya berdasarkan bulan yang dipilih
document.getElementById('pb1').addEventListener('input', function(event) {
    var jp1 = document.getElementById('jp1').value;
    var pt1 = document.getElementById('pt1').value;
    if(pt1 != '') {
        hitungTotal(pt1, jp1, event.target.value);
    } else {
        document.getElementById('t1').value = 'Rp' + new Intl.NumberFormat().format(0);
    }
});

//Menambahkan option ke select untuk memilih tahun yang hanya ada di database
var tahun = {};
tahunPS = tahunPS.filter(function(perawatan) {
    if(perawatan.tahun in tahun) {
        return false;
    } else {
        tahun[perawatan.tahun] = perawatan.tahun;
        return true;
    }
});
var select = document.getElementById('pt1');
for (a in tahunPS) {
    var el = document.createElement('option');
    el.textContent = tahunPS[a].tahun;
    el.value = tahunPS[a].tahun;
    select.appendChild(el);
}

document.getElementById('pt1').addEventListener('input', function(event) {
    document.getElementById('chart-tahun').innerHTML = event.target.value;

    var jp1 = document.getElementById('jp1').value;
    if(event.target.value != '') {
        buatChart(jp1, event.target.value);
    } else {
        chartKosong();
    }

    var jp1 = document.getElementById('jp1').value;
    var pb1 = document.getElementById('pb1').value;
    if(event.target.value != '') {
        hitungTotal(event.target.value, jp1, pb1);
    } else {
        document.getElementById('t1').value = 'Rp' + new Intl.NumberFormat().format(0);
    }
});

function buatChart(a, b) {
    var chartJenis = chartData.filter(function(perawatan) {
        if(perawatan.jenis_perawatan == a) {
            return true;
        } else if(a == '') {
            return true;
        } else {
            return false;
        }
    });
    var chartTahun = chartJenis.filter(function(perawatan) {
        if(perawatan.tahun == b) {
            return true;
        } else if(b == '') {
            return true;
        } else {
            return false;
        }
    });
    var chartBulanJanuari = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Januari') {
            return true;
        } else {
            return false;
        }
    });
    totalJanuari = 0;
    for(i in chartBulanJanuari) {
        totalJanuari += chartBulanJanuari[i].total_biaya;
    }
    // chartBulanJanuari.forEach(function(total, index) {
    //     totalJanuari += chartBulanJanuari.total_biaya;
    // });
    // console.log(totalJanuari);

    var chartBulanFebruari = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Februari') {
            return true;
        } else {
            return false;
        }
    });
    totalFebruari = 0;
    for(i in chartBulanFebruari) {
        totalFebruari += chartBulanFebruari[i].total_biaya;
    }
    // console.log(totalFebruari);

    var chartBulanMaret = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Maret') {
            return true;
        } else {
            return false;
        }
    });
    totalMaret = 0;
    for(i in chartBulanMaret) {
        totalMaret += chartBulanMaret[i].total_biaya;
    }
    // console.log(totalMaret);

    var chartBulanApril = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'April') {
            return true;
        } else {
            return false;
        }
    });
    totalApril = 0;
    for(i in chartBulanApril) {
        totalApril += chartBulanApril[i].total_biaya;
    }
    // console.log(totalApril);

    var chartBulanMei = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Mei') {
            return true;
        } else {
            return false;
        }
    });
    totalMei = 0;
    for(i in chartBulanMei) {
        totalMei += chartBulanMei[i].total_biaya;
    }
    // console.log(totalMei);

    var chartBulanJuni = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Juni') {
            return true;
        } else {
            return false;
        }
    });
    totalJuni = 0;
    for(i in chartBulanJuni) {
        totalJuni += chartBulanJuni[i].total_biaya;
    }
    // console.log(totalJuni);

    var chartBulanJuli = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Juli') {
            return true;
        } else {
            return false;
        }
    });
    totalJuli = 0;
    for(i in chartBulanJuli) {
        totalJuli += chartBulanJuli[i].total_biaya;
    }
    // console.log(totalJuli);

    var chartBulanAgustus = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Agustus') {
            return true;
        } else {
            return false;
        }
    });
    totalAgustus = 0;
    for(i in chartBulanAgustus) {
        totalAgustus += chartBulanAgustus[i].total_biaya;
    }
    // console.log(totalAgustus);

    var chartBulanSeptember = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'September') {
            return true;
        } else {
            return false;
        }
    });
    totalSeptember = 0;
    for(i in chartBulanSeptember) {
        totalSeptember += chartBulanSeptember[i].total_biaya;
    }
    // console.log(totalSeptember);

    var chartBulanOktober = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Oktober') {
            return true;
        } else {
            return false;
        }
    });
    totalOktober = 0;
    for(i in chartBulanOktober) {
        totalOktober += chartBulanOktober[i].total_biaya;
    }
    // console.log(totalOktober);

    var chartBulanNovember = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'November') {
            return true;
        } else {
            return false;
        }
    });
    totalNovember = 0;
    for(i in chartBulanNovember) {
        totalNovember += chartBulanNovember[i].total_biaya;
    }
    // console.log(totalNovember);

    var chartBulanDesember = chartTahun.filter(function(perawatan) {
        if(perawatan.bulan == 'Desember') {
            return true;
        } else {
            return false;
        }
    });
    totalDesember = 0;
    for(i in chartBulanDesember) {
        totalDesember += chartBulanDesember[i].total_biaya;
    }
    // console.log(totalDesember);
    
    document.getElementById('perawatan-chart-canvas').remove();
    document.getElementById('canvas-container').innerHTML = '<canvas id="perawatan-chart-canvas"></canvas>';
    var ctx = document.getElementById('perawatan-chart-canvas').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: 'Biaya',
                data: [totalJanuari, totalFebruari, totalMaret, totalApril, totalMei, totalJuni, totalJuli, totalAgustus, totalSeptember, totalOktober, totalNovember, totalDesember],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp' + new Intl.NumberFormat().format(context.raw);
                        }
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        beginAtZero:true,
                        callback: function(value, index, ticks) {
                            return 'Rp' + new Intl.NumberFormat().format(value);
                        }
                    }
                }
            },
        }
    });
}

function chartKosong() {
    document.getElementById('perawatan-chart-canvas').remove();
    document.getElementById('canvas-container').innerHTML = '<canvas id="perawatan-chart-canvas"></canvas>';
    var ctx = document.getElementById('perawatan-chart-canvas').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: 'Biaya',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp' + new Intl.NumberFormat().format(context.raw);
                        }
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        beginAtZero:true,
                        callback: function(value, index, ticks) {
                            return 'Rp' + new Intl.NumberFormat().format(value);
                        }
                    }
                }
            },
        }
    });
}

function hitungTotal(x, y, z) {
    var tahun = bulanPS.filter(perawatan => {
        if(perawatan.tahun == x) {
            return true;
        } else if(x == '') {
            return true;
        } else {
            return false;
        }
    });
    var jenisPerawatan = tahun.filter(perawatan => {
        if(perawatan.jenis_perawatan == y) {
            return true;
        } else if(y == '') {
            return true;
        } else {
            return false;
        }
    });
    var bulan = jenisPerawatan.filter(perawatan => {
        if(perawatan.bulan == z) {
            return true;
        } else if(z == '') {
            return true;
        } else {
            return false;
        }
    });
    var total = 0;
    for(i in bulan) {
        total += bulan[i].total_biaya;
    }
    document.getElementById('t1').value = 'Rp' + new Intl.NumberFormat().format(total);
}