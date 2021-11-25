            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                <h1 style="text-align:center; text-decoration:underline"><strong><?php echo"Sppt Aktif"; ?></strong></h1>
                    <table class="table table-bordered table-striped table-hocer">
                        <thead>
                            <tr>
                            <th style="width:5%">No</th>
                                <th style="width:10%">Nop</th>
                                <th style="width:10%">Tahun</th>
                                <th style="width:5%">No induk</th>
                                <th style="width:10%">Nama wajib pajak</th>
                                <th style="width:20%">Alamat Wajib Pajak</th>
                                <th style="width:20%">Alamat objek Pajak</th>
                                <th style="width:10%">Pajak</th>

                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($tables)>0){
                        foreach ($tables as $tb): ?>

                            <tr style="cursor:pointer" onclick="window.location='base.php?page=profiling_sppt&nop=<?php echo $tb['nop']?>&r=0'">
                                <td style="text-align:center;"><?php echo $tb['noi']; ?></td>
                                <td><?php echo $tb['nop']; ?></td>
                                <td><?php echo $th; ?></td>
                                <td><?php echo $tb['no_induk']; ?></td>
                                <td><?php echo $tb['nama_wp']; ?></td>
                                <td><?php echo $tb['alamat_wp']; ?></td>
                                <td><?php echo $tb['alamat_op']; ?></td>
                                <td><?php echo $tb['pajak_t']; ?></td>
                            </tr>
                        <?php endforeach;
                        }else{
                        ?>
                            <tr><td style="text-align:center" colspan=8>Tidak Ada Catatan Sppt</td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>