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
                                    <th class="text-center">Tanggal Masuk</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Stok Masuk</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Tanggal Masuk</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Stok Masuk</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                // $ambildatastok = mysqli_query($conn, "select * from stok UNION select * from barang_masuk");
                                $ambildatastok = mysqli_query($conn, "select * from stok left join barang_masuk on stok.id_barang = barang_masuk.id_barang_stok");
                                while ($data = mysqli_fetch_array($ambildatastok)) {
                                    $id_barang_stock = $data["id_barang"];
                                    $id_barang_masuk = $data["id_barang_masuk"];
                                    $tanggal_masuk = $data["tanggal_masuk"];
                                    $desk_barang = $data["deskripsi_barang"]; //nama_barang
                                    $stok_masuk = $data["stok_masuk"];
                                    $stok_barang = $data["stok_barang"];
                                    $keterangan = $data["keterangan"];



                                ?>
                                    <tr>
                                        <td><?= $tanggal_masuk; ?></td>
                                        <td><?= $desk_barang; ?></td>
                                        <td><?= $stok_masuk; ?></td>
                                        <td><?= $keterangan; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-barang-masuk<?= $id_barang_stock; ?>">
                                                Tambah
                                            </button>
                                            <?php if ($id_barang_masuk !== null):?>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-barang-masuk<?=$id_barang_masuk;?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-barang-masuk<?=$id_barang_masuk;?>">
                                                    Delete
                                                </button>
                                            <?php endif ?>       
                                        </td>
                                    </tr>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="tambah-barang-masuk<?= $id_barang_stock; ?>">
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
                                                        <input type="number" step="any" name="stok_masuk" placeholder="Jumlah Stok" class="form-control">
                                                        <br />
                                                        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
                                                        <br />
                                                        <input type="hidden" name="id_barang_stok" value="<?=$id_barang_stock;?>"/>
                                                        <input type="hidden" name="stok_barang" value="<?=$stok_barang;?>"/>
                                                        <button type="submit" class="btn btn-primary" name="addnewbarangmasuk">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="edit-barang-masuk<?= $id_barang_masuk; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang Masuk</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="datetime-local" name="tanggal_masuk" placeholder="Tanggal Masuk" class="form-control">
                                                        <br />
                                                        <input type="number" step="any" name="stok_masuk" placeholder="Jumlah Stok" class="form-control">
                                                        <br />
                                                        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
                                                        <br />
                                                        <input type="hidden" name="id_barang_masuk" value="<?=$id_barang_masuk;?>"/>
                                                        <button type="submit" class="btn btn-primary" name="editbarangmasuk">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="delete-barang-masuk<?=$id_barang_masuk;?>">
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
                                                        Apakah anda yakin ingin menghapus data barang masuk <?=$desk_barang;?>?
                                                        <input type="hidden" name="id_barang_masuk" value="<?=$id_barang_masuk;?>"/>
                                                        <br/>
                                                        <br/>
                                                        <button type="submit" class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
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