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
    <link rel="stylesheet" href="css/verifikasi3.css">
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
            <h2 style="text-align: center;">Verifikasi Data</h2>
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    <table>
                        <thead>
                                <th >Username</th>
                                <th>NIK</th>
                                <th align="center">Nama</th>
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
                                <th colspan="2">Button</th>
                        </thead>
                        <tbody>
                            <?php
                                include "config.php";
                                $sql = "SELECT * FROM tbdatadiri INNER JOIN tbstatus ON tbdatadiri.username = tbstatus.username AND statusverif=''";
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
                                        echo '<td><button type="submit" class="btn btn-primary" name="BtnSubmit" value="'.$row["username"].'">Verifikasi</button></td>';
                                        echo '<td><button type="submit" class="btn btn-danger" name="BtnTidak" value="'.$row["username"].'">Tidak Verifikasi</button></td>';
                                        echo '</form';
                                        echo '</tr>';

                                        if(isset($_POST['BtnTidak']))
                                        {
                                            try
                                            {
                                                $user2 = $_POST['BtnTidak'];
                                                $query = mysqli_query($conn, "UPDATE tbstatus SET statusverif = 'tidak terverifikasi' WHERE username='$user2'");
                                                $query2 = mysqli_query($conn, "DELETE FROM tbdatadiri WHERE username='$user2'");
                                                header('Location: verifikasi.php');
                                            }
                                            catch(mysqli_sql_exception $e)
                                            {
                                                if ($e->getCode() == 1062) 
                                                {
                                                    echo "Only Once";
                                                } 
                                                else 
                                                {
                                                    throw $e;// in case it's any other error
                                                    echo "<script>alert('Data Terverifikasi')</script";
                                                }
                                            }
                                        } 
                                        
                                        if(isset($_POST['BtnSubmit']))
                                        {
                                            try 
                                            {
                                                $user2 = $_POST['BtnSubmit'];
                                                $sql2 = mysqli_query($conn, "UPDATE tbstatus SET statusverif = 'terverifikasi' WHERE username='$user2'");
                                                $sql = mysqli_query($conn, "INSERT INTO tbstatus (username, statusverif) VALUES ('$user2', 'terverifikasi') ON DUPLICATE KEY UPDATE username = '$user2'");
                                                header('Location: verifikasi.php');
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