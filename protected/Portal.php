<?php
/**
* Classe para manipulação do portal
*/
class Portal
{
    
    function __construct()
    {
        /* Nada a fazer, por enquanto */
    }

    /**
     * Inicializa o cURL handler
     * @return cURL handler
     */
    public function initCurl()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, false); 
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_POST, true); # define método POST
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); # Define que nao será verificado o host
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); # define que a curl deve receber um retorno
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt'); #guarda a sessão
        curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2);
        if($this->isLogged()) $this->setSessionCurl($ch);
        return $ch;
    }

    public function execCurl(&$ch)
    {
        try {
            $content = curl_exec ($ch);
            if(curl_errno($ch)){
                throw new Exception("Erro ao processar cURL", 1);
            }
            return $content;
        } catch (Exception $e) {
            $error = curl_error($ch);
            die("<h1>Desculpe, houve um erro na requisição :'(</h1> <pre>{$error}</pre>");
        }
    }

    /**
     * Recebe o cURL aberto e referência ele, utiliza o login e senha do usuário e loga no portal
     * Retorna a execução da curl
     * @param  curl   $ch     cURL
     * @param  string $user   Usuário
     * @param  string $passwd Senha
     * @return html         Retorno da Curl de login ou FALSE se o login falhar
     */
    public function login(&$ch, $user = '', $passwd = ''){

        $fields = array(
            'login'            => $user,
            'senha'            => $passwd,
            'sequencePage'     => 'validaLogin',
            'enderecoPrograma' => '/administracao/paginaInicial.php'
        );
        
        curl_setopt($ch, CURLOPT_URL, 'https://academicos.fadergs.edu.br/administracao/login.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        
        $result = $this->execCurl($ch);
        $this->getSessionCurl($result);
        
        return $this->verifyLogin($result) ? $result : false;
    }

    public function verifyLogin($html){
        if(strpos($html, 'Login e/ou Senha') !== false){
            $_SESSION['loggedIn'] = false;
            return false;
        } else{
            $_SESSION['loggedIn'] = true;
            return true; 
        }
    }

    /**
     * Procura o PHPSESSID dentro do retorno da Curl e seta na sessão
     * @param  String $html TEXT/HTML
     */
    private function getSessionCurl($html){
        preg_match_all("/.*PHPSESSID=([^;]*);.*/", $html, $matches); 
        $result = end($matches[0]);
        preg_match("/PHPSESSID=(.*?)(?:;|\r\n)/", $result, $cookie);

        // Seta na sessão o PHPSESSID 
        $_SESSION['PHPSESSID'] = reset($cookie);
    }

    /**
     * Seta na Curl o PHPSESSID se tiver em sessão
     * @param curl handler $ch cUrl
     */
    public function setSessionCurl(&$ch){
        if(isset($_SESSION['PHPSESSID']))
            curl_setopt($ch, CURLOPT_COOKIE, $_SESSION['PHPSESSID']);
    }

    /**
     * Procura no 
     * @param  [type] $html [description]
     * @return [type]       [description]
     */
    public function pegaIdDocs($html){
        // preg_match_all("/<input type=\"image(.*?)\/>/is",$html,$matched); # Pega o botão de submit da tabela
        preg_match_all("/doc.setAttribute\(\'value\',\'([0-9]{1,})/",$html,$matched);
        return $matched[1];
    }

    /**
     * [isLogged description]
     * @return boolean [description]
     */
    public function isLogged(){
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
            return true;
        else 
            return false;
    }

    /**
     * Ref: 
     *     http://board.phpbuilder.com/showthread.php?10346748-RESOLVED-Curl-with-sessions
     *     http://stackoverflow.com/a/18151707
     *     http://stackoverflow.com/a/9905125
     */

}