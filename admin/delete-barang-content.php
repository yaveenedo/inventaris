<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Stok Barang</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok Barang</th> 
                                    <th>Berat</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>T</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>   
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok Barang</th> 
                                    <th>Berat</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>T</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                <?php
                                $ambildatastok = mysqli_query($conn,"select * from stok");
                                while($data=mysqli_fetch_array($ambildatastok)){
                                    $i = 1;
                                    $nama_barang = $data["nama_barang"];
                                    $desk_barang = $data["deskripsi_barang"];
                                    $stok = $data["stok_barang"];
                                    $tanggal_masuk = $data["tanggal_masuk"];
                                    $tanggal_keluar = $data["tanggal_keluar"];
                                    $berat = $data["bobot_barang"];
                                    $panjang = $data["panjang_barang"];
                                    $lebar = $data["lebar_barang"];
                                    $tinggi = $data["tinggi_barang"];
                                    $idb = $data["id_barang"];

                            
                                ?>
                                <tr>
                                    <td><?=$nama_barang;?></td>
                                    <td><?=$desk_barang;?></td>
                                    <td><?=$stok;?></td>
                                    <td><?=$berat;?></td>
                                    <td><?=$panjang;?></td>
                                    <td><?=$lebar;?></td>
                                    <td><?=$tinggi;?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                            Delete
                                        </button>
                                        
                                    </td>
                                </tr>
                                <!-- The Modal -->
                                <div class="modal fade" id="delete<?=$idb;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Delete Barang?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus <?=$nama_barang;?>?
                                                <input type="hidden" name="idb" value="<?=$idb;?>"/>
                                                <br/>
                                                <br/>
                                                <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    </div>
                                </div>
                                    
                                <?php
                                };

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../footer.php' ?>
</div>
        