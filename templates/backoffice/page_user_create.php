<?php

if (!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password'])) {

    $query = 'INSERT INTO users (name, login, password) VALUES (?, ?, ?)';

    $sql = $pdo->prepare($query);

    if ($sql->execute( [ $_POST['name'] , $_POST['login'] , $_POST['password']])) {
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
            <button>Login</button>
        </div>
    </form>
</div>