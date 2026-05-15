document.addEventListener('DOMContentLoaded', function() {
    console.log('Script cargado correctamente'); // Para verificar que se carga

    const filtroNombre = document.getElementById('filtroNombre');
    const filtroCantidad = document.getElementById('filtroCantidad');
    const filtroTipo = document.getElementById('filtroTipo');
    const filas = document.querySelectorAll('#tablaBody tr');

    console.log('Elementos encontrados:', {
        filtroNombre: !!filtroNombre,
        filtroCantidad: !!filtroCantidad,
        filtroTipo: !!filtroTipo,
        filas: filas.length
    });

    function filtrarTabla() {
        const terminoNombre = filtroNombre.value.toLowerCase();
        const terminoCantidad = filtroCantidad.value.toLowerCase();
        const terminoTipo = filtroTipo.value.toLowerCase();

        let filasVisibles = 0;

        filas.forEach(fila => {
            const nombre = fila.getAttribute('data-nombre') || '';
            const cantidad = fila.getAttribute('data-cantidad') || '';
            const tipo = fila.getAttribute('data-tipo') || '';

            const coincideNombre = terminoNombre === '' || nombre.includes(terminoNombre);
            const coincideCantidad = terminoCantidad === '' || cantidad.includes(terminoCantidad);
            const coincideTipo = terminoTipo === '' || tipo.includes(terminoTipo);

            if (coincideNombre && coincideCantidad && coincideTipo) {
                fila.style.display = '';
                filasVisibles++;
            } else {
                fila.style.display = 'none';
            }
        });

        let mensajeNoResultados = document.getElementById('mensajeNoResultados');
        if (filasVisibles === 0) {
            if (!mensajeNoResultados) {
                mensajeNoResultados = document.createElement('tr');
                mensajeNoResultados.id = 'mensajeNoResultados';
                mensajeNoResultados.innerHTML = '<td colspan="4" class="no-results">📭 No se encontraron productos</td>';
                document.querySelector('#tablaProductos tbody').appendChild(mensajeNoResultados);
            }
            mensajeNoResultados.style.display = '';
        } else if (mensajeNoResultados) {
            mensajeNoResultados.style.display = 'none';
        }
    }

    filtroNombre.addEventListener('keyup', filtrarTabla);
    filtroCantidad.addEventListener('keyup', filtrarTabla);
    filtroTipo.addEventListener('keyup', filtrarTabla);
});