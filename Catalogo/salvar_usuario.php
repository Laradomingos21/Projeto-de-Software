<?php
$arquivo = "usuarios.json";

// Criar arquivo se não existir
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "[]");
}

$usuarios = json_decode(file_get_contents($arquivo), true);

// Garante que é array
if (!is_array($usuarios)) {
    $usuarios = [];
}

// Pegando dados do formulário
$nome  = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Criando novo usuário
$novo = [
    "id"    => time(),
    "nome"  => $nome,
    "email" => $email,
    "senha" => $senha,
];

// Adiciona no array
$usuarios[] = $novo;

// Salva no arquivo
file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT));

echo "Usuário cadastrado com sucesso!<br>";
echo "<a href='login.php'>Ir para Login</a>";
?>

