<?php

        if(isset($_POST['user']) && isset($_POST['senha'])){
            $user   = $_POST['user'];
            $passwd = $_POST['senha'];

            $error = false;

            // Inicia o cURL
            $ch = curl_init();

            // Define a URL original (do formulário de login)
            curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/administracao/login.php');
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "login={$user}&senha={$passwd}&sequencePage=validaLogin&enderecoPrograma=/administracao/paginaInicial.php");
            curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
            curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
            curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2);


            // Executa a requisição
            $store = curl_exec ($ch);
            if(curl_errno($ch)){
                $error = curl_error($ch);
            }
            else{
                // Define uma nova URL para ser chamada (após o login)
                curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/academico/consultaNotas.php');
                // curl_setopt ($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'sequencePage=historico&peri_id=2014110&peri_descricao=2014-1+N');

                // Executa a segunda requisição
                $content = curl_exec ($ch);
                if(curl_errno($ch)){
                    $error = curl_error($ch);
                }else{
                    $res = utf8_encode($content);
                    $res = explode('<table class="tabela_relatorio">', $res);
                    $res = explode('</table>', $res[1]);
                    $res = reset($res);
                    $res = "<table class=\"table-responsive\">" . $res . "</table>";
                }
            }

            // Encerra o cURL
            curl_close ($ch);
        }
    ?>
<!doctype html>
<html lang="en">
<head>
    <title>Give me my grades!</title>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" CONTENT="60"> -->
    <link rel="Shortcut Icon" type="image/ico" href="http://www.fadergs.edu.br/fadergs/img2/portal/favicon.ico">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php echo $res ?>
</body>
</html>