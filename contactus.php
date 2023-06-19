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
    <link rel="stylesheet" href="css/contact.css">
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
            <h2 style="text-align: center;">Contact Us</h2>
                <h4 class="sent-notification"></h4>
                <div class="form-contact">
                    <form id="myForm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-grup">
                                    <label>Username</label>
                                    <input id="name" type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        
                        <label>Email</label>
                        <input id="email" type="text" placeholder="Email Anda">
                        <br>

                        <label>Subject</label>
                        <input id="subject" type="text" placeholder="Subject Email"> <br>

                        <label>Pesan</label>
                        <textarea id="body" rows="7" placeholder="Tulis Pesan Anda"></textarea>
                        <br>

                        <button type="button" onclick="sendEmail()" value="Send An Email">Submit</button> 
                    </form> 
                </div>
        </div>
    </div> 

    <footer>
			<h5>© COPYRIGHT| DISDUKCAPIL 2022</h5>
	</footer>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        email: email.val(),
                        subject: subject.val(),
                        body: body.val()
                    }, success: function (response) {
                            $('#myForm')[0].reset();
                            $('.sent-notification').text("Message Sent Successfully.");
                    }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
</body>
</html>