                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:12.5%">Persil</th>
                                <th style="width:12.5%">Kelas</th>
                                <th style="width:15%">Luas (m)</th>
                                <th>Keterangan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $warna = 0;
                            $asaslsekarang = 0;
                            if (count($riwayatAset) > 0) {
                                foreach ($riwayatAset as $ra) : ?>
                                    <?php
                                    $bDar = $ra['dari'];
                                    $duar = explode("-", $bDar);
                                    $bKer = $ra['ke'];
                                    $kuar = explode("-", $bKer);

                                    //warna
                                    $space = 0;

                                    if ($ra['asal_id'] !==  $asaslsekarang) {
                                        $warna = $warna + 70;
                                        $asaslsekarang = $ra['asal_id'];
                                        $space = 1;
                                    }
                                    if (isset($duar[1]) or isset($kuar[1])) {
                                        $aDar = $ra['dari'];
                                        $dar = explode("-", $aDar);
                                        if (isset($dar[1])) {
                                            $warga1 = $sqlite->getpetikById($ra['dari']);
                                            foreach ($warga1 as $w1) {
                                                $wDari = $w1['nama'];
                                                //$wDariNo = "(Petikan C ".$w1['warga_id'].")";
                                                $wDariNo = "(Petikan)";
                                            }
                                        } else {
                                            $warga1 = $sqlite->getWargaById($ra['dari']);
                                            foreach ($warga1 as $w1) {
                                                $wDari = '<a href="base.php?page=profiling&q=' . $aDar . '&r=0">' . $w1['nama'] . '</a>';
                                                $wDariNo = "";
                                            }
                                        }

                                        $aKer = $ra['ke'];
                                        $ker = explode("-", $aKer);
                                        if (isset($ker[1])) {
                                            $warga2 = $sqlite->getpetikById($ra['ke']);
                                            foreach ($warga2 as $w2) {
                                                $wKe = $w2['nama'];
                                                //$wKeNo = "(Petikan C ".$w2['warga_id'].")";
                                                $wKeNo = "(Petikan)";
                                            }
                                        } else {
                                            $warga2 = $sqlite->getWargaById($ra['ke']);
                                            foreach ($warga2 as $w2) {
                                                $wKe = '<a href="base.php?page=profiling&q=' . $aKer . '&r=0">' . $w2['nama'] . '</a>';
                                                $wKeNo = "";
                                            }
                                        }
                                    ?>
                                        <tr>

                                            <td style="text-align:center; color:black; font-weight:bold; cursor:pointer; background-color: hsl( <?php echo $warna; ?>, 55%, 80% );" onclick="window.location='base.php?page=riwayat&q=<?php echo $ra['asal_id']; ?>'"><?php echo $ra['persil']; ?></td>
                                            <td style="text-align:center"><?php echo $ra['kelas']; ?></td>
                                            <td style="text-align:center;"><?php echo $ra['luas']; ?></td>
                                            <td>Dari <strong><?php echo $wDari; ?></strong></a> <b><?php echo $wDariNo; ?></b> <?php echo $ra['sebab']; ?> Ke <strong><?php echo "$wKe"; ?></strong></a> <b><?php echo $wKeNo; ?></b><br>Tgl:<?php echo $ra['tgl'] ?> </td>
                                        </tr>
                                    <?php  } else { ?>


                                        <tr style=" border-top : <?php if ($space == 1) {
                                                                        echo "5px solid rgb(135, 133, 133)";
                                                                    } ?>;  ">
                                            <td style="text-align:center; color:blue; font-weight:bold; cursor:pointer; background-color: hsl( <?php echo $warna; ?>, 55%, 80% );" onclick="window.location='base.php?page=riwayat&q=<?php echo $ra['asal_id']; ?>'"><?php echo $ra['persil']; ?></td>
                                            <td style="text-align:center"><?php echo $ra['kelas']; ?></td>
                                            <td style="text-align:center"><?php echo $ra['luas']; ?></td>
                                            <?php

                                            $warga1 = $sqlite->getWargaById($ra['dari']);
                                            $warga2 = $sqlite->getWargaById($ra['ke']);
                                            foreach ($warga1 as $w1) {
                                                $wDari = $w1['nama'];
                                            }
                                            foreach ($warga2 as $w2) {
                                                $wKe = $w2['nama'];
                                            }

                                            if ($ra['dari'] != '') { ?>

                                                <td> Dari <a href="base.php?page=profiling&q=<?php echo $ra['dari'] ?>&r=0"><strong><?php echo $wDari; ?></strong></a> <?php echo $ra['sebab']; ?> Ke <a href="base.php?page=profiling&q=<?php echo $ra['ke'] ?>&r=0"><strong><?php if ($wKe != '') {
                                                                                                                                                                                                                                                                                    echo $wKe;
                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                    echo $ra['ke'];
                                                                                                                                                                                                                                                                                } ?></strong></a><br>Tgl:<?php echo $ra['tgl'] ?>
                                                    <?php if (isset($ra['ket'])) {
                                                        echo '<br>' . $ra['ket'];
                                                    } ?></td>
                                            <?php } elseif ($ra['dari'] == '' && $ra['sebab'] != '') { ?>
                                                <td><?php echo $ra['sebab'] . ' Tgl: ' . $ra['tgl'] . '   asal (' . $ra['asal_id'] . ')'; ?></td>
                                            <?php } else { ?>
                                                <td>Pemilik Pertama <?php echo $wKe; ?></td>
                                            <?php } ?>

                                        </tr>

                                        <!-- <tr>
                                <td colspan=4>spacetoon</td>
                            </tr> -->
                                <?php }
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td style="text-align:center" colspan=4>Tidak Ada Catatan Riwayat</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>