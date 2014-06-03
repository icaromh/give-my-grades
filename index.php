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


$app->get('/esqueci-minha-senha', function() use ($app) {
    $app->render('esqueci-senha.php');
});

$app->post('/nova-senha', function() use ($app) {
    $user = trim($_POST['user']);
    $email = trim($_POST['email']);

    if(!empty($user) && !empty($email)){
        $Portal = new Portal();
        $res = $Portal->lembrarSenha($user, $email);
        
        # e-mail não confere
        if($res == false){
            $app->flash('error', 'Verifique os dados informados.');    
            $app->flash('user',  $user);   
            $app->flash('email', $email);            
        }else{
            $app->flash('success', 'Sua senha foi enviada para o email informado.');
        }
        $app->redirect('esqueci-minha-senha');
    }else{
        $app->flash('error', 'Por favor, preencha usuário e email.');
        $app->redirect('esqueci-minha-senha');
    }
});

$app->get('/segunda-via', function() use($app){
    $Portal = new Portal();
    $ch     = $Portal->initCurl();

    if(!$Portal->isLogged()){
        $app->redirect("index.php");
    }
   
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/financeiro/segundaViaDoc.php');
    $res    = $Portal->execCurl($ch);
    $docsId = $Portal->pegaIdDocs($res);

    if(sizeof($docsId) > 1){
       $app->render('notas.php', array('res' => 'Ha mais de um boleto a ser impresso! :('));
       $app->stop();
    }else{
        $docId  = reset($docsId);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'sequencePage=exibirSegundaVia&doc_id=' . $docId );
        $res = $Portal->execCurl($ch);

        $semestre = date("m") > 6 ? 2 : 1;

        header('Cache-Control: public'); 
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="DOC_FADERGS_'.date('Y').$semestre.'.pdf"');
        header('Content-Length: '.strlen($res)); 
        echo $res;
    }
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
    session_destroy();
    $app->redirect('index.php');
});

$app->run();