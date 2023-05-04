<?php 
$data = file_get_contents(_A_C_JS."wpu_restapipizza.json"); 
// $data = file_get_contents('data/pizza.json');

$menu = json_decode($data, true ); // jadi array assoc 

// echo $menu["menu"][0]["nama"]; 
$menu = $menu["menu"]; 

// echo $menu[0]["nama"]; 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= _A_C_CSS; ?>bootstrap.min.css"> <!-- crossorigin="anonymous" -->
    
    <script src="<?= _A_C_JS ?>jquery-3.6.4.js"></script>
    <script src="<?= _A_C_JS ?>bootstrap.min.js"></script>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <title>Rest API</title>
  </head>
  <body>
    
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="<?= _A_C_IMAGES ?>logo.png" width="120"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
          <a class="nav-link active" href="#">Home</a>
          
          </div>
        </div>
      </nav>
    </div>

    <div class="container">
      <!-- judul  -->
      <div class="row mt-3">
        <div class="col">
          <h4 id="judul">Semua Menu</h4>
        </div>
      </div>
      <!-- menu  -->
      <div class="row">
        <?php 
        foreach ($menu as $menu) : 
        ?>
        <div class="col-md-4">
          <!-- card -->
          <div class="card mb-3">
            <img src="<?= _A_C_IMAGES.$menu["gambar"] ?>" class="card-img-top" >
            <div class="card-body">
              <h5 class="card-title"><?= $menu["nama"] ?></h5>
              <p class="card-text"><?= $menu["deskripsi"] ?></p>
              Rp<strong><?= $menu["harga"] ?></strong>
              <div class="float-right"><a href="#" class="btn btn-primary">Pesan</a></div>
            </div>
          </div>
          <!-- end: card -->          
        </div>
        <?php 
        endforeach; 
        ?>
      </div>
    </div>
  </body>
</html>
