<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toko Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
$id = $_GET['id']; 

//koneksi database
include('dbconnect.php');

//query
$query = "SELECT * FROM buku join genre on buku.id_genre = genre.id_genre WHERE id_buku='$id'";
$result = mysqli_query($koneksi, $query);

$genre = "SELECT * FROM genre";
$result_genre = mysqli_query($koneksi , $genre);

?>

<div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">
    <h3>Update Data Buku</h3>
    <form role="form" action="edit.php" method="get">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <input type="hidden" name="id_bk" value="<?php echo $row['id_buku']; ?>">
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul_bk" class="form-control" value="<?php echo $row['judul_buku']; ?>">          
        </div>

        <div class="form-group">
            <label>Penerbit Buku</label>
            <input type="text" name="terbit_bk" class="form-control" value="<?php echo $row['penerbit_buku']; ?>">          
        </div>

        <div class="form-group">
            <label>Genre Buku</label>
            <select class="form-control custom-select-value" name="genre_bk" require>
            <?php while ($data = mysqli_fetch_assoc($result_genre)) { ?>
                <option value="<?php echo $data['id_genre'];?>" 
                    <?php if($row['id_genre']==$data['id_genre']) echo 'selected'?>
                >
                    <?php echo $data['genre_buku']; ?>
                </option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Harga Buku</label>
            <input type="text" name="harga_bk" class="form-control" value="<?php echo $row['harga_buku']; ?>">          
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Buku</button>
        <?php }
        mysqli_close($koneksi);
        ?>              
    </form>
</div>
</body>
</html> 
