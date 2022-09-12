<?php

/**
 * 
 * Esta função exibe uma mensagem temporária, ou seja, se eu pedir 
 * para exibir uma mensagem temporária e página for refrescada logo em seguida,
 * então esta mensagem vai desaparecer.
 * 
 **/

function set_flash_message($message = '') {

    $_SESSION['flash_message'] = $message; //"truque" é Gravar a nossa mensagem dentro de uma chave na super global $_SESSION

    $timestampNowPlus1Sec = strtotime('now + 1 sec'); //A função "strtotime" retorna um conjunto de números que chamamos de "TIMESTAMP", a mensagem só ficará presente por 1 segundos.

    $_SESSION['flash_message_timestamp'] = $timestampNowPlus1Sec; //Gravar o nosso tempo dentro de uma chave na super global $_SESSION

}

/**
 * 
 * Esta função exibe uma mensagem mantida 1 segundo em uma sesssão no servidor, a função 'set_flash_message' deverá ser
 * chamada antes.
 * 
 */

function get_flash_message() {



    if (empty($_SESSION['flash_message'])) {  // A condição testa se existe algum valor na chave 'flash_message' da super global $_SESSION. Se não existir valores, retorna null (retorna vazio).
        return null;
    }

    $flashMessage = $_SESSION['flash_message']; // Atribuir o valor da chave 'flash_message' que está na super global $_SESSION para dentro da variável $flashMessage.

    $timestampNow = strtotime('now'); // Atribuir o conjunto de números que representa o TIMESTAMP deste exacto momento dentro da variável $timestampNow.

    $timestampFlashMessage = $_SESSION['flash_message_timestamp']; // Atribuir o valor da chave 'flash_message_timestamp' que está na super global $_SESSION para dentro da variável $timestampFlashMessage.

    
    if ($timestampNow > $timestampFlashMessage) { // Se o TIMESTAMP que representa a hora atual for superior ao TIMESTAMP que representa o tempo que a mensagem ficará mantida em sessão

        unset($_SESSION['flash_message']); //A função "unset" remove a chave de dentro da super global $_SESSION. Removemos a chave 'flash_message' de dentro da super global $_SESSION. https://www.php.net/manual/en/function.isset.php

        unset($_SESSION['flash_message_timestamp']); //Removemos a chave 'flash_message_timestamp' de dentro da super global $_SESSION. 
        return null; 

    } else { //Caso não entre na condição acima, entra no se não.

        return $flashMessage; //então retornamos a mensagem que foi gravada em sessão no servidor durante 1 segundo.

    }



}