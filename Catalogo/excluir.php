<?php
$arquivo = 'produtos.json';

// verifica se o arquivo existe
if (!file_exists($arquivo)) {
  header('Location: listar_produto.php');
  exit;
}

$produtos = json_decode(file_get_contents($arquivo), true) ?? [];
$id = $_GET['id'] ?? null;

// se o ID estiver vazio, volta
if (!$id) {
  header('Location: index.php');
  exit;
}

// remove o produto com o ID informado
$produtos = array_filter($produtos, function($p) use ($id) {
  return $p['id'] != $id;
});

// regrava o arquivo sem o produto removido
file_put_contents($arquivo, json_encode(array_values($produtos), JSON_PRETTY_PRINT));

// volta para a lista
header('Location: listar_produto.php');
exit;
?>

