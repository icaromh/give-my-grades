<?php
require '../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

/**
 * NOTA MENTAL : Melhorar conhecimentos de regex
 */

$app = new \Slim\Slim();

$app->config(array(
    'debug' => true,
    'templates.path' => 'templates'
));


/******************************************************************
 *
 * ROTAS
 * 
 *****************************************************************/
$app->get('/', function() use ($app) {
    $app->render('login.php');
});

$app->get('/notas', function() use($app){
   $app->render('login.php'); 
});

$app->post('/notas', function() use($app){   
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

        $store = curl_exec ($ch);
        
        if(strpos($store, 'Login e/ou Senha') !== false){
            $app->render('login.php', array('err' => 'Login e/ou Senha incorretos') );
            $app->stop();
        }
        else if(curl_errno($ch)){
            $error = curl_error($ch);
            $res   = "<h1>Desculpe, houve um erro na requisição :'(</h1> <pre>{$error}</pre>";
        }
        else{
            # Define uma nova URL para ser chamada (após o login)
            curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/academico/consultaNotas.php');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'sequencePage=historico&peri_id=2014110&peri_descricao=2014-1+N');

            # Executa a segunda requisição
            $content = curl_exec ($ch);
            if(curl_errno($ch)){
                $error = curl_error($ch);
                $res   = "<h1>Desculpe, houve um erro na requisição :'(</h1> <pre>{$error}</pre>";
            }else{
                $res = utf8_encode($content);

                # Separa apenas a tabela de dados
                $res = explode('<table class="tabela_relatorio">', $res);
                $res = explode('</table>', $res[1]);
                $res = reset($res);

                // separa as linhas
                $res = explode('<tr>', $res);
                unset($res[0]);
                unset($res[1]);
                $print = print_r($res, true);
                $res = implode('<tr>', $res);
                $res = "<table class=\"table-responsive\">" . $res . "</table>";
            }
        }
        curl_close ($ch);
    }
    $app->render('notas.php', array('res' => $res));
});

$app->get('/sobre', function() use($app){
    $app->render('info.html');
});

$app->get('/info.html', function() use($app){
    $app->redirect('sobre', 301);
});

$app->run();