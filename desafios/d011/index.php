<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $preco = $_GET['preco'] ?? '0';
        $reaj = $_GET['reaj'] ?? '0';
    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do Producto (Kz) </label>
            <input type="number" name="preco" id="preco" min="0.10" step="0.01" required value="<?=$preco?>">

            <label for="reaj">Qual será o percentual do reajuste? (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="reaj" id="reaj" min="0" max="100" step="1" oninput="mudaValor()" value="<?=$reaj?>">

            <input type="submit" value="Reajustar">
        </form>
    </main>
    <?php 
        $aumento = $preco * $reaj / 100;
        $novo = $preco + $aumento;
    ?>
    <section>
        <h2>Resultado do Reajuste</h2>
        <p>O producto que custava <strong><?=number_format($preco, 2, ",", ".")?>Kz</strong>, com <strong><?=$reaj?>% de aumento</strong> vai passar a custar <strong><?=number_format($novo, 2, ",", ".")?>Kz</strong> a partir de agora.</p>
    </section>

    <script>
        // Declaraçoes automáticas
        mudaValor()

        function mudaValor() {
            p.innerText = reaj.value;
        }
    </script>
</body>
</html>