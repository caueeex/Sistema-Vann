<?php
session_start();

if (!isset($_SESSION['logado']) || empty($_SESSION['dados']['id_usuario'])) {
    header("Location: ../index.php");
    exit();
}

include('../CRUD/conexao.php');

$condutor_id = $_SESSION['dados']['id_usuario'];

// Obtém o ID do condutor logado da sessão
$fk_id_condutor = $_SESSION['dados']['id_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">>
    <link rel="stylesheet" href="../assets/css/cadastraraluno.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header>
    <a href="./homepage.php">
        <img src="../assets/img/VANN.png" class="logo" alt="Logo">
    </a>
</header>

<div class="container">
    <h1>Cadastrar Aluno</h1>
    <form action="../CRUD/cadastraraluno.php" method="post">
        <label for="nome">Digite o nome do Aluno:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="data_nasc">Data de nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" required>
        
        <label for="horarioEntrada">Horário de Entrada:</label>
        <input type="time" id="horarioEntrada" name="horarioEntrada" required>
        
        <label for="horarioSaida">Horário de saída:</label>
        <input type="time" id="horarioSaida" name="horarioSaida" required>
        
        <label for="destinoInicial">Destino inicial (CEP):</label>
        <div class="cepinputs">
            <input type="text" id="cep-inicial" name="destinoInicial" required pattern="[0-9]{5}-[0-9]{3}" title="Digite um CEP válido (XXXXX-XXX)">
            <input type="text" id="rua-inicial" name="rua-inicial" readonly>
        </div>
         
        <label for="destinoFinal">Destino final (escola):</label>
        <div class="cepinputs">
            <input type="text" id="cep-final" name="destinoFinal" required pattern="[0-9]{5}-[0-9]{3}" title="Digite um CEP válido (XXXXX-XXX)">
            <input type="text" id="rua-final" name="rua-final" readonly>
        </div>
        <div class="cep">
            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sabe seu CEP? Consulte aqui.</a>
        </div>

        <label for="telefone_responsavel">Telefone Responsável:</label>
        <input type="text" id="telefone_responsavel" name="telefone_responsavel" title="Digite um número de telefone válido (formato: (XX) XXXXX-XXXX)">
        
        <label for="valor_mensalidade">Valor da mensalidade:</label>
        <input type="text" name="valor_mensalidade" required>

        <label for="data_registro">Data do Registro:</label>
        <input type="date" id="data_registro" name="data_registro" required>
        
        <label for="responsavel">Responsável:</label>
        <select id="responsavel" name="responsavel" required>
            <?php
            include("../CRUD/conexao.php");
            $sql = "SELECT id_usuario, nome_usuario FROM cadastro WHERE nivel = 'usuario'";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_usuario'] . "'>" . $row['nome_usuario'] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum usuário encontrado</option>";
            }
            ?>
        </select>
        
        <button type="submit">Cadastrar</button>
    </form>
</div>

<script>
    function fetchAddress(cep, idRua) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "https://viacep.com.br/ws/" + cep.replace("-", "") + "/json/");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (!response.erro) {
                    document.getElementById(idRua).value = response.logradouro;
                } else {
                    document.getElementById(idRua).value = "CEP não encontrado";
                }
            }
        };
        xhr.send();
    }

    document.getElementById("cep-inicial").addEventListener("input", function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep.length <= 8) {
            cep = cep.replace(/(\d{5})(\d{3})/, "$1-$2");
            this.value = cep;
        }
        if (cep.length === 9) {
            fetchAddress(cep, "rua-inicial");
        }
    });

    document.getElementById("cep-final").addEventListener("input", function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep.length <= 8) {
            cep = cep.replace(/(\d{5})(\d{3})/, "$1-$2");
            this.value = cep;
        }
        if (cep.length === 9) {
            fetchAddress(cep, "rua-final");
        }
    });

    
</script>
</body>
</html>
