<!DOCTYPE html>
  <html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="">
  </head>
<body>
  <h1>Adicionar Produto</h1>
  <form action="salvar.php" method="POST">
    <label for="nome">Digite o nome do produto:</label>
    <input type="text" id="nome" name="nome" required></input><br><br>

    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required></input><br><br>

    <label class="preco">Preço:</label>
    <input type="number" id="preco" name="preco" required><br><br>

    <button type="submit">Salvar</button>
    <a href="index.php">Voltar</a>
  </form>
</div>
</body>
</html>