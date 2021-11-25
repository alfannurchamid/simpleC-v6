<div class="preloader" id="dataLoad" style="display:none; background-color: rgb(255, 255, 255, 0.8">
  <div class="loading">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
    <h3><strong>Memproses Data</strong></h3>
    <h3 style="margin-top:0"><span id="process_data">0</span> / <span id="total_data">0</span> Baris</h3>
    <div id="cekituk"></div>
  </div>
</div>
<div class="row" style="margin-top: 75px">
  <div class="col-md-8 col-md-offset-2">
    <div style="text-align: center; font-weight: bold; font-size: 18px; margin-bottom: 10px;">
      Cari Berdasarkan :
      <label class="radio-inline" style="font-weight: bold; font-size: 18px; margin-left:30px;">
        <input type="radio" name="filter" class="filter custom-radio" id="inlineRadio1" value="sppt" checked> Nomor SPPT
      </label>
      <label class="radio-inline" style="font-weight: bold; font-size: 18px; margin-left:40px;">
        <input type="radio" name="filter" class="filter custom-radio" id="inlineRadio2" value="spptnama"> Nama
      </label>
    </div>
    <div class="input-group input-group-lg">
      <input id="searching" type="text" class="form-control" placeholder="Form Pencarian Sppt . . ." onkeyup="showResult(this.value, 'lc');" aria-describedby="sizing-addon1">
      <span class="input-group-addon glyphicon glyphicon-search" aria-hidden="true" id="sizing-addon1"></span>
    </div>

    <div id="search" style="padding:10px 12px 10px 5px; margin-top: -10px; position:absolute; width: calc(100% - 70px); z-index:1; display:none">
      <div id="livesearch" style="padding:0;background-color: white;"></div>
    </div>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<div class="row" style="margin-top: 50px;">
  <div class="col-md-10 col-md-offset-1" style="text-align:center;">
    <button class="btn btn-info btn-lg" type="button" onclick="window.location='base.php?page=spptkini'"><strong>Data SPPT Aktif</strong></button>
    <button class="btn btn-info btn-lg" type="button" onclick="window.location='base.php?page=sppthap'"><strong>Data SPPT Terhapus</strong></button>
    <button class="btn btn-info btn-lg" type="button" onclick="window.location='base.php?page=spptbar'"><strong>Data SPPT Baru</strong></button>
    <button class="btn btn-info btn-lg" type="button" onclick="window.location='base.php?page=spptubah'"><strong>Data SPPT Berubah</strong></button>
  </div>
</div>
<div class="row" style="margin-top: 50px;">
  <div class="col-md-10 col-md-offset-1" style="text-align:center;">
    <button data-toggle="modal" data-target="#update" class="buttonPlus" type="button"><span style="font-size:32px; margin-bottom: 3px" class="glyphicon glyphicon-plus" aria-hidden="true"></span><br><strong>TAMBAH DATA</strong></button>
  </div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="/*transform:translate(0,50%);*/">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom:0">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h1 class="modal-title text-center"><strong id="msg"></strong></h1>
      </div>
      <div class="modal-footer" id="foot"></div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog" style="/*transform:translate(0,50%);*/">
    <!-- Modal content-->
    <form class="form-file" id="formExcelsppt" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header" style="padding-bottom:0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title"><strong id="jdl"></strong></h2>
        </div>
        <div class="modal-body text-center">
          <input type="file" class="inputfile" name="sppt" id="exl1" onchange="readFile(this.value);" multiple />
          <label for="exl1" style="margin-bottom: -10px">
            <figure>
              <i class="glyphicon glyphicon-file" style="font-size:75px; margin-bottom: 10px; color:#669999; margin-left:5px "></i>
            </figure>
            <span class="file-button" id="imp1">UPLOAD DATA EXCEL</span>
          </label><br>
          <div style="margin-top : 10px;"> Tahun : <input type="text" name="tahun" id="inpuTahun" /> </div>
          <h4 style="margin-top:20px; margin-bottom:-10px" id="fileName1">Tidak Ada File Yang Dipilih</h4>
        </div>
        <div class="modal-footer" id="fExcImport" style="padding-top:0">
          <button type="button" class="btn btn-info betonan" style="float:left;" data-dismiss="modal"><strong>Batal</strong></button>
          <button type="submit" class="btn btn-success betonan"><strong>Import</strong></button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function showResult(str, pg) {
    if (str.length == 0) {
      document.getElementById("search").style.display = "none";
      return;
    }
    var val = $(".filter:checked").val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search").style.display = "block";
        document.getElementById("livesearch").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "liveSearch.php?p=1&q=" + str + "&f=" + val, true);
    xmlhttp.send();
  }

  function readFile(i) {
    $("#fileName1").html(i);
  }

  var clear_timer;
  $("#formExcelsppt").on('submit', (function(e) {
    console.log("cek");
    e.preventDefault();
    $.ajax({
      url: "importir.php?s=excelsppt",
      type: "POST",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {
        $('#update').modal('hide');
        $('#dataLoad').show();
      },
      success: function(data) {
        console.log(data);
        if (data.success) {
          $('#total_data').html(data.jumlah_baris);

          start_import(data.tahun, data.link);
          if (data.link == "progExcelsppt") {
            clear_timer = setInterval(get_import_data, 1000);
          } else {
            clear_timer = setInterval(get_import_kosong, 1000);
          }

        }
        if (data.error) {
          $('#dataLoad').hide();
          $('#myModal').modal('show');
          $('#msg').html('MAAF, TERJADI KESALAHAN !!');
          $('#foot').html('<h2 style="text-align:center; margin-top:0">' + data.error + '</h2>');
        }
      }
    });
  }));

  function start_import(thn, link) {
    $.ajax({
      url: "importir.php?s=" + link + "&t=" + thn,
      success: function() {}
    });
  }

  function get_import_data() {
    var total_data = $('#total_data').text();
    $.ajax({
      url: "importir.php?s=getCountPraha",
      success: function(data) {
        var width = Math.round((data / total_data) * 100);
        $('#process_data').html(data);
        if (width >= 100) {
          clearInterval(clear_timer);
          console.log("z" + clear_timer);
          $('#dataLoad').fadeOut();
          $('#myModal').modal('show');

          $('#msg').html('Total ' + total_data + ' Data<br> Berhasil Diprosesii');
          $('#foot').html('<button type="button" class="btn btn-info" onclick="iki()"><strong>Lanjut proses!</strong></button>');
        }
      }
    });
  }

  function iki() {
    var tah = $("#inpuTahun").val();
    window.location.href = "importir.php?s=hapus_sppt&th=" + tah;
  }

  function get_import_kosong() {
    var total_data = $('#total_data').text();
    $.ajax({
      url: "importir.php?s=getCountsppt",
      success: function(data) {
        var width = Math.round((data / total_data) * 100);
        $('#process_data').html(data);
        if (width >= 100) {
          clearInterval(clear_timer);
          console.log("z" + clear_timer);
          $('#dataLoad').fadeOut();
          $('#myModal').modal('show');
          $('#msg').html('Total ' + total_data + ' Data<br> Berhasil Diproses');
          $('#foot').html('<button type="button" class="btn btn-info" onclick="window.location.href=\'base.php?page=sppt\';"><strong>Oke!</strong></button>');
        }
      }
    });
  }
</script>