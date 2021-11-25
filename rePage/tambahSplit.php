                        <table id="aset" class="table table-bordered table-condensed" style="margin-bottom:5px">
                        <thead>
                            <tr>
                                <th style="width:75px">Persil</th>
                                <th style="width:150px">Kategori</th>
                                <th style="width:100px">Kelas</th>
                                <th style="width:175px">Luas (m)</th>
                            </tr>
                        </thead>
                        <tbody id="asetBody">
                            <tr>
                                <td style="padding:0"><input class="inputCell itemReq aPersil" type="text" placeholder="No.Persil"></td>
                                <td style="padding:0">
                                    <select class="inputCell itemReq aKategori" style="padding: 3.5px 0;">
                                        <option></option>
                                        <option>KERING</option>
                                        <option>BASAH</option>
                                    </select>
                                </td>
                                <td style="padding:0"><input class="inputCell itemReq aKelas" type="text" placeholder="Kelas"></td>
                                <td style="padding:0"><input class="inputCell itemReq aLuas" type="text" placeholder="Luas"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align:center">
                        <p style="margin:0; font-size: 14px" class="text-warning">**Kelas Tanah Cukup Diisi Dengan Angka.</p>
                        <br>
                        <button class="btn btn-success" type="button" onclick="onPlus()"><strong>Tambah Baris</strong></button>
                        <button class="btn btn-default" type="button" onclick="reseter()"><strong>Reset</strong></button>
                        <button class="btn btn-primary" type="button" onclick="submited('<?php echo $pageIt; ?>')"><strong>Simpan Data</strong></button>
                    </div>