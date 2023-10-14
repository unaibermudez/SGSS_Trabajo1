// Tomamos los elementos del formulario
let imagen = document.getElementById('imagen')
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
    let imagen = document.getElementById('imagen')
    let marca    = document.getElementById('marca') 
    let modelo = document.getElementById('modelo') 
    let anno     = document.getElementById('anno') 
    let color    = document.getElementById('color') 
    let caballos   = document.getElementById('caballos') 
    let combustible   = document.getElementById('combustible') 
    let precio    = document.getElementById('precio') 
    let kilometros    = document.getElementById('kilometros') 
    let cambio     = document.getElementById('cambio') 
    let id_dueno = decument.getElementById('id_dueno')
    let button  = document.getElementById('button') 



    // Comprobamos el tipo de formulario (log in, register...)
    if(button){
        type = button.name;
    }else{
        console.error("ERROR: el formulario no tiene un tipo")
        return
    }

    data[type] = true

    // Comprobamos los campos y los validamos
            data["imagen"] = imagen.value
            data["marca"] = marca.value
            data["modelo"] = modelo.value
            data["anno"] = anno.value
            data["color"] = color.value
            data["caballos"] = caballos.value
            data["combustible"] = combustible.value
            data["precio"] = precio.value
            data["kilometros"] = kilometros.value
            data["cambio"] = cambio.value
            data["id_dueno"] = id_dueno.value

    console.log("DATOS:", data)

   
        send_POST_form(server, data);
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