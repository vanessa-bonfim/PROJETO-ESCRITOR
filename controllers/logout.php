<?php

session_destroy(); //Super global será resetada, removendo tudo.

url_redirect(['route' => 'login']); //Redireciona para a página de login.