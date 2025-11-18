<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $arquivo = "usuarios.json";

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, "[]");
    }

    $usuarios = json_decode(file_get_contents($arquivo), true);

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    foreach ($usuarios as $u) {
        if ($u["email"] == $email && $u["senha"] == $senha) {
           
            // SALVA O USUÁRIO NA SESSÃO
            $_SESSION["usuario"] = $u;

            header("Location: catalogo.php");
            exit;
        }
    }

    echo "Email ou senha incorretos!";
}
?>

<h1>Login</h1>

<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>
