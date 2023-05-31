<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1><?php sapa(); ?></h1>
            <h3 class="mt-4">Data Gudang Indofood</h3>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th> 
                                    <th>Tanggal Masuk</th>
                                    <th>Stok Keluar</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Berat</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>T</th>
                                    <th>Stok Sisa</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>   
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th> 
                                    <th>Tanggal Masuk</th>
                                    <th>Stok Keluar</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Berat</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>T</th>
                                    <th>Stok Sisa</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                <?php
                                $ambildatastok = mysqli_query($conn,"select * from stok");
                                while($data=mysqli_fetch_array($ambildatastok)){
                                    $i = 1;
                                    $nama_barang = $data["nama_barang"];
                                    $desk_barang = $data["deskripsi_barang"];
                                    $tanggal_masuk = $data["tanggal_masuk"];
                                    $stok = $data["stok_barang"];
                                    $stok_keluar = $data["stok_keluar"];
                                    $tanggal_keluar = $data["tanggal_keluar"];
                                    $berat = $data["bobot_barang"];
                                    $panjang = $data["panjang_barang"];
                                    $lebar = $data["lebar_barang"];
                                    $tinggi = $data["tinggi_barang"];
                                    $stok_sisa = $data["stok_sisa"];

                            
                                ?>
                                <tr>
                                    <td><?=$nama_barang;?></td>
                                    <td><?=$desk_barang;?></td>
                                    <td><?=$stok;?></td>
                                    <td><?=$tanggal_masuk;?></td>
                                    <td><?=$stok_keluar;?></td>
                                    <td><?=$tanggal_keluar;?></td>
                                    <td><?=$berat;?></td>
                                    <td><?=$panjang;?></td>
                                    <td><?=$lebar;?></td>
                                    <td><?=$tinggi;?></td>
                                    <td><?=$stok_sisa;?></td>
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
    </main>
    <?php include 'footer.php' ?>
</div>
        