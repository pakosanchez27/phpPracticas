document.addEventListener('DOMContentLoaded', () => {




    // Seleccionar elemntos del DOM 

    const inputNombre = document.querySelector('#nombre');
    const inputApellido = document.querySelector('#apellido');
    const inputEmail = document.querySelector('#email');
    const inputPass = document.querySelector('#contraseña');

    const registro = {
        nombre: '',
        apellido: '',
        email: '',
        contraseña: ''
    }


    //Eventos 

    inputNombre.addEventListener('blur', validar);
    inputApellido.addEventListener('blur', validar);
    inputEmail.addEventListener('blur', validar);
    inputPass.addEventListener('blur', validar);

    // Funciones

    function validar(e) {
        e.preventDefault();
        const campo = e.target.parentElement;
        if (e.target.value.trim() === '') {
            campo.classList.add('alerta');
            registro[e.target.name] = '';
        }else{
            campo.classList.remove('alerta');
        }

        // Asignar valores
        registro[e.target.name] = e.target.value.trim().toLowerCase();
        console.log(registro);
    };

});