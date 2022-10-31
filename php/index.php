<?php
include "db_conn.php";
date_default_timezone_set('America/Sao_Paulo');
// seleciona a base de dados em que vamos trabalhar
//mysqli_select_db($db, $con);
// cria a instrução SQL que vai selecionar os dados
$documento = $_POST['documento'];
$protocolo = $_POST['protocolo'];


if (empty($documento)) {
    $query = "SELECT * FROM protocolos WHERE Protocolo = $protocolo";
} else if (strlen($documento) == 11) {
    $query = "SELECT * FROM protocolos WHERE CPF = $documento";
} else {
    $query = "SELECT * FROM protocolos WHERE CNPJ = $documento";
}

/*
if (strlen($documento) == 11){
        $query = "SELECT * FROM protocolos WHERE CPF=$documento";
}else{
        $query = "SELECT * FROM protocolos WHERE CNPJ=$documento";
};*/



// executa a query
$dados = mysqli_query($conn, $query) or die(mysqli_error($conn));


// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$tr = "30";

$tp = ceil($total / $tr);

$inicio = ($tr * $pagina) - $tr;


$limit = mysqli_query($conn, "$query LIMIT $inicio,$tr");

$anterior = $pagina - 1;
$proximo = $pagina + 1;
?>

<html>

<head>
    <title>AgenciaDeRegistro</title>
    <link rel="stylesheet" type="text/css" href="../style/table.css">
    <script type="text/javascript" language="javascript" src="node_modules\jquery\src\jquery.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://u3r3f6s2.rocketcdn.me/jquery.min.js"></script>
    <link href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css rel=stylesheet>
    <link href=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap.min.css rel=stylesheet>
    <script src="https://u3r3f6s2.rocketcdn.me/bootstrap/4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/filtrotabela.js"></script>
</head>

<body>

    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
        <div class="container">
            <h2>PROTOCOLO: </h2>

            </br>
            
            <?php
            //var_dump($pesquisaT)
            ?>
            <table id="dataTable" name="dataTable" class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Nome: </th>
                        <th scope="col">Protocolo: </th>
                        <th scope="col">Status: </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dados = mysqli_fetch_array($limit)) {
                        $nome = $dados['Nome'];
                        $protocolo = $dados['Protocolo'];
                        $Status = $dados['Status'];



                        //echo"<br>";
                        //var_dump($DataH);
                        //echo"</br>";
                        //var_dump($Data);
                        //echo"</br>";

                    ?>
                        <tr>
                            <th scope="row"><?= $nome; ?></th>
                            <td><?= $protocolo ?></td>
                            <td><?= $Status ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>