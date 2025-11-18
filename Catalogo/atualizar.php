<?php
$arquivo = 'produtos.json';
$produtos = json_decode(file_get_contents($arquivo), true);

$id = $_POST['id'] ?? null;
if (!$id) {
  echo "ID não recebido!";
  exit;
}

foreach ($produtos as &$p) {
  if ($p['id'] == $id) {
    $p['nome'] = $_POST['nome'];
    $p['descricao'] = $_POST['descricao'];
    $p['preco'] = floatval($_POST['preco']);
    break;
  }
}

file_put_contents($arquivo, json_encode($produtos, JSON_PRETTY_PRINT));

header('Location: listar_produto.php');
exit;
?>

