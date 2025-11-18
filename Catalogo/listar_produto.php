<?php
// 1. CARREGA O JSON
// (Substituí o "include 'listar.php';" por isto)
$arquivo = 'produtos.json';
$produtos = [];
if (file_exists($arquivo)) {
    $produtos = json_decode(file_get_contents($arquivo), true) ?? [];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
  <style>
      /* Adicionei o CSS básico da outra resposta para ficar igual à sua imagem */
      table { border-collapse: collapse; }
      th, td { border: 1px solid #ccc; padding: 8px; }
      th { background-color: #f2f2f2; }
  </style>
</head>
<body>

  <h2>Lista de Produtos</h2>

  <table>
   
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ações</th>
      </tr>
    </thead>
   
    <tbody>
      <?php if (empty($produtos)): ?>
        <tr><td colspan="4">Nenhum produto cadastrado.</td></tr>
      <?php else: ?>
        <?php foreach ($produtos as $p): ?>
          <tr>
            <td><?php echo htmlspecialchars($p['nome']); ?></td>
            <td><?php echo htmlspecialchars($p['descricao']); ?></td>
            <td>R$ <?php echo htmlspecialchars($p['preco']); ?></td>
            <td>
              <a href="editar.php?id=<?php echo urlencode($p['id']); ?>">Editar</a> |
              <a href="excluir.php?id=<?php echo urlencode($p['id']); ?>" onclick="return confirm('Excluir este produto?')">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>

  </table> <p><a href="adicionar.php">Adicionar novo produto</a></p>
</body>
</html>
