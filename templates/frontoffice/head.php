<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PAGE_TITLE; ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
<header> <!-- Todo o menu de navegação está aqui dentro -->
        <div class="page"> 
            <nav class="menu flex flex-justify-space-between">
                
                <!-- Os HREFs já estão com as rotas configuradas ?route=..., e no ficheiro index.php há uma condição que retorna o login, caso route esteja vazio. -->
                <ul>
                    
                    <li><a href="<?php echo url_generate(['route' => 'home']); ?>">Home</a></li> 
                    <li><a href="<?php echo url_generate(['route' => 'product']); ?>">Produtos</a></li>
                    <li><a href="<?php echo url_generate(['route' => 'about']); ?>">Sobre Nós</a></li> 
                    <li><a href="<?php echo url_generate(['route' => 'contact']); ?>">Contacto</a></li> 
                    
                </ul>
            
            </nav>
        </div>
</header>