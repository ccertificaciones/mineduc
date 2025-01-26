<?php
// Obtener el código desde la URL
if (isset($_GET['codigo'])) {
    $codigo = basename($_GET['codigo']); // Evita ataques de directorio

    // Ruta de la carpeta de documentos
    $ruta_documento = "documentos/" . $codigo . ".pdf";

    // Verificar si el archivo existe
    if (file_exists($ruta_documento)) {
        // Redirigir al archivo PDF directamente
        header("Location: $ruta_documento");
        exit();
    } else {
        echo "Error: El certificado solicitado no existe.";
    }
} else {
    echo "Error: No se proporcionó un código de certificado.";
}
?>
