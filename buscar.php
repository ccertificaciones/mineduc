<?php
// Configuración
$carpeta_documentos = "documentos/";

// Obtener el código desde la URL
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $archivo = $carpeta_documentos . $codigo . ".pdf";

    // Verificar si el archivo existe
    if (file_exists($archivo)) {
        // Obtener la fecha de creación del archivo
        $fecha_creacion = date("d/m/Y", filemtime($archivo));

        // Respuesta en formato JSON
        echo json_encode([
            "exito" => true,
            "ruta" => $archivo,
            "fecha" => $fecha_creacion
        ]);
    } else {
        // Si el archivo no existe
        echo json_encode([
            "exito" => false,
            "mensaje" => "Certificado no encontrado."
        ]);
    }
} else {
    // Si no se proporciona un código válido
    echo json_encode([
        "exito" => false,
        "mensaje" => "Parámetro 'codigo' faltante."
    ]);
}
?>
