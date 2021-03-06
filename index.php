<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/signin.css">
    <title>SignIn-form</title>
</head>

<body>
    <h1>SignIn-form</h1>
    <form action="signin_read.php" method="POST">
        <div class="signin">
            <fieldset class="signin-content">
                <input type="text" name="email" placeholder="email" id="email">
                <p class="alert" id="sigin-alert">メールアドレスの形式が正しくありません</p>
                <input type="password" name="pass" placeholder="password">
                <button>Sign In</button>
            </fieldset>
        </div>
    </form>
    <div id="modal">
        <form class="sign-up" action="signup_data.php" method="POST">
            <div class="signup">
                <fieldset class="signup-content" id="fadeout-content">
                    <input type="text" name="createmail" id='createmail' placeholder="email">
                    <p class="alert" id="sigup-alert">メールアドレスの形式が正しくありません</p>
                    <button id="signup">submit</button>
                </fieldset>
            </div>
        </form>
    </div>
    <button id='modalopen'>Sign Up</button>
    <script>
        $('#modalopen').on('click', function() {
            $('#modal').fadeIn(200);
        });
        const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
        $('#email').keydown(function() {
            const address = $('#email').val();
            if (reg.test(address)) {
                $('#sigin-alert').text('OK');
                $('#sigin-alert').fadeIn(100);
            } else {
                $('#sigin-alert').fadeIn(100);
            }
        });
        $('#createmail').keydown(function() {
            const address = $('#createmail').val();
            if (reg.test(address)) {
                $('#sigup-alert').text('OK');
                $('#sigup-alert').fadeIn(100);
            } else {
                $('#sigup-alert').fadeIn(100);
            }
        });
    </script>
</body>

</html>