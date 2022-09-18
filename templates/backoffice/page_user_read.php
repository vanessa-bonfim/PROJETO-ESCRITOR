<?php
/**
 * Fará a ligação na base de dado 
 * para aparecer a lista de usuários.
 * */
$query = 'SELECT * FROM users';
$sql = $pdo->prepare($query);

if ($sql->execute()) {
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    $users = [];
}

?>

<div class="page">
    <h1>Lista de Utilizador</h1>
    <div class="horizontal-line"></div>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Criado</th>
            <th>Atualizado</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['login'] ?></td>
            <td><?php echo $user['created_at'] ?></td>
            <td><?php echo $user['updated_at'] ?></td>
            <td><a href="<?php echo url_generate(['route' => 'user_update', 'id' => $user['id']]); ?>">Editar</a>|
            <a href="<?php echo url_generate(['route' => 'user_delete', 'id' => $user['id']]); ?>">Apagar</a></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>