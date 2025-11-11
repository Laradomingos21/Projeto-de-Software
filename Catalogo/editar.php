<?php
  // Pega o ID da URL
  $id = $_GET['id'] ?? null;
  if ($id === null) {
    echo "ID não informado!";
    exit;
  }
  $arquivo = 'produtos.json';
  $produtos = json_decode(file_get_contents($arquivo), true);
  // Procura o produto pelo ID
  $produto = null;
  foreach ($produtos as $p){
    if ($p['id'] == $id){
      $produto = $p;
      break;
    }
  }
  if (!$produto){
    echo "Produto não encontrado!";
    exit;
  }
  ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Produto</title>
</head>
<body>
  <h1>Editar Produto</h1>
  <form action="atualizar.php" method="POST">
  <!-- Campo oculto com o ID -->
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>
    <label>Descrição:</label>
    <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>" required><br><br>
    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required><br><br>
    <button type="submit">Salvar alterações</button>
    <a href="index.php">Cancelar</a>
  </form>
</body>
</html>