<div class="heading">
	<div class="row">
		<div class="col-md-2">
			<a class="navbar-brand log" style="margin-top:-9px; line-height: 5px;" href="./base.php?page=home">
				<img class="log" src="assets/simpleC-01.svg" style="max-width:200px ; padding-right: 20px; border-right: 3px solid white;">
			</a>
		</div>
		<div class="col-md-5">
			<h1 style="color: white; margin-top: 15px; margin-left: 5px"><span style=" font-size:45px; font-family: Impact, sans-serif"><?php echo $desaku; ?></span></h1>
		</div>
		<div class="col-md-5" style="text-align: right; margin-top: 0px; margin-left: -20px; height:75px;">
			<div class="btn-group btn-group-lg" role="group" aria-label="..." style="height:inherit;">
				<button onclick="location.href = './base.php?page=home&des=<?php echo $desaku; ?>';" type="button" class="btn btn-default" style="border-bottom:none; border-radius:15px 0 0 0; padding-top: 12px; padding-bottom: 3px; height:70px;" id="dashboard">
					<span class="glyphicon glyphicon-list-alt" style="font-size:21px; margin-bottom: 3px"></span><br><strong>Letter C</strong>
				</button>

				<button onclick="location.href = './base.php?page=sppt&des=<?php echo $desaku; ?>';" type="button" class="btn btn-default" style="border-bottom:none; padding-top: 12px; padding-bottom: 3px; height:70px" id="tambahan"><span class="glyphicon glyphicon-th-list" style="font-size:21px; margin-bottom: 3px"></span><br><strong>SPPT</strong></button>

				<div class="btn-group btn-group-lg" style="height:inherit;">
					<button type="button" class="btn btn-default dropdown-toggle" style="border-bottom:none; border-radius:0 15px 0 0; padding-top: 12px; padding-bottom: 3px; background: orange; color: white; height:inherit;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="glyphicon glyphicon-cog" style="font-size:27px;"></span><br><strong> Pengaturan</strong>
					</button>
					<ul class="dropdown-menu pull-right" style="min-width: 100px; margin:0;">
						<li onclick="modalShow()"><a href="#"><strong>Info Pengguna</strong></a></li>
						<li role="separator" class="divider"></li>
						<li onclick="modal2Show()"><a href="./backup.php"><strong>Backup Data</strong></a></li>
						<!--<li role="separator" class="divider"></li>
							<li><a href="trigger.php?s=movebase"><strong>kosongkan database</strong></a></li>
							<li role="separator" class="divider"></li>
    						<li><a href="trigger.php?s=create-table"><strong>Create table</strong></a></li> -->
						<li role="separator" class="divider"></li>
						<li><a href="format/data-c.xls"><strong>Download format letter c</strong></a></li>
						<li><a href="format/data-sppt.xls"><strong>Download format sppt</strong></a></li>
						<li role="separator" class="divider"></li>
						<li><a href="index.php"><strong>Keluar</strong></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="hBtn" class="modal fade" role="dialog">
	<div class="modal-dialog" style="/*transform:translate(0,50%);*/">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1 class="modal-title"><strong>Informasi Pengguna</strong></h1>
			</div>
			<form method="post" action="trigger.php?s=upuser&paspas=<?php echo $pass ?>&des=<?php echo $desaku ?>">
				<div class="modal-body">
					<table class="table table-striped" style="margin-bottom: 0px;">
						<tr>
							<th style="width: 25%; text-align: left">Nama Desa</th>
							<th style="width: 20px">:</th>
							<td colspan="2"><?php echo $desaku ?></td>
						</tr>
						<tr>
							<th style="text-align: left">Kepala Desa</th>
							<th>:</th>
							<td colspan="2"><input type="text" ; name="inkepala" value="<?php echo $kepala; ?>"></input></td>
						</tr>
						<tr>
							<th style="text-align: left">Pengguna</th>
							<th>:</th>
							<td><input type="text" ; name="inuser" value="<?php echo $user ?>"></input></td>
							<td style="width: 160px; background-color:orange; cursor:pointer" onclick="password()">UBAH PASSWORD</td>
						</tr>
						<tr class="password" style="display:none">
							<th style="text-align: left">Password Lama</th>
							<th>:</th>
							<td colspan="2"><input type="text" ; name="inpaslam" value=""></input></td>
						</tr>
						<tr class="password" style="display:none">
							<th style="text-align: left">Password Baru</th>
							<th>:</th>
							<td colspan="2"><input type="text" ; name="inpasbar" value=""></input></td>
						</tr>
						<tr class="password" style="display:none">
							<th style="text-align: left">Konfirmasi</th>
							<th>:</th>
							<td name="inkon" colspan="2"><input type="text" ; name="inkon" value=""></input></td>
						</tr>
					</table>
				</div>

				<div class="modal-footer" style="text-align:center">
					<button type="button" class="btn btn-default" data-dismiss="modal"><strong>Batal</strong></button>
					<button type="submit" class="btn btn-primary"><strong>Simpan Perubahan</strong></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal -->
<div id="hBtn1" class="modal fade" role="dialog">
	<div class="modal-dialog" style="/*transform:translate(0,50%);*/">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1 class="modal-title"><strong>BACKUP DATABASED</strong></h1>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="progress">
						<div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
							<span class="sr-only">0% Complete</span>
						</div>
					</div>
				</div>
			</div>
			<button type="button" id="download" class="btn btn-primary" value="Upload" data-filename="Backup_SimpleC.zip">Click to download</button>


		</div>
	</div>
</div>

<script>
	function modalShow() {
		$('#hBtn').modal('show')
	}

	function modal1Show() {
		$('#hBtn1').modal('show')
	}

	function modal2Show() {
		$(".preloader").fadeIn('slow');
	}

	function password() {
		$(".password").show();
	}

	$('#hBtn').on('hidden.bs.modal', function(e) {
		$(".password").hide();
	})
</script>
<script>
	$("#download").click(function() {
		window.location.href = 'Backup_SimpleC.zip'; //set your file url which want to download
		var data = [];
		for (var i = 0; i < 100000; i++) {
			var tmp = [];
			for (var i = 0; i < 100000; i++) {
				tmp[i] = 'hue';
			}
			data[i] = tmp;
		};
		$.ajax({
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = Math.round((evt.loaded / evt.total) * 100);
						//console.log(percentComplete);
						$('#progressBar').attr('aria-valuenow', percentComplete).css('width', percentComplete + '%').text(Math.round(percentComplete) + '%');

						if (percentComplete === 1) {
							$('#progressbar').addClass('');
						}
					}
				}, false);
				xhr.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = (evt.loaded / evt.total) * 100;
						console.log(Math.round(percentComplete) + "%");
						$(".perc").text(Math.round(percentComplete) + "%");
						if ((Math.round(percentComplete)) == 100) {
							$(".perc").text("download completed");
							$('#progressbar').removeClass('hide');
							// $(".perc").text("");
						}
						$('#progressBar').attr('aria-valuenow', percentComplete).css('width', percentComplete + '%').text(Math.round(percentComplete) + '%');

					}
				}, false);
				return xhr;
			},
			type: 'POST',
			url: "Backup_SimpleC.zip", //set your file url which want to download
			data: data,
			success: function(data) {}
		});
	});
</script>