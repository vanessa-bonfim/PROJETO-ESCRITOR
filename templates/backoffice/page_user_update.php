<?php

if (empty($_GET['id']) || !(int)($_GET['id'])) {
    
    set_flash_message('Identificação inválida, tente novamente');    
    url_redirect(['route' => 'user_read']);
}

if (
    !empty($_POST['name']) && 
    !empty($_POST['login']) && 
    !empty($_POST['password']) && 
    !empty($_POST['picture'])
    ){
    
    $query = 'UPDATE users SET name = ?, login = ?, password = ?, picture = ? WHERE id = ?';    
    $sql = $pdo->prepare($query);
    
    if ($sql->execute([
        $_POST['name'], 
        $_POST['login'], 
        $_POST['password'], 
        $_POST['picture'], 
        $_GET['id']
        ])) {

        $message = "Registo atualizado com sucesso";
    } else {
        $message = "Não foi atualizar o registo, tente novamente";
    }
            
    set_flash_message($message);    
    url_redirect(['route' => 'user_update']);
    
} else {
   
    $query = 'SELECT * FROM users WHERE id = ?';    
    $sql = $pdo->prepare($query);
   
    if ($sql->execute([$_GET['id']])) {
        $user = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $user = [];
    }
}

?>

<div class="page">
    <form class="form" method="POST" action="<?php echo url_generate(['route' => 'user_update']); ?>">
        <h1>Atualizar utilizador</h1>
        <div class="horizontal-line"></div>
        <div class="form-group flex flex-col">
            <label for="name">Nome</label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group flex flex-col">
            <label for="name">Nome</label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
            <label for="name">Login</label>
            <input type="text" name="login" value="<?php echo $user['login']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $user['password']; ?>">
        </div>
        <div class="form-group flex flex-col">
            <label for="picture">Imagem Perfil</label>            
            <input type="text" name="picture" value="<?php echo $user['picture']; ?>">
        </div>
        <div class="form-group">
            <button>Guardar</button>
        </div>
    </form>
</div>