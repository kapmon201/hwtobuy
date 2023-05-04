function semua() {
    $.getJSON('wpu_restapipizza.json', function(data){
        let menu = data.menu; 
        $.each(menu,function (i,data) {
            $('#daftar_menu').append('<div class="col-md-4"><div class="card mb-3"><img src="../restapi/img/'+data.gambar+'" class="card-img-top" ><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p>Rp<strong>'+data.harga+'</strong><div class="float-right"><a href="#" class="btn btn-primary">Pesan</a></div></div></div></div>')
        }); 
    }); 
}

semua(); 

$('.nav-link').on('click', function() {
    $('.nav-link').removeClass('active'); 
    $(this).addClass('active');

    let kategori = $(this).html(); 
    $('h4').html(kategori);
    
    if (kategori == "All Menu") {
        semua(); 
        return; 
    }

    $.getJSON('wpu_restapipizza.json', function(data){
        let menu = data.menu; 
        let isi = ''; 

        $.each(menu,function (i,data) {
            if (data.kategori == kategori.toLowerCase()) {
                isi += '<div class="col-md-4"><div class="card mb-3"><img src="../restapi/img/'+data.gambar+'" class="card-img-top" ><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p>Rp<strong>'+data.harga+'</strong><div class="float-right"><a href="#" class="btn btn-primary">Pesan</a></div></div></div></div>'; 
            }
            
        }); 

        $('#daftar_menu').html(isi);
    });     

}); 