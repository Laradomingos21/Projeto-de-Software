<?php include 'listar.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
</head>
<body>
  <h1>Lista de Produtos</h1>

  <table>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Preço</th>
      <th>Ações</th>
    </tr>

    <?php if (empty($produtos)): ?>
      <tr><td colspan="4">Nenhum produto cadastrado.</td></tr>
    <?php else: ?>
      <?php foreach ($produtos as $p): ?>
        <tr>
          <td><?php echo htmlspecialchars($p['nome']); ?></td>
          <td><?php echo htmlspecialchars($p['descricao']); ?></td>
          <td><?php echo htmlspecialchars($p['preco']); ?></td>
          <td>
            <a href="editar.php?id=<?php echo urlencode($p['id']); ?>">Editar</a> |
            <a href="excluir.php?id=<?php echo urlencode($p['id']); ?>" onclick="return confirm('Excluir este produto?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>

  </table>

  <p><a href="adicionar.php">Adicionar novo produto</a></p>
</body>
</html>