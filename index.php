<?php
session_start();
require '../Slim/Slim.php';
require 'protected/Portal.php';
\Slim\Slim::registerAutoloader();


/**
 * NOTA MENTAL : Melhorar conhecimentos de regex
 */

$app    = new \Slim\Slim();

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

$app->get('/segunda-via', function() use($app){
        $Portal = new Portal();

        $user = 'alu1210887';
        $passwd = 'picaro123';

        $ch = $Portal->initCurl();
        
        if(!$Portal->isLogged())
            $Portal->login($ch, $user, $passwd);
       
        # Define uma nova URL para ser chamada (após o login)
        curl_setopt($ch, CURLOPT_POST, 0); # define método POST
        curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/financeiro/segundaViaDoc.php');
        $res    = curl_exec($ch);
        $docsId = $Portal->pegaIdDocs($res);
        $docId  = reset($docsId);

        // curl_setopt($ch, CURLOPT_POST, 1); # define método POST
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 'sequencePage=exibirSegundaVia&doc_id=' . $docId );
        // $res = curl_exec ($ch);

        // header('Cache-Control: public'); 
        // header('Content-type: application/pdf');
        // header('Content-Disposition: attachment; filename="DOC_FADERGS_.pdf"');
        // header('Content-Length: '.strlen($res)); 

        $res = '<pre>' . print_r($docsId, true) . '</pre>';
        $app->render('notas.php', array('res' => $res));
        // echo '<textarea name="" style="width:100%; height: 100%">'.$res.'</textarea>';
});

$app->post('/login', function() use($app){
     if(isset($_POST['user']) && isset($_POST['senha'])){
        $Portal = new Portal();
        $user   = $_POST['user'];
        $passwd = $_POST['senha'];

        $error = false;

        $ch    = $Portal->initCurl();
        $store = $Portal->login($ch, $user, $passwd);
        if($store == false){
            $app->render('login.php', array('err' => 'Login e/ou Senha incorretos') );
            $app->stop();
        }else{
            $app->redirect('notas');
        }
    }
});

$app->get('/notas', function() use($app){   
    $Portal = new Portal();
    $ch     = $Portal->initCurl();

    $periodo = '2014110';
    
    curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/academico/consultaNotas.php');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'sequencePage=historico&peri_id=' . $periodo . '&peri_descricao=2014-1+N');

    $content = $Portal->execCurl($ch);
    $res     = utf8_encode($content);

    # Separa apenas a tabela de dados
    preg_match("/<table class=\"tabela_relatorio\">(.*?)<\/table>/is",$res,$out);
    
    # separa as linhas
    $res = explode('<tr>', $out[1]);
    unset($res[0]);
    unset($res[1]);
    $res   = implode('<tr>', $res);
    $res   = "<table class=\"table-responsive\">" . $res . "</table>";

    curl_close ($ch);
    $app->render('notas.php', array('res' => $res));
});

$app->get('/sobre', function() use($app){
    $app->render('sobre.php');
});

$app->get('/info.html', function() use($app){
    $app->redirect('sobre', 301);
});

$app->get('/logout', function() use($app){
    session_start();
    session_destroy();
    $app->redirect('index.php');
});

$app->run();