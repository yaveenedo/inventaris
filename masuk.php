<?php
$ambildatastok = mysqli_query($conn,"SELECT * FROM stok");
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama iddo Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Stok Barang</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>   
                        <th>Nama Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Stok Barang</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_array($ambildatastok)){
                        $namabarang = $data["namabarang"];
                        $desk_barang = $data["desk_barang"];
                        $stok = $data["stok"];
                    ?>
                    <tr>
                        <td><?=$namabarang;?></td>
                        <td><?=$desk_barang;?></td>
                        <td><?=$stok;?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

