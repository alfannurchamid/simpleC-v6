<div class="row">
                <div class="col-md-10 col-md-offset-1">
                <h1 style="text-align:center; text-decoration:underline"><strong><?php if(!isset($_post['semua'])){ 
                                                                                                                    if(isset($th)) {echo"Sppt Terhapus tahun : "."$th"; $nul = "Tidak Ada Sppt Terhapus di Tahun "."$th";}
                                                                                                                    else{echo"Sppt Terhapus di Semua Tahun"; $nul = "Tidak Ada Sppt Baru Terhapus Tahun";
                                                                                                                }} ?></strong></h1> 
                   <form action='base.php?page=sppthap' method="POST">
                   <h2 >pilih tahun :  <input type="text" name="tahun"> <label class="radio-inline" style="font-weight: bold; font-size: 18px; margin-left:30px;">
                           <input type="radio" name="semua" class="filter custom-radio" id="inlineRadio1" value="sppt" > Semua Tahun
                        </label>  <button type="submit" class="btn btn-default" style="background:blue; color:white;"><strong>Tampilkan</strong></button></h2>
                    
                   </form>

                    <table class="table table-bordered table-striped table-hocer">
                        <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th style="width:10%">Tahun</th>
                                <th style="width:10%">Nop</th>
                                <th style="width:5%">No induk</th>
                                <th style="width:10%">Nama wajib pajak</th>
                                <th style="width:15%">Alamat Wajib Pajak</th>
                                <th style="width:15%">Alamat objek Pajak</th>
                                <th style="width:10%">Pajak</th>
                                <th style="width:10%">Tahun Terhapus</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($tables)>0){
                        foreach ($tables as $tb): ?>

                            <tr style="cursor:pointer" onclick="window.location='base.php?page=profiling_sppt&nop=<?php echo $tb['nop']?>&r=0'">
                                <td style="text-align:center;"><?php echo $tb['noi']; ?></td>
                                <td><?php echo $tb['tahun']; ?></td>
                                <td><?php echo $tb['nop']; ?></td>
                                <td><?php echo $tb['no_induk']; ?></td>
                                <td><?php echo $tb['nama_wp']; ?></td>
                                <td><?php echo $tb['alamat_wp']; ?></td>
                                <td><?php echo $tb['alamat_op']; ?></td>
                                <td><?php echo $tb['pajak_t']; ?></td>
                                <td><?php echo $tb['th_hapus']; ?></td>
                            </tr>
                        <?php endforeach;
                        }else{
                        ?>
                            <tr><td style="text-align:center" colspan=9><?php echo "$nul";?></td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>