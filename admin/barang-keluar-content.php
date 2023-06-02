<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Barang Masuk</h1>
            <div class="card mb-4">
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
                                // $ambildatastok = mysqli_query($conn, "select * from stok UNION select * from barang_masuk");
                                $ambildatastok = mysqli_query($conn, "SELECT * FROM stok
                                      LEFT JOIN barang_masuk ON stok.id_barang = barang_masuk.id_barang_stok
                                      LEFT JOIN barang_keluar ON stok.id_barang = barang_keluar.id_barang_stok");
                                while ($data = mysqli_fetch_array($ambildatastok)) {
                                    $stok_barang = $data["stok_barang"];
                                    $id_barang_stock = $data["id_barang"];
                                    $id_barang_keluar = $data["id_barang_keluar"];
                                    $tanggal_keluar = $data["tanggal_keluar"];
                                    $desk_barang = $data["deskripsi_barang"]; //nama_barang
                                    $stok_keluar = $data["stok_keluar"];
                                    $penerima = $data["penerima"];
                                    $stok_sisa = $data["stok_sisa"];
                                ?>
                                    <tr>
                                        <td><?= $tanggal_keluar; ?></td>
                                        <td><?= $desk_barang; ?></td>
                                        <td><?= $stok_barang; ?></td>
                                        <td><?= $stok_keluar; ?></td>
                                        <td><?= $penerima; ?></td>
                                        <td><?= $stok_sisa; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-barang-keluar<?= $id_barang_stock; ?>">
                                                Tambah
                                            </button>
                                            <?php if ($id_barang_keluar !== null):?>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-barang-keluar<?=$id_barang_keluar;?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-barang-keluar<?=$id_barang_keluar;?>">
                                                    Delete
                                                </button>
                                            <?php endif ?>       
                                        </td>
                                    </tr>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="tambah-barang-keluar<?= $id_barang_stock; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Barang Keluar</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="datetime-local" name="tanggal_keluar" placeholder="Tanggal Keluar" class="form-control">
                                                        <br />
                                                        <input type="number" step="any" name="stok_keluar" placeholder="Jumlah Stok Keluar" class="form-control">
                                                        <br />
                                                        <input type="text" name="penerima" placeholder="Penerima" class="form-control">
                                                        <br />
                                                        <input type="hidden" name="id_barang_stok" value="<?=$id_barang_stock;?>"/>
                                                        <button type="submit" class="btn btn-primary" name="addnewbarangkeluar">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="edit-barang-keluar<?= $id_barang_keluar; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang Keluar</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="datetime-local" name="tanggal_keluar" placeholder="Tanggal Keluar" class="form-control">
                                                        <br />
                                                        <input type="number" step="any" name="stok_keluar" placeholder="Jumlah Stok Keluar" class="form-control">
                                                        <br />
                                                        <input type="text" name="penerima" placeholder="Penerima" class="form-control">
                                                        <br />
                                                        <input type="hidden" name="id_barang_keluar" value="<?=$id_barang_keluar;?>"/>
                                                        <button type="submit" class="btn btn-primary" name="editbarangkeluar">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="delete-barang-keluar<?=$id_barang_keluar;?>">
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
                                                        Apakah anda yakin ingin menghapus <?=$desk_barang;?>?
                                                        <input type="hidden" name="id_barang_keluar" value="<?=$id_barang_keluar;?>"/>
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