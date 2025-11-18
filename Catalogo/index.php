<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>

<h1>Cadastrar Usuário</h1>

<form action="salvar_usuario.php" method="POST">

    <input type="hidden" name="tipo_salvar" value="usuario">

    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Cadastrar</button>
    <a href="login.php">Login</a>

</form>

</body>
</html>
