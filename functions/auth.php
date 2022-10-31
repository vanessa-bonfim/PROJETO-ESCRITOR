<?php

/**
 * 
 * Esta função diz se o utilizador
 * está ou não autenticado.
 * 
 * Caso a chave 'is_authenticated' esteja presente
 * na super global $_SESSION e tenha algum valor lá dentro, 
 * */

function is_authenticated()
{

    if (empty($_SESSION['is_authenticated'])) { //Se está session estiver vazia, entra na condição.
        return false;
    } else { // Se não, caso a chave 'is_authenticated' esteja presente na super global $_SESSION e tenha algum valor lá dentro. 
        return true;
    }
}

/*  function is_notautorized() {
    return !is_authenticated() &&
    $_GET['area'] == 'admin' &&
    $_GET['route'] != 'login';
 } */