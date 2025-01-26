function buscarDocumento() {
    const codigo = document.getElementById("codigo").value.trim();
    const resultado = document.getElementById("resultado");

    if (!codigo) {
        resultado.innerHTML = `<p style="color:red;">Ingrese un código válido.</p>`;
        return;
    }

    fetch(`buscar.php?codigo=${codigo}`)
        .then(response => response.json())
        .then(data => {
            if (data.exito) {
                resultado.innerHTML = `
                    <p>El Ministerio de Educación confirma que con fecha 
                    <strong>${data.fecha}</strong>, 
                    se ha emitido el certificado de <strong>Licencia de Enseñanza Media</strong> 
                    al RUN <strong>${codigo}</strong>.</p>
                    <a href="${data.ruta}" download>Descargar certificado</a>
                `;
            } else {
                resultado.innerHTML = `<p style="color:red;">${data.mensaje}</p>`;
            }
        })
        .catch(error => {
            resultado.innerHTML = `<p style="color:red;">Error al conectar con el servidor.</p>`;
        });
}
