<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Gudang Indofood</h1>
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
        