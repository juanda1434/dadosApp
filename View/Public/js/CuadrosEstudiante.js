
function generarEnfrentamientos(semifinal, id) {
    console.log(id);
    console.log(semifinal)
    let enfrentamientosSemifinal = "";
    let k = 0;
    for (let i = 0, j = 1; i < semifinal.length; i++) {
        if ((i + 1) % 2 != 0) {

            let uno = semifinal[i];
            k += uno != null ? 1 : 0;
          
            let b1 = `<tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" data-toggle="tooltip" data-placement="top" title="${uno != null ? uno.nombre : ""}">${uno != null ? uno.nombre : "NN"}</abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ca" aria-label="Flag"></span>
                  </td>
                  <td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">${uno != null ? uno.puntaje : 0}</span>
                  </td>
                </tr>`
            let dos = semifinal[i + 1];
           
            let b2 = `<tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" data-toggle="tooltip" data-placement="top" title="${dos != null ? dos.nombre : ""}">${dos != null ? dos.nombre : "NN"}</abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-kz" aria-label="Flag"></span>
                  </td>
                  <td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">${dos != null ? dos.puntaje : 0}</span>
                  </td>
                </tr>`;
             
             const mio=(uno!=null && uno.idestudiante==id) || (dos!=null && dos.idestudiante==id) ? "activo":"";
             enfrentamientosSemifinal += `<li class="tournament-bracket__item" >
          <div class="tournament-bracket__match ${mio}" tabindex="0" >
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time style="color:#000000">Enfrentamiento # ${j}</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Nombre</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                ${b1 + b2}
                
              </tbody>
            </table>
          </div>
        </li>`;
            j++;
        }
    }
    if (k == 0 && semifinal.length > 8) {
        enfrentamientosSemifinal = "";
    }
    return enfrentamientosSemifinal;
}

function cuadro(codigo) {
    
    $.get(`GET/CuadrosEstudiante/codigo=${codigo}`, (re) => {
       if(Object.keys(re).length==0){
           return;
       }
       
        const r = re["cuadro"]!=undefined ?re.cuadro :{};
        // console.log(r);
        if (r != undefined && Object.keys(r).length > 0) {
            let octavos = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null];
            let cuartos = [null, null, null, null, null, null, null, null];
            let semifinal = [null, null, null, null];
            let final = [null, null];
            let enfrentamientos = r;
            for (var i = 0; i < 30; i++) {
                let ronda = enfrentamientos[i] != undefined ? enfrentamientos[i].ronda : null;
                switch (ronda) {
                    case 1:
                        octavos[enfrentamientos[i].numero - 1] = enfrentamientos[i];
                        break;
                    case 2:
                        cuartos[enfrentamientos[i].numero - 1] = enfrentamientos[i];
                        break;
                    case 3:
                        semifinal[enfrentamientos[i].numero - 1] = enfrentamientos[i];
                        break;
                    case 4:
                        final[enfrentamientos[i].numero - 1] = enfrentamientos[i];
                        break;
                }
            }
            let enfrentamientosOctavos = generarEnfrentamientos(octavos, re.id);
            let enfrentamientosCuartos = generarEnfrentamientos(cuartos, re.id);
            let enfrentamientosSemifinal = generarEnfrentamientos(semifinal, re.id);
            let enfrentamientosFinal = generarEnfrentamientos(final, re.id);
            let octavosEnfre = enfrentamientosOctavos != "" ? `<div class="tournament-bracket__round tournament-bracket__round--Octavos">          
      <h3 class="tournament-bracket__round-title">Octavos</h3>
      <ul class="tournament-bracket__list pl-0">
${enfrentamientosOctavos}</ul></div>` : "";
            let backetFinal = `${octavosEnfre}
<div class="tournament-bracket__round tournament-bracket__round--Cuartos">          
      <h3 class="tournament-bracket__round-title">Cuartos</h3>
      <ul class="tournament-bracket__list pl-0">
${enfrentamientosCuartos}</ul></div>
<div class="tournament-bracket__round tournament-bracket__round--Semifinal">          
      <h3 class="tournament-bracket__round-title">Semifinal</h3>
      <ul class="tournament-bracket__list pl-0">
${enfrentamientosSemifinal}</ul></div>
<div class="tournament-bracket__round tournament-bracket__round--Final">          
      <h3 class="tournament-bracket__round-title">Final</h3>
      <ul class="tournament-bracket__list pl-0">
${enfrentamientosFinal}</ul></div>`;


            $("#panelEnfrentamientos").html(backetFinal);
            $('[data-toggle="tooltip"]').tooltip();
           
        }

    }, "json");








}





