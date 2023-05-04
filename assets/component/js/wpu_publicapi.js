function cari() {
    $('#daftar_film').html('');

    // $.getJSON('http://omdbapi.com?apikey=&')
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'GET',
        dataType: 'json',
        data: {
            'apikey': '78cf67df',
            's': $('#txt_cari').val()
        },
        success: function (hasil) {
            // console.log(hasil); 
            if (hasil.Response == "True") {

                let film = hasil.Search;
                $.each(film, function (i, data) {
                    $('#daftar_film').append(`
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img class="card-img-top" src="`+ data.Poster + `" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">`+ data.Title + `</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+ data.Year + `</h6>
                            <a href="#" class="card-link detail_film" data-toggle="modal" data-target="#exampleModal" data-id="`+data.imdbID+`">Detail</a>
                            </div>
                        </div>
                    </div>
                    `);
                });
                // div class="card"  style="width: 18rem;"

                $('#txt_cari').val('');

            } else {
                $('#daftar_film').html(`<h4 class="text-center">` + hasil.Error + `</h4>`);
            }
        }
    });
}

$('#btn_cari').on('click', function () {
    cari();
});

$('#txt_cari').on('keyup', function (e) {
    if (e.keyCode === 13) {
        cari();
    }

});

$('#daftar_film').on('click','.detail_film',function(){
    // console.log( $(this).data('id') ); 
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'GET',
        dataType: 'json',
        data: {
            'apikey': '78cf67df',
            'i' : $(this).data('id')
        },
        success: function (hasil) {
            if (hasil.Response === "True") {
                // console.log(hasil.Rated); 
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                            <img class="img-fluid" src="`+ hasil.Poster + `">
                            </div>

                            <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><h5>`+hasil.Title+`</h5></li>
                                <li class="list-group-item">Released: `+hasil.Release+`</li>
                                <li class="list-group-item">Genre: `+hasil.Genre+`</li>
                                <li class="list-group-item">Actors: `+hasil.Actors+`</li>
                            </ul>
                            </div>
                            
                        </div>
                    </div>
                `); 
            }
        }    
    });    
}); 