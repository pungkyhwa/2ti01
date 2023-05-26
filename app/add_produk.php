<?php 
$app = new application;
$query = "SELECT COUNT(id_produk) as jml FROM produk";

foreach ($app->tampilData($query) as $row) {   
    $jumlahprodukSaatini = $row['jml'];
    $idPro = $jumlahprodukSaatini + 1;
    if($idPro < 10){
        $idProbaru = "0".$idPro;
    }else{
        $idProbaru = $idPro;
    }
}


?>
<!-- left column -->
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary mt-3 ml-3">
        <div class="card-header">
        <h3 class="card-title">Tambah Produk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form name="pegawi" method="POST" action="">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">id Produk</label>
                <input type="text" name="id_produk" class="form-control" id="exampleInputEmail1" value="<?php echo"PRO-$idProbaru"?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Merek Produk</label>
                <input type="text" name="merek" class="form-control" id="exampleInputPassword1" placeholder="Nama merek produk">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">supplier</label>
                <select name="id_supplier" class="form-control select2bs4" style="width: 100%;">
                    <option>Pilih Supplier</option>
                    <?php 
                         $query = "SELECT * FROM supplier";
                         foreach ($app->tampilData($query) as $row) { 
                            echo "<option value=".$row['id_supplier'].">".$row['nm_supplier']."</option>";
                         }
                    ?>
                  </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">satuan</label>
                <select name="id_satuan" class="form-control select2bs4" style="width: 100%;">
                    <option>Pilih satuan</option>
                    <?php 
                         $query = "SELECT * FROM satuan";
                         foreach ($app->tampilData($query) as $row1) { 
                            echo "<option value=".$row1['id_satuan'].">".$row1['nm_satuan']."</option>";
                         }
                    ?>
                  </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">kategori</label>
                <select name="id_kategori" class="form-control select2bs4" style="width: 100%;">
                    <option>Pilih kategori</option>
                    <?php 
                         $query = "SELECT * FROM kat_produk";
                         foreach ($app->tampilData($query) as $row2) { 
                            echo "<option value=".$row2['id_kategori'].">".$row2['nm_kategori']."</option>";
                         }
                    ?>
                  </select>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi produk</label>
                <textarea name="deskripsi" class="form-control" id="exampleInputPassword1" cols="30" rows="10"></textarea>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.card -->



</div>
<?php 
    if (isset($_POST['submit'])) {
        // untuk menerima post dari textfield
        $id_produk = $_POST['id_produk'];
        $merek = $_POST['merek'];
        $id_supplier = $_POST['id_supplier'];
        $id_satuan = $_POST['id_satuan'];
        $id_kategori = $_POST['id_kategori'];
        $deskripsi = $_POST['deskripsi'];

        //jalankan method addPegawai   
        $app->addProduk($id_produk,$merek,$id_supplier,$id_satuan,$id_kategori,$deskripsi);
        // ridirect link
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=dasboard.php?page=app/view_supplier">';
    }

?>