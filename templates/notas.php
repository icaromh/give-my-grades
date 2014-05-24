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
            <a href="https://github.com/icaromh2/give-my-grades" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0; z-index:1" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
            
            <div class="container-fluid">
                <div class="row">
                    <div id="logo" class="col-xs-12 col-sm-12">
                        <button type="button" id="toggle-menu" class="btn btn-default btn-sm pull-left visible-xs" style="margin-top: 10px; margin-right: 10px;"><i class="glyphicon glyphicon-th-list"></i></button>
                        <img src="assets/images/logo-interno.png" alt="" class="pull-left">
                    </div>
                    <div class="col-xs-12 col-sm-12">
                    </div>
                </div>
            </div>
            </header><!-- /header -->
            <div id="main" class="container-fluid">
                <div class="row">
                    <div class="col-xs-5 col-sm-2" id="sidebar-left">
                        <ul class="nav main-menu">
                            <li><a href="index.php" class="active">
                                <i class="glyphicon glyphicon-home"></i> Início
                            </a></li>
                           <!--  <li><a href="info.html">
                                <i class="glyphicon glyphicon-list-alt"></i> <span class="hidden-xs">Notas</span>
                            </a></li>
                            <li><a href="info.html">
                                <i class="glyphicon glyphicon-list-alt"></i> Salas
                            </a></li>
                            <li><a href="info.html">
                                <i class="glyphicon glyphicon-usd"></i> Boleto
                            </a></li>
                            <li><a href="info.html">
                                <i class="glyphicon glyphicon-folder-close"></i> Histórico
                            </a></li>
                            <li><a href="info.html">
                                <i class="glyphicon glyphicon-dashboard"></i> Horas Complementares
                            </a></li>
                            <li><a href="info.html">
                                <i class="glyphicon glyphicon-off"></i> Sair
                            </a></li> -->
                            <li><a href="sobre">
                                <i class="glyphicon glyphicon-info-sign"></i> Sobre
                            </a></li>
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