<?php
/*
$servername = "localhost"; //Nome do Servidor
$username = "senha_senha"; //Login do usuario
$pass = "senha@digi1"; //Senha do usuario
$dbname = "senha_portal"; //nome do banco
*/

$servername = "localhost"; //Nome do Servidor
$username = "root"; //Login do usuario
$pass = ""; //Senha do usuario
$dbname = "test"; //nome do banco

$conn = mysqli_connect($servername,$username,$pass,$dbname);

/*
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
/*
$sql = "INSERT INTO bd_indicadores (id, nome, senha, link) VALUES (1, 'teste nome', '1234', 'link teste')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
*/

?>