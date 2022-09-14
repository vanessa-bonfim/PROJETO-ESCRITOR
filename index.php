<?php

/*
* Trabalhar com o conceito de sessões permite que um conjunto de dados possam ser utilizados
* por um usuário durante todo o tempo em que acessa e navega dentro de uma aplicação Web,
* sendo persistidos.
* Só dar um session_start() no começo do arquivo PHP e usar o variável global $_SESSION que a informação trafega
* de página em página dentro da minha aplicação, ela estarão lá a qualquer hora ou lugar,
* só sairá quando se fechar o navegador ou depois de um tempo sem mexer com o sistema.
*
*/
session_start(); //A função session_start() permite iniciar uma nova sessão ou resumir (continuar) uma sessão já existente.

require_once('config.php'); //importa as informações do ficheiro config.php

require_once('functions/url.php'); //importa as funções do ficheiro url.php
require_once('functions/message.php'); //importa as funções do ficheiro message.php
require_once('functions/auth.php'); //importa as funções do ficheiro auth.php
require_once('functions/database.php'); 


/*
 *  Esse código abaixo irá fazer a nossa logação ao banco de dados.
 *  Nota: quando uma instância é criada, estamos na verdade a criar um "objeto" daquele "molde".
 *  DSN - "Data Source Name" 
 *  POD - "PHP Data Object"
 */
$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT; // A variável dsn recebe o caminho da base de dados, concatenando as constantes.
$pdo = new PDO($dsn, DB_USER, DB_PASS); //Função nativa do PHP. A variável pdo recebe a declaração de uma instância da classe PDO(classe interna do PHP assim como empty) com o palavra reservada "new" com 3 argumentos.


/*
* Lembrando que a super global GET pega as informações da URL. 
* query string : ?nome=Maria (1 chave, 1 valor) ou ?nome=Maria&idade=46 (quando se há mais de 1 valor)
* 
*/
if(empty($_GET['route'])){ // Se a super global estiver vazia (chave router não existir).
    $page = 'home';
} else { //se não estiver vazia.
    $page = $_GET["route"];
}
/**
 * Verificamos se a o valor da chave 'area' NÃO está vazio E se o valor é igual a 'admin'.
 * 
 * Se verdadeiro, então vamos buscar o layout da pasta 'backoffice'
 * Se falso, então vamos buscar o layout da pasta 'frontoffice'
 */
if (!empty($_GET['area']) && $_GET['area'] == 'admin') {
    $layout_folder = 'backoffice';
} else {
    $layout_folder = 'frontoffice';
}


/*
* A condição SWITCH é parecida com a IF.
* Essa condição vai servir de controlador, medidas serão tomadas caso detectem 
* se tentar aceder uma página na qual não tenha acesso, seja por não está autenticado ou não ter preenchido 
*
*/
switch ($page) { // Muda ou troca a variavel page caso:

    case 'dashboard': //$page = 'dashboard'
        require_once('controllers/dashboard.php');
        break;
    
    case 'authenticate': //$page = 'authenticate'
        require_once('controllers/authenticate.php');
        break;

    case 'logout': //$page = 'logout'
        require_once('controllers/logout.php');
        break;

    default:        
        break;
}


/**
 * Constroi o caminho do ficheiro concatenando com o valor que vem 
 * da variável $layout_folder e $page.
 */
$page_template = 'templates/'.$layout_folder.'/page_' . $page . '.php';

/* Importa a parte HTML de cima do nosso template concatenando com o valor que vem  da variável $layout_folder */
require_once 'templates/'.$layout_folder.'/head.php';

/* Importa a parte HTML do meio do nosso template */
if (file_exists($page_template)) {
    require_once $page_template;
} else {
    /* importa a página de erro 404 not found concatenando com o valor que vem da variável $layout_folder */
    require_once 'templates/'.$layout_folder.'/page_not_found.php';
}

/* Importa a parte HTML de baixo do nosso template concatenando com o valor que vem da variável $layout_folder */
require_once 'templates/'.$layout_folder.'/foot.php';