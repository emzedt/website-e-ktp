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
    <link rel="stylesheet" href="css/rekam2.css">
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
            <h2 style="text-align: center;">Rekam Data</h2>
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>RT/RW</th>
                                <th>Kel/Desa</th>
                                <th>Kecamatan</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th>Pekerjaan</th>
                                <th>Kewarganegaraan</th>
                                <th>TTD</th>
                                <th>Foto</th>
                                <th>Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "config.php";
                                $sql    = "SELECT * FROM tbdatadiri INNER JOIN tbstatus ON tbdatadiri.username = tbstatus.username AND statusverif='terverifikasi'";
                                $result = $conn->query($sql);
                                $user   = $_SESSION['username'];

                                if($result->num_rows) 
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '<tr>';
                                        echo '<form method="POST"';
                                        echo '<br><td>'.$row['username'].'</td>';
                                        echo '<td>'.$row['nik'].'</td>';
                                        echo '<td>'.$row['nama'].'</td>';
                                        echo '<td>'.$row['tempat'].'</td>';
                                        echo '<td>'.$row['tanggallahir'].'</td>';
                                        echo '<td>'.$row['jeniskelamin'].'</td>';
                                        echo '<td>'.$row['alamat'].'</td>';
                                        echo '<td>'.$row['rtrw'].'</td>';
                                        echo '<td>'.$row['keldesa'].'</td>';
                                        echo '<td>'.$row['kecamatan'].'</td>';
                                        echo '<td>'.$row['agama'].'</td>';
                                        echo '<td>'.$row['status'].'</td>';
                                        echo '<td>'.$row['pekerjaan'].'</td>';
                                        echo '<td>'.$row['kewarganegaraan'].'</td>';
                                        echo '<td>';
                                        echo "<img src='folderttd/$row[ttd]' height=100 width=100 >";
                                        echo '</td>';
                                        echo '<td>';
                                        echo "<img src='folderfoto/$row[foto]' height=100 width=100 >";
                                        echo '</td>';
                                        echo '<td><button type="submit" class="btn btn-primary" name="BtnSubmit" value="'.$row['username'].'">Rekam Data</button></td>';
                                        echo '</form';
                                        echo '</tr>';

                                        if(isset($_POST['BtnSubmit']))
                                        {
                                            $user2 = $_POST['BtnSubmit'];
                                            $query = "SELECT * FROM tbdatadiri WHERE username='$user2'";
                                            $result2 = $conn->query($query);
                                            
                                            if($row2 = $result2->fetch_assoc())
                                            {
                                                echo '<div class="wrap" style="margin: auto; width: 80%; padding: 20px;">';
                                                    echo '<div class="kartu" style="margin: auto; width: 500px; height: 300px; border-radius: 15px; background-image: url(image/e-ktpkosongan.jpg); background-size: cover; position: relative; font-family: Arial, Helvetica, sans-serif;">';
                                                        echo '<div class="judul" style="width: 100%; text-align: center; font-weight: bold; position: absolute; top: 10px"; font-size: 18px>';
                                                            echo '<p style="margin: 0">Kartu Tanda Penduduk</p>';
                                                            echo '<p style="margin: 0">Banten</p>';
                                                        echo '</div>';
                                                        echo '<div class="nik" style="position: absolute; top: 47px; left: 100px; font-weight: bold; font-size: 20px; font-family: "OCR";">';
                                                            echo '<p style="margin: 0">'.$row2['nik'].'</p>';
                                                        echo '</div>';
                                                        echo '<div class="foto" style="position: absolute; width: 120px; height: 130px; right: 12px; top: 50px; display: flex">';
                                                            echo "<img src='folderfoto/$row2[foto]' width='126px' height='157px'>";
                                                        echo '</div>';
                                                        echo '<div class="rincianlain" style="position: absolute; top: 82px; left: 124px; width: 300px; font-size: 10.2px; font-weight: bold">';
                                                            echo '<p style="margin: 0">'.$row2['nama'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['tempat'].', '.$row2['tanggallahir'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['jeniskelamin'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['alamat'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['rtrw'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['keldesa'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['kecamatan'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['agama'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['status'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['pekerjaan'].'</p>';
                                                            echo '<p style="margin: 0">'.$row2['kewarganegaraan'].'</p>';
                                                            echo '<p style="margin: 0">SEUMUR HIDUP</p>';
                                                        echo '</div>';
                                                        echo '<div class="tandatangan" style="position: absolute; width: 30px; height: 30px; right: 55px; top: 250px; display: flex">';
                                                            echo "<img src='folderttd/$row2[ttd]' width='60px' height='40px' >";
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '<br><br><br>';

                                                try 
                                                {
                                                    $user2 = $row['username'];
                                                    $sql   = mysqli_query($conn, "UPDATE tbstatus SET statusrekam = 'data sudah terekam' WHERE username = '$user2'");
                                                    echo "<script>alert('Data Sudah Terekam')</script";
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
                                    }   
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer>
		<p>© COPYRIGHT| DISDUKCAPIL 2022</p>
	</footer>
</body>
</html>