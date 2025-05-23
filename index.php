<!DOCTYPE html>

<?php

require 'conexion.php';

$descripcion = '';

$sql = '';


if (isset($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion'];
    $sql = "SELECT * FROM productos WHERE descripcion LIKE '%$descripcion%'";
} else {
    $sql = "SELECT * FROM productos";
}

$result = $conexion->query($sql); // No necesitas execute()

?>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Lista Productos</h1>
        <form method="POST">
            <div class="mb-3 d-flex gap-2">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción">
                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <tr>
                <td>Id</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Stock</td>

            </tr>
            <?php
            $nro = 1;
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['descripcion'] . '</td>
                                <td>' . $row['precio'] . '</td>
                                <td>' . $row['stock'] . '</td>'
                    . '</tr>';
                $nro++;
            }
            $result->closeCursor();
            ?>
        </table>
    </div>

</body>

</html>