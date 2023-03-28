document.addEventListener('DOMContentLoaded', () => {




    // Seleccionar elemntos del DOM 

    const inputNombre = document.querySelector('#nombre');
    const inputApellido = document.querySelector('#apellido');
    const inputEmail = document.querySelector('#email');
    const inputPass = document.querySelector('#password');
    const btnlimpiar = document.querySelector('#limpiar');
    const formulario = document.querySelector('#formulario');
    const btncrear = document.querySelector('#btnCrear');
    
    const registro = {
        nombre: '',
        apellido: '',
        email: '',
        password: ''
    }
   

    //Eventos 

    inputNombre.addEventListener('blur', validar);
    inputApellido.addEventListener('blur', validar);
    inputEmail.addEventListener('blur', validar);
    inputPass.addEventListener('blur', validar);
   btncrear.addEventListener('click', (e) => {
    e.preventDefault();
    console.log("Hola mundo");
   });
    btnlimpiar.addEventListener('click', function (e) {
        e.preventDefault();
        registro.nombre = '';
        registro.apellido = '';
        registro.email = '';
        registro.password = '';

        formulario.reset();
        verificar();
    })

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
        verificar();
    };

    function verificar() {
        console.log(Object.values(registro));

        if (Object.values(registro).includes('')) {
            btncrear.classList.add('opacity-50');
            btncrear.disabled = true;
        }else{
            btncrear.classList.remove('opacity-50');
            btncrear.disabled = false;
        }
    }

});