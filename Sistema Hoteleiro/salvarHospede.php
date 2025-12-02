<!DOCTYPE html>
<html>
<body>
  <h2>Cadastro de Hóspede</h2>

  <form action="" method="post">
    <label for="nome">Digite o seu nome:</label>
    <input type="text" id="nome" name="nome"><br><br>

    <label for="cpf">Digite o seu cpf:</label>
    <input type="text" id="cpf" name="cpf"><br><br>
    
    <label for="quarto">Número do Quarto:</label>
    <input type="number" id="quarto" name="quarto"><br><br>

    <button type="submit">Salvar</button>
  </form>
  </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $quarto = $_POST["quarto"];

    // ----- SALVAR HÓSPEDE -----
    $dados = [
        "cpf" => $cpf,
        "nome" => $nome,
        "quarto" => $quarto
    ];

    if(file_exists("hospedes.json")){
        $lista = json_decode(file_get_contents("hospedes.json"), true);
    } else {
        $lista = [];
    }

    $lista[] = $dados;

    file_put_contents("hospedes.json", json_encode($lista));

    // ----- NOTIFICAÇÕES -----
    $not1 = [
        "destino" => "faxineira",
        "mensagem" => "Quarto $quarto ocupado."
    ];

    $not2 = [
        "destino" => "recepcao",
        "mensagem" => "Hospede confirmado: $nome (CPF $cpf)."
    ];

    if(file_exists("notificacoes.json")){
        $notificacoes = json_decode(file_get_contents("notificacoes.json"), true);
    } else {
        $notificacoes = [];
    }

    $notificacoes = [$not1, $not2];

    file_put_contents("notificacoes.json", json_encode($notificacoes));

}

if (file_exists("notificacoes.json")) {
    $notificacoes = json_decode(file_get_contents("notificacoes.json"), true);

    if (is_array($notificacoes) && count($notificacoes) > 0) {
        foreach($notificacoes as $n){
            echo "<p><strong>" . ucfirst($n['destino']) . ":</strong> " . $n['mensagem'] . "</p>";
        }
    } else {
        echo "<p>Nenhuma notificação no momento.</p>";
    }
} else {
    echo "<p>Nenhuma notificação.</p>";
}
?>
