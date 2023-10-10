let user = document.getElementById('username')
let pass = document.getElementById('password')
let button = document.getElementById('button')

function iniciar_sesion(){
    let user = document.getElementById('username')
    let pass = document.getElementById('password')
    let button = document.getElementById('button')

    // Comprobamos el tipo de formulario (log in, register...)
    if(button){
        type = button.name;
    }else{
        console.error("ERROR: el formulario no tiene un tipo")
        return
    }

    data[type] = true
}