<!doctype html>
<html lang="en">
<head>
    <head>
        <title>Give my grades!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" type="image/ico" href="assets/images/favicon.ico">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
</head>
<body>
    <a href="https://github.com/icaromh2/give-my-grades"  target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0; z-index:1" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
    <div class="container main-container">
        <div class="row">
            <div class="col-md-12">
                <br>
                    <img src="assets/images/logo.png" alt="" class="img-responsive center-block">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="login-area">
                <?php if(isset($err)): ?>
                    <p class="alert alert-danger">
                        <?php echo $err ?>
                    </p>
                <?php endif; ?>
                <form class="form-horizontal login" id="formLogin" action="login" method="post">
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
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50597564-2', 'icaromh.com');
  ga('send', 'pageview');

</script>
</body>
</html>
