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
    <link rel="stylesheet" href="css/pengiriman3.css">
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
            <h2 style="text-align:center;">Pengiriman E-KTP</h2>
            <center>
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <table border="1" cellpadding="10">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Button</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include "config.php";
                                $sql = "SELECT * FROM tbdatadiri INNER JOIN tbstatus ON tbdatadiri.username = tbstatus.username AND statusverif='terverifikasi' AND statusrekam='data sudah terekam' AND statuspengiriman='Paket E-KTP telah diambil kurir'";
                                $result = $conn->query($sql);
                                $user = $_SESSION['username'];

                                if($result->num_rows) {
                                    while($row = $result->fetch_assoc()){
                                        echo '<tr>';
                                        echo '<form method="POST"';
                                        echo '<br><td>'.$row['username'].'</td>';
                                        echo '<td>'.$row['alamat'].', RT/RW '.$row['rtrw'].', KEL. '.$row['keldesa'].', KEC. '.$row['kecamatan'].'</td> ';
                                        echo '<br><td>'.$row['statuspengiriman'].'</td>';
                                        echo '<td><button type="submit" name="BtnSubmit" value="'.$row["username"].'">Selesai</button></td>';
                                        echo '</form';
                                        echo '</tr>';
                                        if(isset($_POST['BtnSubmit'])){
                                            try {
                                                $user2 = $_POST['BtnSubmit'];
                                                $sql = mysqli_query($conn, "UPDATE tbstatus SET statuspengiriman = 'Paket telah selesai diantar' WHERE username = '$user2'");
                                                $sql2 = mysqli_query($conn, "INSERT INTO tbstatus (username, statuspengiriman) VALUES ('$user2', 'Paket telah selesai diantar') ON DUPLICATE KEY UPDATE username = '$user2'");

                                                header('Location: pengiriman.php');
                                                echo "<script>alert('Paket E-KTP Sudah Sampai')</script";
                                            } catch(mysqli_sql_exception $e){
                                                if ($e->getCode() == 1062) {
                                                    echo "Only Once";
                                                } 
                                            }

                                        }

                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </center>
        </div> 
    </div>

    <footer>
        <h5>© COPYRIGHT| DISDUKCAPIL 2022</h5>
	</footer>
</body>
</html>