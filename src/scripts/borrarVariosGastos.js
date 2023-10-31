document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.checkboxBorrar');
    const botonBorrar = document.getElementById('botonBorrar');

    botonBorrar.addEventListener('click', function(event) {
        event.preventDefault();
        // Verificar si no hay checkboxes seleccionados
        const checkboxesSeleccionados = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked);

        if (checkboxesSeleccionados.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No seleccionaste ningun gasto',
                
              })
        } else {
            Swal.fire({
                title: 'Eliminar varios gastos?',
                text: "Esta acción es irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const seleccionCheckboxes = checkboxesSeleccionados
                        .map(checkbox => checkbox.value);

                // Guardamos los valores del checkbox en the input oculto
                const valoresSeleccionados = document.getElementById('valoresSeleccionados');
                valoresSeleccionados.value = JSON.stringify(seleccionCheckboxes);
                //obtenemos por id el form que queremos enviar y lo enviamos, sweetalter es async , por
                //eso pasa esto.
                const form = document.getElementById('borrarVarios');
                form.submit()
                
            }
        });}
    }); 
});