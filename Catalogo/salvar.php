<?php
$arquivo = 'produtos.json';

// Se o arquivo não existir ou estiver vazio, cria um array vazio
if (file_exists($arquivo)) {
  $produtos = json_decode(file_get_contents($arquivo), true);
} else {
  $produtos = [];
}

$novo = [
  'id' => time(), // gera um id único
  'nome' => $_POST['nome'],
  'descricao' => $_POST['descricao'],
  'preco' => floatval($_POST['preco']),
  'categoria' => $_POST['categoria'] ?? '' // evita erro se o campo não vier do formulário
];


$produtos[] = $novo;

// Salva tudo de volta no arquivo JSON
file_put_contents($arquivo, json_encode($produtos, JSON_PRETTY_PRINT));

header('Location: index.php');
exit;
?>