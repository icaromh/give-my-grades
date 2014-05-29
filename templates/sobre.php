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
            <a href="https://github.com/icaromh2/give-my-grades"  target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0; z-index:1" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>

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
                            <li><a href="notas" class="">
                                <i class="glyphicon glyphicon-home"></i> Início
                            </a></li>
                            <li class="hidden-xs">
                                <a href="segunda-via">
                                    <i class="glyphicon glyphicon-list-alt"></i> Boleto
                                </a>
                            </li>
                            <!--<li><a href="info.html">
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
                            </a></li> -->
                            <!-- <li><a href="info.html">
                                <i class="glyphicon glyphicon-off"></i> Sair
                            </a></li> -->
                            <li>
                                <a href="javascript:void(0)" class="active">
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
                                Início / Informações
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="col-xs-12">
                                        <h3>Sobre o projeto</h3>
                                        <p>
                                            Esse site tem como fundamento facilitar o acesso a dados do Portal do Aluno da Faculdade de Desenvolvimento do Rio Grande do Sul (FADERGS), de forma que seja possível a navegação e visualização de dados a partir de dispositivos móveis.
                                        </p>
                                        <p>
                                            Esse site não possui qualquer vínculo com a Instituição de ensino, foi desenvolvido para aprofundar conhecimentos do <a href="https://www.facebook.com/icaromh">desenvolvedor</a> e não visa qualquer tipo de lucro. Seu código está disponível no <a href="https://github.com/icaromh2/give-my-grades">Github</a> para qualquer pessoa que queria melhorá-lo ou utilizá-lo.
                                        </p>
                                        <p class="alert alert-danger">
                                            O site <strong>NÃO</strong> guarda nenhum tipo de dados do usuário. <strong>NÃO são salvas senhas</strong> ou qual aluno está logado.
                                        </p>
                                        <p>
                                            Até o momento foi desenvolvido apenas a busca por notas do semestre atual, mas está em desenvolvimento para que sejam buscados novos dados.

                                            <br>
                                            São eles:
                                            <ul>
                                                <li> Salas em que o aluno tem aula</li>
                                                <li><i class="glyphicon glyphicon-thumbs-up"></i>  <s>Download do Boleto atual e atrasado</s></li>
                                                <li> Histórico do aluno</li>
                                                <li> Relatório de horas complementares</li>
                                                <li> Desenvolver busca de dados utilizando multi threads</li>
                                            </ul>
                                        </p>

                                        <p>
                                            Inspiração de cores: <a href="https://kuler.adobe.com/sophia-color-theme-3903803/">https://kuler.adobe.com/sophia-color-theme-3903803/</a>
                                        </p>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                            <div class="col-sm-4">
                                <strong>Campus Centro</strong>
                                <p>
                                    Rua Riachuelo, 1257 <br>
                                    Porto Alegre - RS , 90.010-273
                                </p>

                               <p>
                                    Rua General Vitorino, 25 <br>
                                    Porto Alegre - RS , 90.020-171
                               </p>

                                <p>
                                    Rua Uruguai, 330 <br>
                                    Porto Alegre - RS , 90.010-140
                                </p>
                            </div>

                            <div class="col-sm-4">
                                <strong>Campus da Saúde</strong>
                                <p>
                                    Rua Luiz Afonso, 84 <br>
                                    Porto Alegre - RS , 90.050-310
                                </p>
                            </div>

                            <div class="col-sm-4">
                                <strong>Campus Zona Norte</strong>
                                <p>
                                    Av. Sertório, 5310
                                    Porto Alegre - RS , 91.050-370
                                </p>
                            </div>
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