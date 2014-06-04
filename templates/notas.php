<!doctype html>
<html lang="en">
    <head>
        <title>Give my grades!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" type="image/ico" href="assets/images/favicon.ico">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

        <header id="header" class="navbar">
            <div class="container-fluid">
                <div class="row">
                    <div id="logo" class="col-xs-12 col-sm-12">
                        <button type="button" id="toggle-menu" class="pull-left visible-xs"><i class="glyphicon glyphicon-th-list"></i></button>
                        <img src="assets/images/logo-interno.png" alt="" class="pull-left">
                    </div>
                    <div class="col-xs-12 col-sm-12">
                    </div>
                </div>
            </div>
            </header><!-- /header -->
            <div id="main" class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-sm-2" id="sidebar-left">
                        <ul class="nav main-menu">
                            <li><a href="notas" class="active">
                                <i class="glyphicon glyphicon-home"></i> Início
                            </a></li>
                            <li class="hidden-xs">
                                <a href="segunda-via">
                                    <i class="glyphicon glyphicon-list-alt"></i> Boleto
                                </a>
                            </li>
                            <li>
                                <a href="trocar-senha">
                                    <i class="glyphicon glyphicon-lock"></i> Trocar Senha
                                </a>
                            </li>
                            <li>
                                <a href="sobre">
                                    <i class="glyphicon glyphicon-info-sign"></i> Sobre
                                </a>
                            </li>
                            <li>
                                <a href="logout">
                                    <i class="glyphicon glyphicon-off"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-10" id="content">
                        <div class="row">
                            <div id="breadcrumb" class="col-xs-12">
                                Início / Notas do Semestre atual
                            </div>
                        </div>

                            <div class="panel">
                                <?php echo $res; ?>

                            </div>

                    </div>

                </div>

        <script src="assets/js/zepto.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="assets/js/main.js" type="text/javascript" charset="utf-8" async defer></script>
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