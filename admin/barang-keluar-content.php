<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Barang Keluar</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Tambah Barang Keluar
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal Keluar</th> 
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Stok Keluar</th>
                                    <th>Penerima</th> 
                                    <th>Stok Sisa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>   
                                    <th>Tanggal Keluar</th> 
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Stok Keluar</th>
                                    <th>Penerima</th> 
                                    <th>Stok Sisa</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                <?php
                                $ambildatastok = mysqli_query($conn,"select * from stok");
                                while($data=mysqli_fetch_array($ambildatastok)){
                                    $idb = $data["id_barang"];
                                    $nama_barang = $data["nama_barang"];
                                    $desk_barang = $data["deskripsi_barang"];
                                    $stok = $data["stok_barang"];
                                }
                                $ambildatakeluar = mysqli_query($conn, "select * from barang_keluar");
                                while ($data = mysqli_fetch_array($ambildatakeluar)) {
                                    $idb = $data["id_barang"];
                                    $tanggal_keluar = $data["tanggal_keluar"];
                                    $stok_keluar = $data["stok_keluar"];
                                    $penerima = $data["penerima"];
                                    $stok_sisa = $data["stok_sisa"];
                        
                                ?>
                                    <tr>
                                        <td><?=$tanggal_keluar;?></td>
                                        <td><?=$desk_barang;?></td>
                                        <td><?=$stok;?></td>
                                        <td><?=$stok_keluar;?></td>
                                        <td><?=$penerima;?></td>
                                        <td><?=$stok_sisa;?></td>
                                
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $idb; ?>">
                                            Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                            Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Barang Masuk</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="datetime-local" name="tanggal_masuk" placeholder="Tanggal Masuk" class="form-control">
                                                        <br />
                                                        <input type="text" name="deskripsi_barang" placeholder="Nama Barang" class="form-control">
                                                        <br />
                                                        <input type="number" step="any" name="stok_barang" placeholder="Jumlah" class="form-control">
                                                        <br />
                                                        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
                                                        <br />
                                                        <button type="submit" class="btn btn-primary" name="addbarangkeluar">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="edit<?= $idb; ?>">
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
                                                        <input type="datetime-local" name="tanggal_masuk" placeholder="Tanggal Masuk" class="form-control">
                                                        <br />
                                                        <input type="text" name="deskripsi_barang" placeholder="Nama Barang" class="form-control">
                                                        <br />
                                                        <input type="number" step="any" name="stok_barang" placeholder="Jumlah" class="form-control">
                                                        <br />
                                                        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
                                                        <br />
                                                        <input type="hidden" name="idb" value="<?= $idb; ?>" />
                                                        <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
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
                                                        <button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Hapus</button>
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
        