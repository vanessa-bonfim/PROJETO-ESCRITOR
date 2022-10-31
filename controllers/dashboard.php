<?php
/* 
* Esta condição irá verificar o retorna da função is_authenticate() (Esta função está em auth.php)
*
* */

if (!is_authenticated()) { //Se DIFERENTE(!) de VERDADEIRO,(Se eu não estiver autenticado) então executamos o código que está entre chaves.

    set_flash_message('Acesso negado: Faça login para ter acesso a esta página'); //Mostra esta mensagem por 1 sec.

    url_redirect(['route' => 'login']); // Direciona para a página de login.
}
