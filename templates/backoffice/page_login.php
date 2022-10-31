<!-- Esta estrutura é para fazer a parte do login com input de usuário e senha com método POST -->
<div class="page">
    <!-- Estamos a usar GET para enviar o route e POST para enviar as informações de autenticação -->
    <form action="<?php echo url_generate(['route' => 'authenticate']); ?>" method="POST" class="form form-login">
        <h1>Área reservada</h1>
        <div class="horizontal-line"></div>
        <div class="form-group flex flex-col">
            <label for="username">Utilizador:</label>
            <input type="text" name="username" id="username">
            <!--Name é a chave que será gerada para a super global POST-->
        </div>
        <div class="form-group flex flex-col">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password">
            <!--Name é a chave que será gerada para a super global POST-->
        </div>
        <div class="form-group">
            <button>Login</button>
        </div>
    </form>
</div>