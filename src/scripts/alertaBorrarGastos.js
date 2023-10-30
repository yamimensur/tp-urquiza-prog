let borrarGasto = document.getElementsByClassName('borrarGasto'); 

   
for ( let i = 0; i < borrarGasto.length; i++) {
    borrarGasto[i].addEventListener('click', function (){
Swal.fire({
            title: 'Eliminar gasto?',
            text: "Esta accion es irreversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar'
    }).then((result) => {
            if (result.isConfirmed) {
                let formulario = borrarGasto[i].closest('form');
                if(formulario) {
               formulario.submit(); }
            } })
    }) 
}