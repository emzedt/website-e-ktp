<?php
session_start();
if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/cetakdata.css">
    <title>E-KTP</title>

    <!-- Fontawesome CSS -->
	<link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- Bootstrap CSS -->
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
            <h2 style="text-align: center;">Cetak Data</h2> <br>
            <center>
            <div class="outer-wrapper">
                <div class="table-wrapper">
                        <table style="border: 1px solid black; border-collapse: collapse; border-radius: 10px">
                            <thead align="center">
                                <th style="border: 1px solid black; border-collapse: collapse; background-color: #009879; color: #ffffff;" width=350>List Username Yang Bisa Dicetak</th>
                            </thead>
                            <tbody style="text-align: center">
                            <?php
                                    include "config.php";
                                    $sql    = "SELECT * FROM tbdatadiri INNER JOIN tbstatus ON tbdatadiri.username = tbstatus.username WHERE statusverif='terverifikasi' AND statusrekam='data sudah terekam'";
                                    $result = $conn->query($sql);
                                    
                                    if($result->num_rows) 
                                    {
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo '<tr>';
                                            echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$row['username'].'</td>';
                                            echo '</tr>';
                                        }
                                    }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
            </center>
            <div class="form">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-grup">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" required> <br>
                                    <button name="BtnSubmit" class="btn btn-primary"  style="margin-right: 90px"><img src="image/print.png" alt="">Cetak</button>
                                    <?php 
                                    if(isset($_POST['BtnSubmit'])){
                                        echo "<script> alert('Data User Berhasil Dicetak') </script>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>

            <?php
                include "config.php";
                
                if(isset($_POST['BtnSubmit']))
                {
                    $username  = $_POST['username'];

                    $sql    = "SELECT * FROM tbdatadiri INNER JOIN tbstatus ON tbdatadiri.username = tbstatus.username WHERE tbstatus.username='$username' AND statusverif='terverifikasi' AND statusrekam='data sudah terekam'";
                    $result = $conn->query($sql);

                    if($result->num_rows) 
                    {
                        while($row = $result->fetch_assoc())
                        {
                            if(isset($_POST['BtnSubmit']))
                            {
                                echo '<div class="wrap" style="margin: auto; width: 80%; padding: 20px;">';
                                    echo '<div class="kartu" style="margin: auto; width: 500px; height: 300px; border-radius: 15px; background-image: url(image/e-ktpkosongan.jpg); background-size: cover; position: relative; font-family: Arial, Helvetica, sans-serif;">';
                                        echo '<div class="judul" style="width: 100%; text-align: center; font-weight: bold; position: absolute; top: 10px"; font-size: 18px>';
                                            echo '<p style="margin: 0">Kartu Tanda Penduduk</p>';
                                            echo '<p style="margin: 0">Banten</p>';
                                        echo '</div>';
                                        echo '<div class="nik" style="position: absolute; top: 47px; left: 100px; font-weight: bold; font-size: 20px; font-family: "OCR";">';
                                            echo '<p style="margin: 0">'.$row['nik'].'</p>';
                                        echo '</div>';
                                        echo '<div class="foto" style="position: absolute; width: 120px; height: 130px; right: 12px; top: 50px; display: flex">';
                                            echo "<img src='folderfoto/$row[foto]' width='126px' height='157px'>";
                                        echo '</div>';
                                        echo '<div class="rincianlain" style="position: absolute; top: 80px; left: 124px; width: 300px; font-size: 10.2px">';
                                            echo '<p style="margin: 0">'.$row['nama'].'</p>';
                                            echo '<p style="margin: 0">'.$row['tempat'].', '.$row['tanggallahir'].'</p>';
                                            echo '<p style="margin: 0">'.$row['jeniskelamin'].'</p>';
                                            echo '<p style="margin: 0">'.$row['alamat'].'</p>';
                                            echo '<p style="margin: 0">'.$row['rtrw'].'</p>';
                                            echo '<p style="margin: 0">'.$row['keldesa'].'</p>';
                                            echo '<p style="margin: 0">'.$row['kecamatan'].'</p>';
                                            echo '<p style="margin: 0">'.$row['agama'].'</p>';
                                            echo '<p style="margin: 0">'.$row['status'].'</p>';
                                            echo '<p style="margin: 0">'.$row['pekerjaan'].'</p>';
                                            echo '<p style="margin: 0">'.$row['kewarganegaraan'].'</p>';
                                            echo '<p style="margin: 0">SEUMUR HIDUP</p>';
                                        echo '</div>';
                                        echo '<div class="tandatangan" style="position: absolute; width: 30px; height: 30px; right: 55px; top: 250px; display: flex">';
                                            echo "<img src='folderttd/$row[ttd]' width='60px' height='40px' >";
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<br>';

                                try 
                                    {
                                        $user2 = $row['username'];
                                        $sql   = mysqli_query($conn, "UPDATE tbstatus SET statuspengiriman = 'Paket E-KTP telah diambil kurir' WHERE username = '$user2'");
                                    } 
                                    catch(mysqli_sql_exception $e)
                                    {
                                        if ($e->getCode() == 1062) 
                                        {
                                            echo "Only Once";
                                        } 
                                    }
                            }
                        }                    
                    }else {
                        echo '<p style="text-align: center">Data tidak ada</p>';
                        echo '<p style="text-align: center">Isi username yang ada, pada tabel di atas</p>';
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