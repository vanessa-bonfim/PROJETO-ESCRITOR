<?php
if (empty($_GET['id']) || !(int)($_GET['id'])) {
    
    set_flash_message('Identificação inválida, tente novamente');    
    url_redirect(['route' => 'user_read']);
}

if (!empty($_GET['id']) && (int)($_GET['id'])) { //Se não usar esse if, vai funcionar da mesma maneira.

    $query = 'DELETE FROM users WHERE id = ?';

    $sql = $pdo->prepare($query);

    if ($sql->execute([$_GET['id']])) {
        $message = "Registo apagado com sucesso";
    } else{
        $message = "Não foi possível apagar o registro, tente novamente";
    }

    set_flash_message($message);
    url_redirect(['route' => 'user_read']);
}

/**
 * $query = 'DELETE FROM users WHERE id = ?';
 * $sql = $pdo->prepare($query);
 * if ($sql->execute([$_GET['id']])) {
 *      $message = "Registo apagado com sucesso";
 * } else{
 *      $message = "Não foi possível apagar o registro, tente novamente";
 * }
 * set_flash_message($message);
 * url_redirect(['route' => 'user_read']);
 */

?>