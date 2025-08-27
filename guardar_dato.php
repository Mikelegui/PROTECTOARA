<?php
// guardar_dato.php

// Verificar si recibimos un dato por GET o POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dato = isset($_POST['valor']) ? $_POST['valor'] : null;
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $dato = isset($_GET['valor']) ? $_GET['valor'] : null;
} else {
    $dato = null;
}

if ($dato !== null) {
    // 📌 Guardar el dato en un archivo de texto
    $archivo = "datos.txt";
    $fecha = date("Y-m-d H:i:s");

    // Abrir archivo y guardar
    $linea = $fecha . " - Valor: " . $dato . "\n";
    file_put_contents($archivo, $linea, FILE_APPEND);

    // Responder al ESP32 o navegador
    echo "✅ Dato recibido: " . $dato;
} else {
    echo "❌ No se recibió ningún valor.";
}
?>
