<?php
/**
 * Server request method foi utilizado pq ao utilizar somente os emptys, entra em um loop.
 * */
 if($_SERVER['REQUEST_METHOD'] == 'POST' && 
        (empty($_POST['name']) || 
        empty($_POST['login']) || 
        empty($_POST['password']) || 
        empty($_POST['picture']) )){

            set_flash_message('Preencha todos os campos!');
            url_redirect(['route' => 'user_create']);

    }

if (!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['picture']) ){

    $query = 'INSERT INTO users (name, login, password, picture) VALUES (?, ?, ?, ?)';

    $sql = $pdo->prepare($query);

    if ($sql->execute([ $_POST['name'], $_POST['login'], $_POST['password'], $_POST['picture'] ])) {
        $message = "Registo criado com sucesso";
    } else{
        $message = "Não foi possível criar o registo, tente novamente";
    }

    set_flash_message($message);
    url_redirect(['route' => 'user_create']);
}

?>
 
<div class="page">
    <form class="form" method="POST" action="<?php echo url_generate(['route' => 'user_create']); ?>">
        <h1>Criar utilizadores</h1>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="name">Login</label>
            <input type="text" name="login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="form-group">
            <label for="picture">Imagen Perfil</label>
            <input type="text" name="picture">
        </div>
        <div class="form-group">
            <button>Guardar</button>
        </div>
    </form>
</div>