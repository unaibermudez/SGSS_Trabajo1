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


function validar_y_enviar_coches(){
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

    // Tomamos los elementos de output para los errores
    let errMarca  = document.getElementById('errorMarca') 
    let errModelo      = document.getElementById('errorModelo') 
    let errAnno    = document.getElementById('errorAnno') 
    let errColor    = document.getElementById('errorColor') 
    let errCaballos     = document.getElementById('errorCaballos')
    let errPrecio     = document.getElementById('errorPrecio') 
    let errKilometros     = document.getElementById('errorKilometros') 
    let server = window.location.href;
    let error=0;
    let data = {};
    let type;

    // Comprobamos el tipo de formulario (log in, register...)
    if(button){
        type = button.name;
    }else{
        console.error("ERROR: el formulario no tiene un tipo")
        return
    }

    data[type] = true

    // Comprobamos los campos y los validamos
    if(marca){
        if(marca.value==""){
            //si nombre vacio nombre incorrecto
            if(errMarca){
                errMarca.innerHTML="La marca no puede estar vacia"
                errMarca.style.color="red"
            }
            error=error+1;
        }else{
            data["marca"] = marca.value
            errMarca.innerHTML=""
        } 
    }

    if(modelo){
        if(modelo.value==""){
            //si nombre vacio nombre incorrecto
            if(errModelo){
                errModelo.innerHTML="El modelo no puede estar vacio"
                errModelo.style.color="red"
            }
            error=error+1;
        }else{
            data["modelo"] = modelo.value
            errModelo.innerHTML=""
        } 
    }

    if(anno){
        if(anno.value=="" || !/^\d+(\.\d+)?$/.test(anno.value)){
            //si nombre vacio nombre incorrecto
            if(errAnno){
                errAnno.innerHTML="El año no puede estar vacio"
                errAnno.style.color="red"
            }
            error=error+1;
        }else{
            data["anno"] = anno.value
            errAnno.innerHTML=""
        } 
    }

    if(color){
        if(color.value==""){
            //si nombre vacio nombre incorrecto
            if(errColor){
                errColor.innerHTML="El color no puede estar vacio"
                errColor.style.color="red"
            }
            error=error+1;
        }else{
            data["color"] = color.value
            errColor.innerHTML=""
        } 
    }

    if(caballos){
        if(caballos.value=="" || !/^\d+(\.\d+)?$/.test(caballos.value)){
            //si nombre vacio nombre incorrecto
            if(errCaballos){
                errCaballos.innerHTML="Formato invalido"
                errCaballos.style.color="red"
            }
            error=error+1;
        }else{
            data["caballos"] = caballos.value
            errCaballos.innerHTML=""
        } 
    }

    data['combustible'] = combustible

    if(precio){
        if(precio.value=="" || !/^\d+(\.\d+)?$/.test(precio.value)){
            //si nombre vacio nombre incorrecto
            if(errPrecio){
                errPrecio.innerHTML="Formato invalido"
                errPrecio.style.color="red"
            }
            error=error+1;
        }else{
            data["precio"] = precio.value
            errPrecio.innerHTML=""
        } 
    }

    if(kilometros){
        if(kilometros.value=="" || !/^\d+(\.\d+)?$/.test(kilometros.value)){
            //si nombre vacio nombre incorrecto
            if(errKilometros){
                errKilometros.innerHTML="Formato invalido"
                errKilometros.style.color="red"
            }
            error=error+1;
        }else{
            data["kilometros"] = kilometros.value
            errKilometros.innerHTML=""
        } 
    }

    data['cambio'] = cambio

    console.log("DATOS:", data)

    if(error==0){
        //si no hay errores
        send_POST_form(server, data);
    }

    if (error > 0) {
        // If there are validation errors, prevent form submission
        event.preventDefault();

        // Display a user-friendly error message
        let errorMessage = "Please correct the following errors:\n";

        if (errMarca.style.color !== "green") {
            errorMessage += "- Invalid marca\n";
        }
        if (errModelo.style.color !== "") {
            errorMessage += "- Invalid modelo\n";
        }
        if (errAnno.style.color !== "") {
            errorMessage += "- Invalid año\n";
        }
        if (errColor.style.color !== "") {
            errorMessage += "- Invalid color\n";
        }
        if (errCaballos.style.color !== "") {
            errorMessage += "- Invalid caballos\n";
        }
        if (errPrecio.style.color !== "") {
            errorMessage += "- Invalid precio\n";
        }
        if (errKilometros.style.color !== "") {
            errorMessage += "- Invalid kilometros\n";
        }

        alert(errorMessage);
    }
}
function send_POST_form(path, params, method='post') {

    // The rest of this code assumes you are not using a library.
    // It can be made less verbose if you use one.
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