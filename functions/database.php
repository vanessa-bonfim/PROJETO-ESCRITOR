<?php

function db_query($pdo, $query, $data = []) {


  $sql = $pdo->prepare($query); //A variável slq recebe a preparação da da variável query/comando SQL. Prepara uma instrução para execução e retorna um objeto de instrução.
    
if ($sql->execute($data)) { //Vai no sql, pega o que foi preparado 

        return $sql->fetchAll(PDO::FETCH_ASSOC); // Obter as informações como array associativo ['name'->'Maria Freitas']

    } else {
        
        return [];
}

}