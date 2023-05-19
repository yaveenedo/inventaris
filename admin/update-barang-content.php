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
                                    <th>Nama Barang</th>
                                    <th>Deskripsi Barang</th>
                                    <th>Stok Barang</th> 
                                    <th>Tanggal Masuk</th>                                 
                                    <th>Tanggal Keluar</th>
                                    <th>Berat</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>T</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>   
                                    <th>Nama Barang</th>
                                    <th>Deskripsi Barang</th>
                                    <th>Stok Barang</th> 
                                    <th>Tanggal Masuk</th>                                 
                                    <th>Tanggal Keluar</th>
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
                                    <td><?=$tanggal_masuk;?></td>
                                    <td><?=$tanggal_keluar;?></td>
                                    <td><?=$berat;?></td>
                                    <td><?=$panjang;?></td>
                                    <td><?=$lebar;?></td>
                                    <td><?=$tinggi;?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                            Edit
                                        </button>
                                        
                                    </td>
                                </tr>
                                <!-- The Modal -->
                                <div class="modal fade" id="edit<?=$idb;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="text" name="nama_barang" value="<?=$nama_barang;?>" class="form-control">
                                    <br/>
                                    <input type="text" name="deskripsi_barang" value="<?=$desk_barang;?>" class="form-control">
                                    <br/>
                                    <input type="number" name="stok_barang" value="<?=$stok;?>" class="form-control">
                                    <br/>
                                    <input type="datetime-local" name="tanggal_masuk" value="<?=$tanggal_masuk;?>" class="form-control">
                                    <br/>
                                    <input type="datetime-local" name="tanggal_keluar" value="<?=$tanggal_keluar;?>" class="form-control">
                                    <br/>
                                    <input type="number" step = "any" name="bobot_barang" value="<?=$berat;?>" class="form-control">
                                    <br/>
                                    <input type="number" step = "any" name="panjang_barang" value="<?=$panjang;?>" class="form-control">
                                    <br/>
                                    <input type="number" step = "any" name="lebar_barang" value="<?=$lebar;?>" class="form-control">
                                    <br/>
                                    <input type="number" step = "any" name="tinggi_barang" value="<?=$tinggi;?>" class="form-control">
                                    <br/>
                                    <input type="hidden" name="idb" value="<?=$idb;?>"/>
                                    <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
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
        