<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de comissão por funcionário</title>
    <style>
body {
    background-color: #F4C2C2;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
 
h1 {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
 
form {
    text-align: center;
}
 
input[type="text"],
input[type="number"],
input[type="submit"] {
    margin: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}
 
input[type="submit"]:hover {
    animation: pulse 0.5s infinite alternate;
}
 
@keyframes pulse {
    to {
        transform: scale(1.1);
    }
}
 
    </style>
</head>
<body>
    <h1>Calculadora de Salário e comissões para Vendedores</h1>
    <form method="POST" action="">
        <label for="nome">Nome do Vendedor:</label>
        <input type="text" id="nome" name="nome" required><br><br>
 
        <label for="metaSemanal">Semana 1:</label>
        <input type="number" id="metaSemanal1" name="metaSemanal1" required><br><br>
 
        <label for="metaSemanal">Semana 2:</label>
        <input type="number" id="metaSemanal2" name="metaSemanal2" required><br><br>
 
        <label for="metaSemanal">Semana 3:</label>
        <input type="number" id="metaSemanal3" name="metaSemanal3" required><br><br>
 
        <label for="metaSemanal">Semana 4:</label>
        <input type="number" id="metaSemanal4" name="metaSemanal4" required><br><br>
 
        <label for="metaMensal">Meta Mensal:</label>
        <input type="number" id="metaMensal" name="metaMensal" required><br><br>
 
        <input type="submit" value="Calcular">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $metaSemanal1 = $_POST["metaSemanal1"];
    $metaSemanal2 = $_POST["metaSemanal2"];
    $metaSemanal3 = $_POST["metaSemanal3"];
    $metaSemanal4 = $_POST["metaSemanal4"];
    $metaMensal = $_POST["metaMensal"];
    $salarioMinimo = 1927.02;
    $bonificacaoSemanal1 = 0;
    $excedenteSemanal1 = 0;
    $bonificacaoSemanal2 = 0;
    $excedenteSemanal2 = 0;
    $bonificacaoSemanal3 = 0;
    $excedenteSemanal3 = 0;
    $bonificacaoSemanal4 = 0;
    $excedenteSemanal4 = 0;
    $bonificacaoMensal = 0;
    $excedenteMensal = 0;
 
    if ($metaSemanal1 >= 20000) {
        $bonificacaoSemanal1 = ($metaSemanal1 * 0.01);
    }
    if($metaSemanal1 > 20000){
        $excedenteSemanal1 = $metaSemanal1 - 20000;
        $bonificacaoSemanal1 =$excedenteSemanal1 * 0.05;
    }
    if ($metaSemanal2 >= 20000) {
        $bonificacaoSemanal2 = ($metaSemanal2 * 0.01);
    }
    if($metaSemanal2 > 20000){
        $excedenteSemanal2 = $metaSemanal2 - 20000;
        $bonificacaoSemanal2 = $excedenteSemanal2 * 0.05;
    }
    if ($metaSemanal3 >= 20000) {
        $bonificacaoSemanal3 = ($metaSemanal3 * 0.01);
    }
    if($metaSemanal3 > 20000){
        $excedenteSemanal3 = $metaSemanal3 - 20000;
        $bonificacaoSemanal3 = $excedenteSemanal3 * 0.05;
    }
    if ($metaSemanal4 >= 20000) {
        $bonificacaoSemanal4 = ($metaSemanal4 * 0.01);
    }
    if($metaSemanal4 > 20000){
        $excedenteSemanal4 = $metaSemanal4 - 20000;
        $bonificacaoSemanal4 = $excedenteSemanal4 * 0.05;
    }
 
    $metaSemanalTotal = $metaSemanal1 + $metaSemanal2 + $metaSemanal3 + $metaSemanal4;
    $metaMensalTotal = $metaMensal;
 
    if ($metaMensal > 80000) {
        $excedenteMensal = $metaMensal - 80000;
        $bonificacaoMensal = $excedenteMensal * 0.10;
    }
 
    $salarioFinal = $salarioMinimo + $bonificacaoSemanal1 + $bonificacaoSemanal2 + $bonificacaoSemanal3 + $bonificacaoSemanal4 + $bonificacaoMensal;
 
    echo "<h2>Resultado para $nome:</h2>";
    echo "<p>Salário Base: R$ $salarioMinimo</p>";
    echo "<p>Bônus por Meta Semanal: R$ " . number_format($bonificacaoSemanal1 + $bonificacaoSemanal2 + $bonificacaoSemanal3 + $bonificacaoSemanal4, 2) . "</p>";
    echo "<p>Bônus por Meta Mensal: R$ " . number_format($bonificacaoMensal, 2) . "</p>";
    echo "<p>Excedente da Meta Semanal: R$ " . number_format($excedenteMensal, 2) . "</p>";
    echo "<h3>Salário Final: R$ " . number_format($salarioFinal, 2) . "</h3>";
}
?>