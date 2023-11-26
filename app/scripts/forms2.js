// Tomamos los elementos del formulario
let marca    = document.getElementById('marca') 
let modelo = document.getElementById('modelo') 
let anno     = document.getElementById('anno') 
let color    = document.getElementById('color') 
let caballos   = document.getElementById('caballos') 
let combustible   = document.getElementById('combustible') 
let precio    = document.getElementById('precio') 
let kilometros    = document.getElementById('kilometros') 
let cambio     = document.getElementById('cambio') 
let button  = document.getElementById('button') 

function validar_y_eliminar(){
    let id_coche = document.getElementById('id_coche')
    if(button){
        type = button.name;
    }else{
        console.error("ERROR: el formulario no tiene un tipo")
        return
    }

    data[type] = true

    // Comprobamos los campos y los validamos
            data["id_coche"] = id_coche.value
           

    console.log("DATOS:", data)

   
        send_POST_form(server, data);
}


function validar_y_enviar_coches(event) {
    // Tomamos los elementos del formulario
    let marca = document.getElementById('marca');
    let modelo = document.getElementById('modelo');
    let anno = document.getElementById('anno');
    let color = document.getElementById('color');
    let caballos = document.getElementById('caballos');
    let combustible = document.getElementById('combustible');
    let precio = document.getElementById('precio');
    let kilometros = document.getElementById('kilometros');
    let cambio = document.getElementById('cambio');
    let button = document.getElementById('button');

    // Tomamos los elementos de output para los errores
    let errMarca = document.getElementById('errorMarca');
    let errModelo = document.getElementById('errorModelo');
    let errAnno = document.getElementById('errorAnno');
    let errColor = document.getElementById('errorColor');
    let errCaballos = document.getElementById('errorCaballos');
    let errPrecio = document.getElementById('errorPrecio');
    let errKilometros = document.getElementById('errorKilometros');
    let server = window.location.href;
    let error = 0;
    let data = {};
    let type;

    // Comprobamos el tipo de formulario (log in, register...)
    if (button) {
        type = button.name;
    } else {
        console.error("ERROR: el formulario no tiene un tipo")
        return;
    }

    data[type] = true;

    // Comprobamos los campos y los validamos
    if (marca) {
        if (marca.value === "") {
            // Si la marca está vacía, marcamos un error
            mostrarError(errMarca, "La marca no puede estar vacia");
            error++;
        } else {
            data["marca"] = marca.value;
            ocultarError(errMarca);
        }
    }

    // Repite este bloque para otros campos...

    console.log("DATOS:", data);

    if (error === 0) {
        // Si no hay errores, enviar el formulario
        send_POST_form(server, data);
    } else {
        // Si hay errores de validación, prevenir la presentación del formulario
        event.preventDefault();
        // Mostrar mensajes de error en la página o en una ventana de diálogo
        mostrarMensajeError("Por favor, corrige los siguientes errores:\n" +
            "- Marca inválida\n" +
            "- Modelo inválido\n" +
            ""
            // Agrega otros mensajes para campos adicionales...
        );
    }    
}

function mostrarError(elemento, mensaje) {
    elemento.textContent = mensaje;
    elemento.style.color = "red";
}

function ocultarError(elemento) {
    elemento.textContent = "";
}

function mostrarMensajeError(mensaje) {
    // Aquí puedes mostrar los mensajes de error en la página o en una ventana de diálogo
    console.error(mensaje);
}

function send_POST_form(path, params, method = 'post') {
    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}