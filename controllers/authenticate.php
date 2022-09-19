<?php
/* 
* Esta condição verifica se as super globais estão vazias,
* caso estejam, manda a mensagem que foi passada no parametro da função set_flash_message()
*/

if (empty($_POST['username']) || empty($_POST['password'])) { // função empty para verificar se está vazio.

    //A função set_flash_message() (função criada em message.php) dispara uma mensagem com a indicação abaixo por 1 sec. (Some ao fazer refresh a página)
    set_flash_message('Todos os campos são de preenchimento obrigatório!');

    //A função url_redirect() (função criada em url.php) redireciona para a página de login.
    url_redirect(['route' => 'login']);

}

/* 
* Guadaremos os valores recebidos nos metodos post dentro das variáveis.
*
*/

$login = $_POST['username']; 
$password = $_POST['password'];

/***
 *  prepare() utiliza prepared statements uma vez feita a consulta,
 *  ela é otimizada pelo banco e pode ser executada várias vezes. 
 *  O que muda são os argumentos, seu uso evita problema com sql injection desde que usado corretamente.
*/
//$query = 'SELECT name FROM users'; //A variável query recebe nosso código de consulta SQL. Para ter mais uma camada de segurança ao consultar, usandos "?"(bind) que ajuda a não acontecer um SQL injection que é uma vulnerabilidade de segurança na web que permite ataques.
$user = db_query($pdo, 'SELECT name FROM users WHERE login = ? and password = ?', [$login, $password]);

/* $sql = $pdo->prepare($query); //A variável slq recebe a preparação da da variável query/comando SQL. Prepara uma instrução para execução e retorna um objeto de instrução.
  
if ($sql->execute([$login, $password])) { //Vai no sql, pega o que foi preparado 
        $user = $sql->fetch(PDO::FETCH_ASSOC); // Obter as informações como array associativo ['name'->'Maria Freitas']
    } else {
        $user = [];
} */

/* 
*
* Essa condição verifica se os valores guardados nas variáveis
* são iguais ('==') aos que estão definidas nas contantes de login e password.
* Na chamada das funções só é preciso colocar as informações que deseja, 
* pois ao criarmos as funções deixamos o parametro a receber vazio por padrão.
*/

if (!empty($user[0])) { // condição é se as variáveis são iguais as constantes(config.php)

    

    $_SESSION['is_authenticated'] = true; // Guarda nesta o boleano true como padrão.
    $_SESSION['user'] = $user; // Guarda a informação da variável.

    set_flash_message('Utilizador autenticado com sucesso!'); // Mostra essa mensagem por 1 sec. (função criada em message.php)

    url_redirect(['route' => 'home']); // Redireciona para página dashboard. (função criada em url.php)

} else {
    
    set_flash_message('Utilizador ou senha incorreta, tente novamente!');// Mostra essa mensagem por 1 sec. (função criada em message.php)

    url_redirect(['route' => 'login']); // Redireciona para página login. (função criada em url.php)
}


