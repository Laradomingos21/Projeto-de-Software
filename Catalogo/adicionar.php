<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Produto</title>
</head>
<body>

<h1>Adicionar Produto</h1>

<form action="salvar.php" method="POST">
  <label>Nome:</label>
  <input type="text" name="nome" required><br><br>

  <label>Descrição:</label>
  <input type="text" name="descricao" required><br><br>

  <label>Preço:</label>
  <input type="number" name="preco" step="0.01" required><br><br>

  <button type="submit">Salvar</button>
  <a href="listar_produto.php">Listar Produto</a>
</form>

</body>
</html>