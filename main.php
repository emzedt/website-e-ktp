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
    <link rel="stylesheet" href="css/stylesmain.css">
    <title>E-KTP</title>
    <script>
        function peringatan(){
            alert('Anda tidak memiliki akses');
        }
    </script>
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
            <h1 style="font-family:'poppins';">Menu Layanan</h1>
            <table width="100%">
                <tr class="tr-table">
                    <td class="td-form" align="center">
                        <a href="formdaftar.php">
                            <div class="box1">
                            <p style="padding: 10px 10px; color: white; text-align: left;">e-KTP</p>
                            <img src="image/icon (7).png" alt="" style="padding: 10px 0px 0px 120px;">
                            </div>
                            <label for="box1" style="color:black;">Pendaftaran Kartu <br>Tanda Penduduk</label> 
                        </a>
                    </td>
                    
                    <td class="td-status" align="center">
                        <a href="cekstatus.php">
                            <div class="box2">
                                <p style="text-align:left; padding:10px 10px; color: white">Status</p>
                                <img src="image/icon (1).png" alt="" style="padding: 10px 0px 0px 120px;">
                            </div>
                        </a>
                        <label for="box2">Cek Status</label>
                    </td>

                    <td class="td-contact-us" align="center">
                        <a href="contactus.php">
                            <div class="box3">
                                <p style="padding: 10px 10px; color: white; text-align: left;">Contact Us</p>
                                <img src="image/icon (2).png" alt="" style="padding: 10px 0px 0px 120px;">
                            </div>
                        </a>
                        <label for="box3">Contact Us</label>
                    </td>

                    <td class="td-verifikasi" align="center">
                        <?php 
                            include 'config.php';
                            $user = $_SESSION['username'];
                            $query = "SELECT idrole FROM tbuser WHERE username = '$user'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            if($row['idrole'] == "1" || $row['idrole'] == "4" || $row['idrole'] == "4" || $row['idrole'] == "5" || $row['idrole'] == "6"){
                                echo" <a href='' onclick='peringatan()'>";
                                echo "<div class='box4'>";
                                echo " <p style='padding: 10px 10px; color: white; text-align: left;'>Verifikasi</p>";
                                echo "<img src='image/icon (3).png' alt='' style='padding: 10px 0px 0px 120px;'>";
                                echo "</div>";
                                echo "<label for='box4' style='color:black;'>Verifikasi Data</label><br>";
                                echo "  </a>";
                            }else {
                                if($row['idrole'] == "3" || $row['idrole'] == "2"){
                                    echo" <a href='verifikasi.php'>";
                                    echo "<div class='box4'>";
                                    echo " <p style='padding: 10px 10px; color: white; text-align: left;'>Verifikasi</p>";
                                    echo "<img src='image/icon (3).png' alt='' style='padding: 10px 0px 0px 120px;'>";
                                    echo "</div>";
                                    echo "<label for='box4'>Verifikasi Data</label><br>";
                                    echo "</a>";
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td class="td-rekam" align="right">
                        <?php 
                            include 'config.php';
                            $user = $_SESSION['username'];
                            $query = "SELECT idrole FROM tbuser WHERE username = '$user'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            if($row['idrole'] == "1" || $row['idrole'] == "3" || $row['idrole'] == "5" || $row['idrole'] == "6"){
                                echo" <a href='' onclick='peringatan()'>";
                                echo "<div class='box5'>";
                                echo "<p style='padding: 10px 10px; color: white; text-align: left;'>Rekam</p>";
                                echo "<img src='image/icon (4).png' alt='' style='padding: 10px 10px 0px 120px;'>";
                                echo "</div>";
                                echo "<label for='box5' style='padding-right:45px; color:black;'>Rekam Data</label><br>";
                                echo "  </a>";
                            }else {
                                if($row['idrole'] == "4" || $row['idrole'] == "2"){
                                    echo" <a href='rekam.php'>";
                                    echo "<div class='box5'>";
                                    echo "<p style='padding: 10px 10px; color: white; text-align: left;'>Rekam</p>";
                                    echo "<img src='image/icon (4).png' alt='' style='padding: 10px 10px 0px 120px;'>";
                                    echo "</div>";
                                    echo "<label for='box5' style='padding-right:45px;'>Rekam Data</label><br>";
                                    echo "</a>";
                                }
                            }
                        ?>
                    </td>

                    <td class="td-cetak" align="center">
                        <?php 
                            include 'config.php';
                            $user = $_SESSION['username'];
                            $query = "SELECT idrole FROM tbuser WHERE username = '$user'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            if($row['idrole'] == "1" || $row['idrole'] == "3" || $row['idrole'] == "4" || $row['idrole'] == "6"){
                                echo" <a href='' onclick='peringatan()'>";
                                echo "<div class='box6'>";
                                echo "<p style='padding: 10px 10px; color: white; text-align: left;'>Cetak</p>";
                                echo "<img src='image/icon (5).png' alt='' style='padding: 10px 0px 0px 120px;'>";
                                echo "</div>";
                                echo "<label for='box6' style='color:black;'>Cetak Data</label><br>";
                                echo "  </a>";
                            }else {
                                if($row['idrole'] == "5" || $row['idrole'] == "2"){
                                    echo" <a href='cetak.php'>";
                                    echo "<div class='box6'>";
                                    echo " <p style='padding: 10px 10px; color: white; text-align: left;'>Cetak</p>";
                                    echo "<img src='image/icon (5).png' alt='' style='padding: 10px 0px 0px 120px;'>";
                                    echo "</div>";
                                    echo "<label for='box6'>Cetak Data</label><br>";
                                    echo "</a>";
                                }
                            }
                        ?>
                    </td>

                    <td class="td-pengiriman" align="left">
                        <?php 
                            include 'config.php';
                            $user = $_SESSION['username'];
                            $query = "SELECT idrole FROM tbuser WHERE username = '$user'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            if($row['idrole'] == "1" || $row['idrole'] == "3" || $row['idrole'] == "4" || $row['idrole'] == "5"){
                                echo" <a href='' onclick='peringatan()'>";
                                echo "<div class='box7'>";
                                echo "<p style='padding: 10px 10px; color: white; text-align: left;'>Pengiriman</p>";
                                echo "<img src='image/icon (6).png' alt='' style='padding: 10px 0px 0px 135px;'>";
                                echo "</div>";
                                echo "<label for='box7' style='padding-left:50px; color:black;'>Pengiriman</label><br><br>";
                                echo "</a>";
                            }else {
                                if($row['idrole'] == "6" || $row['idrole'] == "2"){
                                    echo" <a href='pengiriman.php'>";
                                    echo "<div class='box7'>";
                                    echo " <p style='padding: 10px 10px; color: white; text-align: left;'>Pengiriman</p>";
                                    echo "<img src='image/icon (6).png' alt='' style='padding: 10px 0px 0px 120px;'>";
                                    echo "</div>";
                                    echo "<label for='box7' style='padding-left:50px;'>Pengiriman</label><br><br>";
                                    echo "</a>";
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <a href="logout.php" class="a">
                <img src="image/logout.png" alt="" style="height:30px; padding-top:15px;"> 
                <h3>Logout</h3>
            </a>
        </div>
    </div> 
    <footer>
		<h5>© COPYRIGHT| DISDUKCAPIL 2022</h5>
	</footer>
</body>
</html>
