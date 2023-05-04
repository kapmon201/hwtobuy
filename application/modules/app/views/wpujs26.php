<div class='panel panel-default'>
  <!-- style="font-size:+1.6"	 -->
  <div class="panel-body">
    <div class='table-filter'>
      <div class='col-lg-12'>

      </div>
      <div class='clearfix'></div>
    </div>

    <div id="wrapper">
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <div class='panel panel-default'>
            <div class='panel-body'>

              abc

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function suwit() {
    var strHasil = '';
    var kondisi = true;

    while (kondisi) {
      // menangkap pilihan player
      var pilihanPlayer = prompt('pilih\n-semut\n-orang\n-gajah');

      // menangkap pilihan comp 
      var pilihanPc = Math.random();

      if (pilihanPc < 0.34) {
        pilihanPc2 = 'semut';
      } else if (pilihanPc >= 0.34 && pilihanPc < 0.67) {
        pilihanPc2 = 'orang';
      } else {
        pilihanPc2 = 'gajah';
      }


      if (pilihanPlayer == pilihanPc2) {
        strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\nmaka seri';
      } else if (pilihanPlayer == 'semut') {
        if (pilihanPc2 == 'gajah') {
          strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\n maka player menang';
        } else {
          strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\n maka pc menang';
        }
      } else if (pilihanPlayer == 'orang') {
        if (pilihanPc2 == 'gajah') {
          strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\n maka pc menang';
        } else {
          strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\n maka player menang';
        }
      } else if (pilihanPlayer == 'gajah') {
        if (pilihanPc2 == 'semut') {
          strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\n maka pc menang';
        } else {
          strHasil = 'player pilih: ' + pilihanPlayer + '\npc pilih: ' + pilihanPc2 + '\n maka pc menang';
        }
      } else {
        strHasil = 'inputan salah';
      }

      console.log(strHasil);

      kondisi = confirm('ulangi?');

    }

  }

  function tebakAngka() {
    // bangkitkan dan save     
    var angka = Math.floor(Math.random() * 10) + 1;

    var kondisi = true;
    var jmlKesempatan = 1;
    var angkaPlayer;
    var strHasil = '';

    while (kondisi && jmlKesempatan <= 3) {
      if (jmlKesempatan <= 3) {
        angkaPlayer = Number(prompt('tebakan anda?'));
        if (angkaPlayer == angka) {
          strHasil = 'percobaan ke-' + jmlKesempatan + '\nangka player: ' + angkaPlayer + ', angka pc: ' + angka + '= sama';
          jmlKesempatan = 4;
          kondisi = false;
        } else {
          strHasil = 'percobaan ke-' + jmlKesempatan + '\nangka player: ' + angkaPlayer + ', angka pc: ' + angka + '= tidak sama';
          jmlKesempatan++;
          alert(strHasil);
          kondisi = confirm('percobaan ke-' + jmlKesempatan + '\nulangi?');
        }



      } else {
        alert('max attempts');
        kondisi = false;
      }

    }
    // console.log(angka)
  }


  $(document).ready(function() {
    $(document).find('#loading_panel_lite').hide();
    // suwit();
    tebakAngka();
  });
</script>