<?php
$arquivo = 'produtos.json';
$produtos = json_decode(file_get_contents($arquivo), true);

if (empty($produtos)) {
  echo "<p>Nenhum produto cadastrado.</p>";
} else {
  echo "<table border='1' cellpadding='8'>";
  echo "<tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Ações</th>
        </tr>";

  foreach ($produtos as $p) {
    echo "<tr>
            <td>{$p['nome']}</td>
            <td>{$p['descricao']}</td>
            <td>R$ {$p['preco']}</td>
            <td>
              <a href='editar.php?id={$p['id']}'>Editar</a> |
              <a href='excluir.php?id={$p['id']}'>Excluir</a>
            </td>
          </tr>";
  }

  echo "</table>";
}
?>

<button onclick="excluirProduto(<?= $p['id'] ?>)">Excluir</button>

<script>
function excluirProduto(id) {
    if (!confirm("Deseja excluir?")) return;

    fetch("excluir.php?id=" + id)
        .then(r => r.text())
        .then(res => {
            if (res.trim() === "ok") {
                location.reload(); // Atualiza a lista sem sair da página
            } else {
                alert("Erro: " + res);
            }
        })
        .catch(err => alert("Falha: " + err));
}
</script>
