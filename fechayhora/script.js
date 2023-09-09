const RUTA = "fecha.php";
const URL = "http://localhost/fechayhora/fecha.php";

function mostrarResultado(opcion) {
        fetch(URL + '?opcion=' + opcion)
    .then(response => response.text())
    .then(data => {
        document.getElementById('contenedor_ejemplo').innerHTML = data;
    });
}

function diferenciaFecha(opcion){
        const dia = document.getElementById('dia_r').value;
        const mes = document.getElementById('mes_r').value;
        const año = document.getElementById('año_r').value;
        fecha = año + '-' + mes + '-' + dia;

        fetch(URL + '?opcion=' + opcion + '&fecha=' + fecha)
    .then(response => response.text())
    .then(data => {
        document.getElementById('contenedor_ejemplo').innerHTML = data;
    });
    
}

function confirmarFecha(opcion){
    const dia = document.getElementById('dia_confirmar').value;
    const mes = document.getElementById('mes_confirmar').value;
    const año = document.getElementById('año_confirmar').value;

    fetch(URL + '?opcion=' + opcion + '&dia=' + dia + '&mes=' + mes + '&año=' + año)
.then(response => response.text())
.then(data => {
    document.getElementById('contenedor_ejemplo').innerHTML = data;
});

}
