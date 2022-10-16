const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
//formulario__mensaje-exito
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\- ]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[.\-0-9a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^[0-9]{4,14}$/, // 7 a 14 numeros.
	direccion:/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/
}

const campos = {
	usuario: false,
	nombre: false,
	password: false,
	correo: false,
	telefono: false,
	direccion:false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});
formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if( campos.nombre   && campos.telefono  && campos.direccion ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
		document.getElementById('formulario__mensaje').classList.add('notblock');
		let timerInterval
		Swal.fire({
		  title: 'Proceso Exitoso!',
		  html: 'I will close in <b></b> milliseconds.',
		  timer: 1000,
		  icon: 'success',
		  timerProgressBar: true,
		  didOpen: () => {
		    Swal.showLoading()
		    const b = Swal.getHtmlContainer().querySelector('b')
		    timerInterval = setInterval(() => {
		      b.textContent = Swal.getTimerLeft()
		    }, 100)
		  },
		  willClose: () => {
		    clearInterval(timerInterval)
		  }
		}).then((result) => {
		  /* Read more about handling dismissals below */
		  if (result.dismiss === Swal.DismissReason.timer) {
		    console.log('I was closed by the timer')
		}
})
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});