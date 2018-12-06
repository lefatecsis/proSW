<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="style.css">

<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1>
            </div>

            <div class="login-form">
                <form action="indexValidation.php" method="post">


                    <div class="control-group">
                        <input type="text" class="login-field" name="user" placeholder="username" id="login-name">
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>

                    <div class="control-group">

                        <input type="password" class="login-field" name="password" placeholder="password" id="login-pass">
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                    </div>
                    <input class="btn btn-primary btn-large btn-block" type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>
</body>