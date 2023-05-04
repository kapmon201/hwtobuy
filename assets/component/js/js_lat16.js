var konfirm = true; 
var nama = ''; 

while (konfirm===true) {
    nama = prompt(`masukkan nama: `); 
    console.log('halo ' + nama);

    konfirm = confirm('lagi?'); 
}

console.log('selesai'); 