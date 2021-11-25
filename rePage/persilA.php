
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                <h1 style="text-align:center; text-decoration:underline"><strong>DATA KEPEMILIKAN TANAH <?php echo $sub; ?></strong></h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10%">Persil</th>
                                <th style="width:10%">Kelas</th>
                                <th style="width:10%">Luas</th>
                                <th style="width:30%">Pemilik</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($aset)>0){
                        foreach ($aset as $as): ?>
                            <tr>
                                <td style="text-align:center; color:blue; font-weight:bold; cursor:pointer;" onclick="window.location='base.php?page=riwayat&q=<?php echo $as['asal_id']?>'"><?php echo $as['persil']; ?></td>
                                <td style="text-align:center"><?php echo $as['kelas']; ?></td>
                                <td style="text-align:center"><?php echo $as['luas']; ?></td>
                                <?php if($as['petikan_id'] != null){
                                    $getName = $sqlite->getPetikanById($as['petikan_id']);
                                    foreach($getName as $gn){
                                        echo "<td style='text-align:left;padding-left:20px;'>".$gn['nama']."</td>";
                                        echo "<td style='text-align:left;padding-left:20px;'>".$gn['alamat']."</td>";
                                    }
                                }else{
                                    $getName = $sqlite->getWargaById($as['warga_id']);
                                    foreach($getName as $gn){
                                        echo "<td style='text-align:left;padding-left:20px;'>".$gn['nama']."</td>";
                                        echo "<td style='text-align:left;padding-left:20px;'>".$gn['alamat']."</td>";
                                    }
                                } ?>
                            </tr>
                        <?php endforeach;
                        }else{
                        ?>
                            <tr><td style="text-align:center" colspan=5>Tidak Ada Catatan Aset</td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

    <!--<div style="position:fixed; top:50%; left:-5px;">
        <button style="transform:translateY(-50%);width: 120px; height:75px; background: rgb(153, 255, 204, 1); border:5px solid rgb(255, 204, 0, 1); padding: 10px 20px 10px 5px; border-top-right-radius: 100px; border-bottom-right-radius:100px; font-size: 18px; text-align:center" type="button" onclick="window.location='base.php?page=populate'"><strong>LIHAT STATISTIK</strong></button>
    </div>-->
    </div>