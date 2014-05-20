<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/ico" href="http://www.fadergs.edu.br/fadergs/img2/portal/favicon.ico">
    <title>Give me my grades!</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container main-container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <img src="logo.png" alt="" class="img-responsive center-block">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="login-area">
                <form class="form-horizontal login" id="formLogin" action="curl.php" method="post">
                    <div class="form-group">
                        <div class="controls">
                            <div class="input-group">
                                <input id="loginEmail" tabindex="1" autofocus="autofocus" placeholder="Usuário" class="form-control" name="user" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <div class="input-group">
                                <input id="loginSenha" tabindex="2" class="form-control" placeholder="Senha" name="senha" type="password">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <input class="btn btn-lg btn-danger col-xs-12" tabindex="3" name="btnSubmit" type="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>