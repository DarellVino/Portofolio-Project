<?php
    include "dbconnect.php";
?>

<html lang="en">
<head>
    <title>Toko Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery.dataTables.min.css">
</head>
<body>
    <div style="padding: 20px;">
        <h3>Crud APP Toko Buku</h3>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <h3>Form Tambah Buku</h3>
                <form role="form" action="insert.php" method="post">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_bk" class="form-control" require="">
                    </div>
                    <div class="form-group">
                        <label>Penerbit Buku</label>
                        <input type="text" name="terbit_bk" class="form-control" require="">
                    </div>
                    
                    <div class="form-group">
                        <label>Genre Buku</label>
                        <div class="input-group custom-go-button">
                            <div class="form-select-list">
                                <select class="form-control custom-select-value" name="genre_bk" require="">
                                    <?php
                                        $q_genres = "SELECT * FROM genre";
                                        $genres = mysqli_query($koneksi, $q_genres);
                                        while($data = mysqli_fetch_assoc($genres)){
                                            echo "<option value='".$data['id_genre']."'>".$data['genre_buku']."</option>";
                                            
                                        }
                                    ?>
                                </select>
                            </div>
                                <span class="input-group-btn"><button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModal">Tambah Genre</button></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga Buku</label>
                        <input type="number" name="harga_bk" class="form-control" require="">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Tambah Buku</button>                   
                </form>
                
            </div>
            <div class="col-sm-8">
                <h3>Tabel Daftar Buku</h3>
                <table class="table table-striped table-hover dtabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penerbit Buku</th>
                            <th>Genre Buku</th>
                            <th>Harga Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php
                            $q_buku = "select b.id_buku, b.judul_buku, b.penerbit_buku, 
                                        g.genre_buku, b.harga_buku from buku b, 
                                        genre g where b.id_genre = g.id_genre";
                            $bukus = mysqli_query($koneksi, $q_buku);
                            while($data = mysqli_fetch_assoc($bukus)){
                                echo "<tr role='row'>";
                                echo "    <td>".$data['id_buku']."</td>";
                                echo "    <td>".$data['judul_buku']."</td>";
                                echo "    <td>".$data['penerbit_buku']."</td>";
                                echo "    <td>".$data['genre_buku']."</td>";
                                echo "    <td>".$data['harga_buku']."</td>";
                                echo "    <td>";
                                echo "        <a href='editform.php?id=".$data['id_buku']."' class='btn btn-success' role='button'>Edit</a>";
                                echo "        <a href='delete.php?id=".$data['id_buku']."' class='btn btn-danger' role='button'>Delete</a>";
                                echo "    </td>";
                                echo "</tr>";
                            }
                        ?>
            </tbody>
                </table>
            </div>
            
        </div>
        
    </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Tambah Genre</h4> 
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <form method="post" action="insert_genre.php"> 
    <div class="modal-body">
            
        <div class="form-group">
            <label for="exampleInputEmail1">Genre</label>
            <input type="text" class="form-control" name="add_genre" placeholder="Enter Genre">
            
        </div>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-success" name="submit">Submit</button> 
            </div>
        </form>
    </div>

  </div>
</div>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.dtabel').DataTable();
    } );

    
    </script>

 </body>
 </html>

