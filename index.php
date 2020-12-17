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
                <input type="text" name="email" placeholder="email">
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
                    <button id="signup">submit</button>
                </fieldset>
            </div>
        </form>
    </div>
    <button id='modalopen'>Sign Up</button>
    <!-- <input type="password" name="creatpass" id='creatpass' placeholder="password"> -->
    <script>
        $('#modalopen').on('click', function() {
            $('#modal').fadeIn(200);
        });
        $('#signup').on('click', function() {
            if ($('#createmail').val() != '' && $('#creatpass').val() != '') {
                alert('アカウント作成');
            } else {
                alert('値を入力してください');
            };
        });
    </script>
</body>

</html>