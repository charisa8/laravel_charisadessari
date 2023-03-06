// var dataKendaraan = document.getElementById('json3').getAttribute('data-kendaraan');

// var kendaraanJSON = JSON.parse(dataKendaraan);

// $('#no_plat').select2({
//     theme: 'bootstrap-5',
//     width: '100%',
// });

// $('#no_plat').on('select2:select', function(e) {
//     var data = e.params.data;
//     document.getElementById('wilayah').value = kendaraanJSON[data.id - 1].wilayah;
//     document.getElementById('jenis_kendaraan').value = kendaraanJSON[data.id - 1].jenis_kendaraan;
//     document.getElementById('no_rangka').value = kendaraanJSON[data.id - 1].no_rangka;
//     document.getElementById('no_mesin').value = kendaraanJSON[data.id - 1].no_mesin;
//     document.getElementById('no_bpkb').value = kendaraanJSON[data.id - 1].no_bpkb;
//     document.getElementById('atas_nama').value = kendaraanJSON[data.id - 1].atas_nama;
//     document.getElementById('tanggal_pajak').value = kendaraanJSON[data.id - 1].tanggal_pajak;
//     document.getElementById('bulan_pajak').value = kendaraanJSON[data.id - 1].bulan_pajak;
//     document.getElementById('tahun_pajak').value = kendaraanJSON[data.id - 1].tahun_pajak;
//     document.getElementById('tanggal_ganti_plat').value = kendaraanJSON[data.id - 1].tanggal_ganti_plat;
//     document.getElementById('bulan_ganti_plat').value = kendaraanJSON[data.id - 1].bulan_ganti_plat;
//     document.getElementById('tahun_ganti_plat').value = kendaraanJSON[data.id - 1].tahun_ganti_plat;
//     document.getElementById('tahun').value = kendaraanJSON[data.id - 1].tahun;
//     document.getElementById('warna').value = kendaraanJSON[data.id - 1].warna;
//     document.getElementById('bahan_bakar').value = kendaraanJSON[data.id - 1].bahan_bakar;
//     document.getElementById('jenis_merk').value = kendaraanJSON[data.id - 1].jenis_merk;
//     document.getElementById('pic').value = kendaraanJSON[data.id - 1].pic;
//     document.getElementById('posisi_kendaraan').value = kendaraanJSON[data.id - 1].posisi_kendaraan;
//     document.getElementById('keterangan').value = kendaraanJSON[data.id - 1].keterangan;

//     document.getElementById('gambar_depan').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_depan + '" class="img-preview img-fluid border border-dark mb-3">';
//     document.getElementById('gambar_belakang').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_belakang + '" class="img-preview img-fluid border border-dark mb-3">';
//     document.getElementById('gambar_samping_kanan').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_samping_kanan + '" class="img-preview img-fluid border border-dark mb-3">';
//     document.getElementById('gambar_samping_kiri').innerHTML = '<img src="storage/' + kendaraanJSON[data.id - 1].gambar_samping_kiri + '" class="img-preview img-fluid border border-dark mb-3">';
// });
// document.getElementById('surat_penanggung_jawab').addEventListener('click', event => {
//     var no_plat = $('#no_plat').select2('data');
//     window.open('storage/' + kendaraanJSON[no_plat[0].id].surat_penanggung_jawab, '_blank');
// });