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
                                    <th class="text-center">ID Barang</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Stok</th> 
                                    <th class="text-center">Berat</th>
                                    <th class="text-center">P</th>
                                    <th class="text-center">L</th>
                                    <th class="text-center">T</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>   
                                    <th class="text-center">ID Barang</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Stok</th> 
                                    <th class="text-center">Berat</th>
                                    <th class="text-center">P</th>
                                    <th class="text-center">L</th>
                                    <th class="text-center">T</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                <?php
                                $ambildatastok = mysqli_query($conn,"select * from stok");
                                while($data=mysqli_fetch_array($ambildatastok)){
                                    $nama_barang = $data["nama_barang"];
                                    $desk_barang = $data["deskripsi_barang"];
                                    $stok = $data["stok_barang"];
                                    $berat = $data["bobot_barang"];
                                    $panjang = $data["panjang_barang"];
                                    $lebar = $data["lebar_barang"];
                                    $tinggi = $data["tinggi_barang"];

                            
                                ?>
                                <tr>
                                    <td><?=$nama_barang;?></td>
                                    <td><?=$desk_barang;?></td>
                                    <td><?=$stok;?></td>
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
        