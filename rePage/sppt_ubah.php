<div class="row">
                <div class="col-md-10 col-md-offset-1">
                <h1 style="text-align:center; text-decoration:underline"><strong><?php if(!isset($_post['semua'])){ 
                                                                                                                    if(isset($th)) {echo"Sppt Berubah tahun : "."$th"; $nul = "Tidak Ada Sppt Berubah di Tahun celeng "."$th";}
                                                                                                                    else{echo"Sppt Berubah di Semua Tahun"; $nul = "Tidak Ada Sppt Baru Berubah Tahun";
                                                                                                                }} ?></strong></h1>  
                   <form action='base.php?page=spptubah' method="POST">
                   <h2 >pilih tahun :  <input type="text" name="tahun"> <label class="radio-inline" style="font-weight: bold; font-size: 18px; margin-left:30px;">
                           <input type="radio" name="semua" class="filter custom-radio" id="inlineRadio1" value="sppt" > Semua Tahun
                        </label>  <button type="submit" class="btn btn-default" style="background:blue; color:white;"><strong>Tampilkan</strong></button></h2>
                    
                   </form>

                    <table class="table table-bordered table-striped table-hocer">
                        <thead>
                            <tr>
                               
                                <th style="width:20%">Tahun</th>
                                <th style="width:20%">Nop</th>
                                <th style="width:60%">Perubahan</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        if(count($tables)>0){
                        foreach ($tables as $tb): ?>

                            <tr style="cursor:pointer" onclick="window.location='base.php?page=profiling_sppt&nop=<?php echo $tb['nop']?>&r=0'">
        
                                <td><?php echo $tb['tahun']; ?></td>
                                <td><?php echo $tb['nop']; ?></td>
                                <td><?php echo $tb['perubahan']; ?></td>
                            </tr>
                        <?php endforeach;
                        }else{
                        ?>
                            <tr><td style="text-align:center" colspan=9><?php echo $nul; ?></td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>