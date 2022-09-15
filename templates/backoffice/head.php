 <!-- Foi criado o inicio e o corpo do documento HTML  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo PAGE_TITLE ?> </title> <!-- Echo retorna o titulo da página que está no ficheiro CONFIG.PHP -->
    <link rel="stylesheet" href="public/css/backstyle.css"> <!-- Importa o css -->
</head>
<body>

    <header> <!-- Todo o menu de navegação está aqui dentro -->
        <div class="page"> 
            <nav class="menu flex flex-justify-space-between">
                
                <!-- Os HREFs já estão com as rotas configuradas ?route=..., e no ficheiro index.php há uma condição que retorna o login, caso route esteja vazio. -->
                <ul class="height">
                    <?php if (is_authenticated()) :?>
                
                        <li class="re-position">
                            <a href="">Opções</a> 
                                
                            <ul class="ab-position ">
                                <li ><a href="<?php echo url_generate(['route' => 'user_create']); ?>">Criar Utilizador</a></li> 
                                <li ><a href="<?php echo url_generate(['route' => 'user_update']); ?>">Atualizar Utilizador</a></li>
                                <li ><a href="<?php echo url_generate(['route' => 'user_read']); ?>">Utilizadores</a></li> <!-- Esta route retorna a nossa lista de usuários -->
                                <li ><a href="<?php echo url_generate(['route' => 'user_delete']); ?>">Deletar Utilizador</a></li>
                            </ul>
                        </li>
                                
                                              
                    <?php endif; ?>
                </ul>
                <ul class="d-flex">
                    <?php if (is_authenticated()) :?> <!-- Esta condição irá mostra a "li" se a função for true. Ficheiro auth.php-->
                       
                        <li><a href="<?php echo url_generate(['route' => 'dashboard']); ?>">Dashboard</a></li> <!--  Ao clicar, redireciona para o que está na href -->
                    
                    <?php endif; ?>
                    
                    <li> <!-- Neste caso este "li" sempre será visivel com algum dos "a" dependendo da condição-->
                        <?php if (is_authenticated()) :?> <!-- Esta condição irá mostra "a" se a função for true. Ficheiro auth.php-->
                            
                            <a class="user-login-button" href="<?php echo url_generate(['route' => 'authenticate']); ?>">LOGOUT</a>
                        <?php else :?> <!-- senão será mostrado este "a" -->

                            <a class="user-login-button" href="<?php echo url_generate(['route' => 'login']); ?>">LOGIN</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
 
    <!-- Esta condição irá mostrar uma mensagem para cada ação que precise ser autenticada, seja a ação permitida ou não. -->

    <?php if (get_flash_message()) : ?> <!-- Se retornar uma string/mensagem, ou seja VERDADEIRO, então mostramos o conteúdo retornado da função. Esta função está o ficheiro message.php e funciona em conjunto com a função set_flash_message -->
        <div class="page">
             <div class="flash-messages">
                <p> <?php echo get_flash_message(); ?> </p> <!-- echo retorna a mensagem guardada nesta função -->
             </div>
        </div>
    <?php endif; ?>
