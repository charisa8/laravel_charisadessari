var kendaraan = document.getElementById("json2").getAttribute("data-kendaraan");
var perawatan = document.getElementById("json2").getAttribute("data-perawatan");

var k = JSON.parse(kendaraan);
var ps = JSON.parse(perawatan);
var dataPerawatan = JSON.parse(perawatan.toString());
var kendaraanJSON = JSON.parse(kendaraan);

document.getElementById('jp2').addEventListener('input', function(event) {
    document.getElementById('chart-header-jenis').innerHTML = event.target.value;

    var pb2 = document.getElementById('pb2').value;
    var np2 = $('#np2').select2('data');
    var pt2 = document.getElementById('pt2').value;
    if(pt2 != '') {
        hitungTotalKendaraan(event.target.value, np2[0].id, pb2, pt2);
        buatChartKendaraan(event.target.value, np2[0].id, pt2);
    } else {
        document.getElementById('t2').value = 'Rp' + new Intl.NumberFormat().format(0);
        chartKendaraanKosong();
    }
});

// import select2 untuk no_plat dashboard
$('#np2').select2({
    theme: 'bootstrap-5',
    width: '100%',
});

// function select2 untuk mengisi chart dan indentitas kendaraan dashboard
$('#np2').on('select2:select', function(e) {
    var data = e.params.data;
    document.getElementById('chart-header-no-plat').innerHTML = k[data.id - 1].no_plat;
    // start (identitas kendaraan dashboard)
    document.getElementById('wilayah').value = kendaraanJSON[data.id - 1].wilayah;
    document.getElementById('jenis_kendaraan').value = kendaraanJSON[data.id - 1].jenis_kendaraan;
    document.getElementById('no_rangka').value = kendaraanJSON[data.id - 1].no_rangka;
    document.getElementById('no_mesin').value = kendaraanJSON[data.id - 1].no_mesin;
    document.getElementById('no_bpkb').value = kendaraanJSON[data.id - 1].no_bpkb;
    document.getElementById('atas_nama').value = kendaraanJSON[data.id - 1].atas_nama;
    document.getElementById('tanggal_pajak').value = kendaraanJSON[data.id - 1].tanggal_pajak;
    document.getElementById('bulan_pajak').value = kendaraanJSON[data.id - 1].bulan_pajak;
    document.getElementById('tahun_pajak').value = kendaraanJSON[data.id - 1].tahun_pajak;
    document.getElementById('tanggal_ganti_plat').value = kendaraanJSON[data.id - 1].tanggal_ganti_plat;
    document.getElementById('bulan_ganti_plat').value = kendaraanJSON[data.id - 1].bulan_ganti_plat;
    document.getElementById('tahun_ganti_plat').value = kendaraanJSON[data.id - 1].tahun_ganti_plat;
    document.getElementById('tahun').value = kendaraanJSON[data.id - 1].tahun;
    document.getElementById('warna').value = kendaraanJSON[data.id - 1].warna;
    document.getElementById('bahan_bakar').value = kendaraanJSON[data.id - 1].bahan_bakar;
    document.getElementById('jenis_merk').value = kendaraanJSON[data.id - 1].jenis_merk;
    document.getElementById('pic').value = kendaraanJSON[data.id - 1].pic;
    document.getElementById('posisi_kendaraan').value = kendaraanJSON[data.id - 1].posisi_kendaraan;
    document.getElementById('keterangan').value = kendaraanJSON[data.id - 1].keterangan;
    document.getElementById('gambar_depan').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_depan + '" class="img-preview img-fluid border border-dark mb-3">';
    document.getElementById('gambar_belakang').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_belakang + '" class="img-preview img-fluid border border-dark mb-3">';
    document.getElementById('gambar_samping_kanan').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_samping_kanan + '" class="img-preview img-fluid border border-dark mb-3">';
    document.getElementById('gambar_samping_kiri').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_samping_kiri + '" class="img-preview img-fluid border border-dark mb-3">';
    // end (identitas kendaraan dashboard)
    var jp2 = document.getElementById('jp2').value;
    var pb2 = document.getElementById('pb2').value;
    var pt2 = document.getElementById('pt2').value;
    if(pt2 != '') {
        hitungTotalKendaraan(jp2, data.id, pb2, pt2);
        buatChartKendaraan(jp2, data.id, pt2);
    } else {
        document.getElementById('t2').value = 'Rp' + new Intl.NumberFormat().format(0);
        chartKendaraanKosong();
    }
    // console.log(data.id); -> return id
});

// function surat penanggung jawab dashboard
document.getElementById('surat_penanggung_jawab').addEventListener('click', event => {
    var no_plat = $('#np2').select2('data');
    window.open('storage/' + kendaraanJSON[no_plat[0].id].surat_penanggung_jawab, '_blank');
});

document.getElementById('pb2').addEventListener('input', function(event) {
    var jp2 = document.getElementById('jp2').value;
    var np2 = $('#np2').select2('data');
    var pt2 = document.getElementById('pt2').value;
    if(event.target.value) {
        hitungTotalKendaraan(jp2, np2[0].id, event.target.value, pt2);
    } else {
        document.getElementById('t2').value = 'Rp' + new Intl.NumberFormat().format(0);
    }
});

trimTahun();

document.getElementById('pt2').addEventListener('input', function(event) {
    var jp2 = document.getElementById('jp2').value;
    var pb2 = document.getElementById('pb2').value;
    var np2 = $('#np2').select2('data');
    // console.log(np2[0].id);
    if(event.target.value) {
        // console.log('1');
        hitungTotalKendaraan(jp2, np2[0].id, pb2, event.target.value);
        buatChartKendaraan(jp2, np2[0].id, event.target.value);
    } else {
        // console.log('2');
        document.getElementById('t2').value = 'Rp' + new Intl.NumberFormat().format(0);
        chartKendaraanKosong();
    }
});

function trimTahun() {
    var tahun = {};
    var trim = dataPerawatan.filter(ps => {
        if(ps.tahun in tahun) {
            return false;
        } else {
            tahun[ps.tahun] = ps.tahun;
            return true;
        }
    });
    var selectTahun = document.getElementById('pt2');
    for(i in trim) {
        var el = document.createElement('option');
        el.textContent = trim[i].tahun;
        el.value = trim[i].tahun;
        selectTahun.appendChild(el);
    }
}

function buatChartKendaraan(x, y, z) {
    var chartKendaraanJenis = dataPerawatan.filter(ps => {
        if(ps.jenis_perawatan == x) {
            return true;
        } else if(x == '') {
            return true;
        } else {
            return false;
        }
    });
    // console.log(chartKendaraanJenis);
    var chartKendaraanPlat = chartKendaraanJenis.filter(ps => {
        if(ps.kendaraan_id == y) {
            return true;
        } else if(y == '') {
            return true;
        } else {
            return false;
        }
    });
    // console.log(chartKendaraanPlat);
    var chartKendaraanTahun = chartKendaraanPlat.filter(ps => {
        if(ps.tahun == z) {
            return true;
        } else if(z == '') {
            return true;
        } else {
            return false;
        }
    });
    var chartKendaraanBulanJanuari = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Januari') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanJanuari = 0;
    for(i in chartKendaraanBulanJanuari) {
        totalKendaraanJanuari += chartKendaraanBulanJanuari[i].total_biaya;
    }
    // chartBulanJanuari.forEach(function(total, index) {
    //     totalJanuari += chartBulanJanuari.total_biaya;
    // });
    // console.log(totalJanuari);

    var chartKendaraanBulanFebruari = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Februari') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanFebruari = 0;
    for(i in chartKendaraanBulanFebruari) {
        totalKendaraanFebruari += chartKendaraanBulanFebruari[i].total_biaya;
    }
    // console.log(totalKendaraanFebruari);

    var chartKendaraanMaret = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Maret') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanMaret = 0;
    for(i in chartKendaraanMaret) {
        totalKendaraanMaret += chartKendaraanMaret[i].total_biaya;
    }
    // console.log(totalKendaraanMaret);

    var chartKendaraanApril = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'April') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanApril = 0;
    for(i in chartKendaraanApril) {
        totalKendaraanApril += chartKendaraanApril[i].total_biaya;
    }
    // console.log(totalKendaraanApril);

    var chartKendaraanMei = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Mei') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanMei = 0;
    for(i in chartKendaraanMei) {
        totalKendaraanMei += chartKendaraanMei[i].total_biaya;
    }
    // console.log(totalKendaraanMei);

    var chartKendaraanJuni = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Juni') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanJuni = 0;
    for(i in chartKendaraanJuni) {
        totalKendaraanJuni += chartKendaraanJuni[i].total_biaya;
    }
    // console.log(totalKendaraanJuni);

    var chartKendaraanJuli = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Juli') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanJuli = 0;
    for(i in chartKendaraanJuli) {
        totalKendaraanJuli += chartKendaraanJuli[i].total_biaya;
    }
    // console.log(totalKendaraanJuli);

    var chartKendaraanAgustus = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Agustus') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanAgustus = 0;
    for(i in chartKendaraanAgustus) {
        totalKendaraanAgustus += chartKendaraanAgustus[i].total_biaya;
    }
    // console.log(totalKendaraanAgustus);

    var chartKendaraanSeptember = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'September') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanSeptember = 0;
    for(i in chartKendaraanSeptember) {
        totalKendaraanSeptember += chartKendaraanSeptember[i].total_biaya;
    }
    // console.log(totalKendaraanSeptember);

    var chartKendaraanOktober = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Oktober') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanOktober = 0;
    for(i in chartKendaraanOktober) {
        totalKendaraanOktober += chartKendaraanOktober[i].total_biaya;
    }
    // console.log(totalKendaraanOktober);

    var chartKendaraanNovember = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'November') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanNovember = 0;
    for(i in chartKendaraanNovember) {
        totalKendaraanNovember += chartKendaraanNovember[i].total_biaya;
    }
    // console.log(totalKendaraanNovember);

    var chartKendaraanDesember = chartKendaraanTahun.filter(function(ps) {
        if(ps.bulan == 'Desember') {
            return true;
        } else {
            return false;
        }
    });
    totalKendaraanDesember = 0;
    for(i in chartKendaraanDesember) {
        totalKendaraanDesember += chartKendaraanDesember[i].total_biaya;
    }
    // console.log(totalKendaraanDesember);
    
    document.getElementById('kendaraan-chart-canvas').remove();
    document.getElementById('canvas-kendaraan').innerHTML = '<canvas id="kendaraan-chart-canvas"></canvas>';
    var contex = document.getElementById('kendaraan-chart-canvas').getContext('2d');
    var chartKendaraan = new Chart(contex, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: 'Biaya',
                data: [totalKendaraanJanuari, totalKendaraanFebruari, totalKendaraanMaret, totalKendaraanApril, totalKendaraanMei, totalKendaraanJuni, totalKendaraanJuli, totalKendaraanAgustus, totalKendaraanSeptember, totalKendaraanOktober, totalKendaraanNovember, totalKendaraanDesember],
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

function chartKendaraanKosong() {
    document.getElementById('kendaraan-chart-canvas').remove();
    document.getElementById('canvas-kendaraan').innerHTML = '<canvas id="kendaraan-chart-canvas"></canvas>';
    var contex = document.getElementById('kendaraan-chart-canvas').getContext('2d');
    var chartKendaraan = new Chart(contex, {
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

function hitungTotalKendaraan(a, z, i, z2) {
    var jenis = dataPerawatan.filter(ps => {
        if(ps.jenis_perawatan == a) {
            return true;
        } else if(a == '') {
            return true;
        } else {
            return false;
        }
    });
    // console.log(jenis);
    var noPlat = jenis.filter(ps => {
        if(ps.kendaraan_id == z) {
            return true;
        } else if(z == '') {
            return true;
        } else {
            return false;
        }
    });
    // console.log(noPlat);
    var bulan = noPlat.filter(ps => {
        if(ps.bulan == i) {
            return true;
        } else if(i == '') {
            return true;
        } else {
            return false;
        }
    });
    // console.log(bulan);
    var tahun = bulan.filter(ps => {
        if(ps.tahun == z2) {
            return true;
        } else if(z2 == '') {
            return true;
        } else {
            return false;
        }
    });
    // console.log(z2);
    // console.log(tahun);
    // console.log(tahun[0].total_biaya);
    var total = 0;
    for(i in tahun) {
        total += tahun[i].total_biaya;
    }
    // console.log(total);
    document.getElementById('t2').value = 'Rp' + new Intl.NumberFormat().format(total);
}