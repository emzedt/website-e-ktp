<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/formdaftarr.css">
    <title>E-KTP</title>

    <!-- Fontawesome CSS -->
	<link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body> 
    <header>
        <div>
            <a class="back" style="margin-left: 30px; color: white; font-size: 60px; margin-top: -80px; margin-bottom: 30px" href="main.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
		    <img class="logo" src="image/Disdukcapil.png" width="350" height="100">
        </div>
        <?php echo "<h2 class='welcome'>Selamat datang, ".$_SESSION['username'] . "</h2>"; ?>
	</header>
    
    <div class="main-body">
        <div class="body-content">
            <h2 style="text-align: center; padding-top:10px;">Pendaftaran E-KTP</h2>
            <form action="" method="POST" enctype="multipart/form-data" id="my-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK" style="text-transform: uppercase;" required> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" style="text-transform: uppercase;" required>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-grup">
                            <label>Tempat</label>
                            <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" style="text-transform: uppercase;" required>
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-grup">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggalLahir" class="form-control" id="tgl" required>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Jenis Kelamin</label>
                            <select name="jenisKelamin" class="form-control">
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" style="text-transform: uppercase;" id="" cols="20" rows="3"></textarea>
                        </div>    
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-grup">
                            <label>RT/RW</label>
                            <input type="text" name="rtrw" class="form-control" placeholder="RT/RW" required>
                        </div>    
                    </div>
                    <div class="col-md-4">
                        <div class="form-grup">
                            <label>Kel/Desa</label>
                            <input type="text" name="keldesa" class="form-control" placeholder="Kel/Desa" style="text-transform: uppercase;" required>
                        </div>    
                    </div>
                    <div class="col-md-4">
                        <div class="form-grup">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" id="kec"  class="form-control" placeholder="Kecamatan" style="text-transform: uppercase;" required>
                        </div>    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Agama</label>
                            <select name="agama" class="form-control" required>
                                <option value="ISLAM">ISLAM</option>
                                <option value="KATOLIK">KATOLIK</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDDHA">BUDDHA</option>
                                <option value="KONGHUCU"></option>
                            </select>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Status Perkawinan</label>
                            <select name="status"  class="form-control" required>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                            </select> 
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Pekerjaan</label>
                            <select name="pekerjaan"  class="form-control" required>
                                <option value="MAHASISWA/PELAJAR">MAHASISWA/PELAJAR</option>
                                <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                                <option value="PNS">PNS</option>
                                <option value="DOSEN">DOSEN</option>
                            </select> 
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Kewarganegaraan</label>
                            <select name="kewarganegaraan"  class="form-control" required>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select> 
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Tanda Tangan</label>
                            <input type="file" name="ttd" class="form-control" required>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label>Foto Diri</label>
                            <input type="file" name="foto" class="form-control" id="" required>
                        </div>    
                    </div>
                </div>
                <br>

                <div class="alert alert-success">
                    <strong>
                        <input type="checkbox" name="Pernyataan1" value="pernyataan1">
                        Saya menyatakan bahwa data yang saya isikan diatas sudah benar
                    </strong>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

            <?php 
                include 'config.php';
                if(isset($_POST['submit']))
                {
                    $user      = $_SESSION['username'];
                    $nik       = $_POST['nik'];
                    $nama      = strtoupper($_POST['nama']);
                    $tempat    = strtoupper($_POST['tempat']);
                    $tgl       = $_POST['tanggalLahir'];
                    $jk        = $_POST['jenisKelamin'];
                    $alamat    = strtoupper($_POST['alamat']);
                    $rtrw      = $_POST['rtrw'];
                    $keldesa   = strtoupper($_POST['keldesa']);
                    $kecamatan = strtoupper($_POST['kecamatan']);
                    $agama     = $_POST['agama'];
                    $status    = $_POST['status'];
                    $pekerjaan = $_POST['pekerjaan'];
                    $kew       = $_POST['kewarganegaraan'];

                    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');

                    // ttd
                    $ttd          = $_FILES['ttd']['name'];
                    $x            = explode('.', $ttd);
                    $ekstensi     = strtolower(end($x));
                    $ukuran	      = $_FILES['ttd']['size'];
                    $file_tmp     = $_FILES['ttd']['tmp_name'];	

                    // foto
                    $fotod        = $_FILES['foto']['name'];
                    $titik        = explode('.', $fotod);
                    $ekstensifoto = strtolower(end($titik));
                    $ukuranfoto   = $_FILES['foto']['size'];
                    $fotod_tmp    = $_FILES['foto']['tmp_name'];

                    if((in_array($ekstensi, $ekstensi_diperbolehkan) === true) || (in_array($ekstensifoto, $ekstensi_diperbolehkan === true)))
                    {
                        if($ukuran < 1500000000 && $ukuranfoto < 1500000000)
                        {			
                            move_uploaded_file($file_tmp, 'folderttd/'.$ttd);
                            move_uploaded_file($fotod_tmp, 'folderfoto/'.$fotod);
                        }
                        else
                        {
                            echo 'UKURAN FILE TERLALU BESAR';
                        }
                    } 
                    else
                    {
                        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                    }

                    

                    $sqluser = "SELECT username FROM tbdatadiri WHERE username='$user'";
                    $resultuser = $conn->query($sqluser);
                    if($resultuser){
                        $sql = "insert into tbdatadiri (username, nik, nama, tempat, tanggallahir, jeniskelamin, alamat, rtrw, keldesa, kecamatan, agama, status, pekerjaan, kewarganegaraan, ttd, foto) 
                        values ('".$user."', '".$nik."', '".$nama."' , '".$tempat."', '".$tgl."', '".$jk."', '".$alamat."', '".$rtrw."', '".$keldesa."', 
                        '".$kecamatan."', '".$agama."', '".$status."', '".$pekerjaan."', '".$kew."', '".$ttd."', '".$fotod."')";
                        $result = mysqli_query($conn, $sql);

                        
                        
                        if($result)
                        {
                            echo "Post has been saved successfully";
                            $sql2 = "INSERT INTO tbstatus (username) VALUES ('$user') ON DUPLICATE KEY UPDATE username = '$user'";
                        $result2 = mysqli_query($conn, $sql2);

                        $sqlstatus = "UPDATE tbstatus SET statusverif = '' WHERE username = '$user'";
                        $resultstatus = mysqli_query($conn, $sqlstatus);
                        } 
                        else
                        {
                            echo "Unable to save post";
                        }
                    }else {
                        echo "Cuman bisa submit sekali";
                    }
                }
            ?>
        </div>
    </div> 
    <footer>
			<p>© COPYRIGHT| DISDUKCAPIL 2022</p>
	</footer>
</body>
</html>