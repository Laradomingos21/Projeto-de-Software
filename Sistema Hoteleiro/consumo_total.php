<?php
function lerJson($arquivo) {
    if (!file_exists($arquivo)) return [];
    return json_decode(file_get_contents($arquivo), true) ?? [];
}

$nome = isset($_GET['nome']) ? trim($_GET['nome']) : "";

$consumoCozinha = lerJson("consumo.json");
$consumoLavanderia = lerJson("lavanderia.json");

$total = 0;
$itens = [];

foreach (array_merge($consumoCozinha, $consumoLavanderia) as $item) {
    if (isset($item["hospede"]) &&
        strcasecmp(trim($item["hospede"]), $nome) == 0) {

        $valor = floatval($item["valor"] ?? 0);
        $total += $valor;
        $itens[] = $item;
    }
}

// Dados para salvar
$registro = [
    "hospede" => $nome,
    "total" => $total,
    "itens" => $itens,
    "data" => date("Y-m-d H:i:s")
];

file_put_contents("consumo_total.json", json_encode($registro, JSON_PRETTY_PRINT));

echo "<h2>Consumo total de $nome</h2>";
echo "<ul>";

foreach ($itens as $i) {
    echo "<li>{$i['item']} - R$ {$i['valor']}</li>";
}

echo "</ul>";
echo "<h3>Total: R$ " . number_format($total, 2, ',', '.') . "</h3>";
?>