<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>
<body>
<div style="background-image: url('3.png'); height: 100%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md justify-content-center">
                <div class="card" style="margin-top: 5%">
                    <div class="card-body">
                        <div class="container">
                            <div class="text-center">
                                <h3>Data Mahasiswa</h3>
                            </div>
                        </div>
                        <div class="container">
                            <a class="btn btn-primary" href="add.php" role="button">Tambah Mahasiswa</a>
                            <?php
                                session_start();
                                if(!empty($_SESSION['statusMsg'])){
                                    echo '<p style ="color = "green"">'.$_SESSION['statusMsg'].'</p>';
                                    unset($_SESSION['statusMsg']);
                                }
                                ?>
                            <div class="row" style="margin-top: 1%;">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include 'DB.php';
                                    $db = new DB();
                                    $users = $db->getRows('tbl_mhs',array('order_by'=>'id ASC'));
                                    $count = 0; 
                                    foreach($users as $user){ $count++;?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $user['nim']; ?></td>
                                            <td><?php echo $user['namamhs']; ?></td>
                                            <td><?php echo $user['jk']; ?></td>
                                            <td><?php echo $user['alamat']; ?></td>
                                            <td><?php echo $user['kota']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><img src="foto/<?php echo $user['foto']; ?>"
                                                    style="width: 150; height: 200">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="edit.php?id=<?php echo $user['id'];?>" role="button">Edit</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" href="proses.php?id=<?php echo $user['id'];?>&aksi=hapus" role="button">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>