<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Stok Barang</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Tambah Barang Baru
                    </button>
                </div>
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
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                $ambildatastok = mysqli_query($conn, "select * from stok");
                                while ($data = mysqli_fetch_array($ambildatastok)) {
                                    $nama_barang = $data["nama_barang"];
                                    $desk_barang = $data["deskripsi_barang"];
                                    $stok = $data["stok_barang"];
                                    $tanggal_masuk = $data["tanggal_masuk"];
                                    $tanggal_keluar = $data["tanggal_keluar"];
                                    $berat = $data["bobot_barang"];
                                    $panjang = $data["panjang_barang"];
                                    $lebar = $data["lebar_barang"];
                                    $tinggi = $data["tinggi_barang"];


                                ?>
                                    <tr>
                                        <td><?= $nama_barang; ?></td>
                                        <td><?= $desk_barang; ?></td>
                                        <td><?= $stok; ?></td>
                                        <td><?= $berat; ?></td>
                                        <td><?= $panjang; ?></td>
                                        <td><?= $lebar; ?></td>
                                        <td><?= $tinggi; ?></td>
                                    </tr>
                                <?php
                                };

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form method="post">
                        <div class="modal-body">
                            <input type="text" name="nama_barang" placeholder="ID" class="form-control">
                            <br />
                            <input type="text" name="deskripsi_barang" placeholder="Nama" class="form-control">
                            <br />
                            <input type="number" name="stok_barang" placeholder="Stok" class="form-control">
                            <br />
                            <input type="number" step="any" name="bobot_barang" placeholder="Berat" class="form-control">
                            <br />
                            <input type="number" step="any" name="panjang_barang" placeholder="P" class="form-control">
                            <br />
                            <input type="number" step="any" name="lebar_barang" placeholder="L" class="form-control">
                            <br />
                            <input type="number" step="any" name="tinggi_barang" placeholder="T" class="form-control">
                            <br />
                            <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <?php include '../footer.php' ?>
</div>