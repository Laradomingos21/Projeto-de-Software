<?php
$arquivo = 'produtos.json';

// Lê o arquivo ou cria array vazio
$produtos = file_exists($arquivo)
    ? json_decode(file_get_contents($arquivo), true)
    : [];

// Se veio ID → está editando
if (!empty($_POST['id'])) {

    foreach ($produtos as &$p) {
        if ($p['id'] == $_POST['id']) {
            $p['nome'] = $_POST['nome'];
            $p['descricao'] = $_POST['descricao'];
            $p['preco'] = floatval($_POST['preco']);
            break;
        }
    }

} else {
    // Criar novo registro
    $novo = [
        'id' => time(),
        'nome' => $_POST['nome'],
        'descricao' => $_POST['descricao'],
        'preco' => floatval($_POST['preco'])
    ];

    $produtos[] = $novo;
}

// Salvar tudo
file_put_contents($arquivo, json_encode($produtos, JSON_PRETTY_PRINT));

header('Location: listar_produto.php');
exit;
?>