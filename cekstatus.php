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
    <link rel="stylesheet" href="css/cekstatus.css">
    <title>E-KTP</title>

    <!-- Fontawesome CSS -->
	<link rel="stylesheet" href="fontawesome/css/all.css">
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
            <h2 style="text-align: center;">Cek Status</h2>
            <div class="main-body">
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <div class="body-content">
                            <?php
                                include 'config.php';
                                $user = $_SESSION['username'];
                                $sql    = "SELECT * FROM tbstatus WHERE username='$user'";
                                $result = $conn->query($sql);

                                if($result->num_rows) 
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '<div class="status">';
                                        if($row['statusverif'] == "terverifikasi")
                                        {
                                            echo '<div class="container">';
                                                echo '<div class="circle"><i class="fa-solid fa-check"></i></div>';
                                                if($row['statusrekam'] == "data sudah terekam"){
                                                    echo '<hr class="garisverif" style="background-color: ;">';
                                                }else{
                                                    echo '<hr class="garisverif" style="background-color: #D9D9D9;">';
                                                }
                                                echo  '<p>Status Verifikasi</p>';
                                            echo '</div>';
                                            if($row['statusrekam'] == ""){
                                                echo '<div class="container2">';
                                                echo '<div class="circle" style="background-color: #D9D9D9;"><i class="fa-solid fa-warehouse"></i></div>';
                                                    echo '<hr class="garisrekam" style="background-color: #D9D9D9;">';
                                                echo  '<p>Status Rekam</p>';
                                            echo '</div>';
                                                echo '<div class="container3">';
                                                    echo '<div class="circle2"><i class="fa-solid fa-truck"></i></div>';
                                                    echo  '<p>Status Pengiriman</p>';
                                                echo '</div>';  
                                            }
                                            elseif($row['statusrekam'] == "data sudah terekam"){
                                            echo '<div class="container2">';
                                                echo '<div class="circle"><i class="fa-solid fa-check"></i></div>';
                                                if($row['statuspengiriman'] == "Paket E-KTP telah diambil kurir" || $row['statuspengiriman'] == ""){
                                                    echo '<hr class="garisrekam" style="background-color: #D9D9D9;">';
                                                }elseif($row['statuspengiriman'] == "Paket telah selesai diantar"){
                                                    echo '<hr class="garisrekam" style="background-color: #2ecc71;">';
                                                }
                                                echo  '<p>Status Rekam</p>';
                                            echo '</div>';
                                                if($row['statuspengiriman'] == "Paket E-KTP telah diambil kurir" || $row['statuspengiriman'] == ""){
                                                echo '<div class="container3">';
                                                    echo '<div class="circle2"><i class="fa-solid fa-truck"></i></div>';
                                                    echo  '<p>Status Pengiriman</p>';
                                                echo '</div>';
                                                }elseif($row['statuspengiriman'] == "Paket telah selesai diantar"){
                                                echo '<div class="container3">';
                                                    echo '<div class="circle"><i class="fa-solid fa-check"></i></div>';
                                                    echo  '<p>Status Pengiriman</p>';
                                                echo '</div>';
                                                }
                                            }
                                        } elseif($row['statusverif'] == ""){
                                                echo '<div class="container">';
                                                    echo '<div class="circle" style="background-color: #D9D9D9;"><i class="fa-sharp fa-solid fa-cloud-rain"></i></div>';
                                                    echo '<hr class="garisverif" style="background-color: #D9D9D9;">';
                                                    echo  '<p>Status Verifikasi</p>';
                                                echo '</div>';
                                                echo '<div class="container2">';
                                                    echo '<div class="circle" style="background-color: #D9D9D9;"><i class="fa-solid fa-warehouse"></i></div>';
                                                        echo '<hr class="garisrekam" style="background-color: #D9D9D9;">';
                                                    echo  '<p>Status Rekam</p>';
                                                echo '</div>';
                                                echo '<div class="container3">';
                                                    echo '<div class="circle2"><i class="fa-solid fa-truck"></i></div>';
                                                    echo  '<p>Status Pengiriman</p>';
                                                echo '</div>';
                                        }
                                        echo '</div>';
                                
                                    }
                                        
                                } else {
                                    echo '<div class="bar" style="border: 1px solid #a33a3a; color: #ba3939; background: #ffe0e0; border: 1px solid #a33a3a; padding: 10px;
                                    margin: 10px; color: #333;">
                                    <i class="fa-solid fa-circle-exclamation" style="color:#a33a3a "></i>
                                    Anda belum mendaftarkan data diri anda di menu <br><center>Form Pendaftaran E-KTP</center><br>
                                    <center><a href="formdaftar.php" style="text-decoration: none; color: #146ebe; cursor: pointer">Klik link ini</a></center>
                                    </div>';

                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <footer>
		<h5>© COPYRIGHT| DISDUKCAPIL 2022</h5>
	</footer> 
</body>
</html>