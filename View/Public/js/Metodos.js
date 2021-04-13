
export function loginEstudiante(usuario, contrasenia) {
    let exito = false;


    $.post({
        url: "POST/LoginEstudiante",
        data: {user: usuario, contrasenia: contrasenia},
        success: (r) => {
            console.log(r);
            if (r.exito != undefined && r.exito) {
                exito = [true];
            }else{
                exito=  [false,r.error];
            }
        }, async: false,
        dataType: "json"

    });

    return exito;
}
export function unirsePartida(codigo) {
    let exito = false;


    $.post({
        url: "POST/UnirsePartida",
        data: {codigo: codigo},
        success: (r) => {
            console.log(r);
            if (r.exito != undefined && r.exito) {
                exito = true;
            }
        }, async: false,dataType:"json"

    });

    return exito;
}