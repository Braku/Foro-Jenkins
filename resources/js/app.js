const app = {
  form : document.querySelector("#form"),
  resultado : document.querySelector("#tabla_amort"),

  url:"app/app.php",
  route:"",

  tabla : new Array(),

  realizarCalculos: function(){
    let datos = new FormData;
    this.route = "?calcular";
    this.tabla = [];

    let prestamo = document.querySelector("#prestamo").value;
    let interes = document.querySelector("#interes").value;
    let plazo = document.querySelector("#plazo").value;
    datos.append("m", prestamo);
    datos.append("i", interes);
    datos.append("p", plazo);
    fetch(this.url + this.route, {
      method : "POST",
      body : datos
    }). then( response => response.json() )
      . then(res => {
        // for(const e of Object.values(res)) {
        //   this.tabla.push(e);
        // }
        let html = "";
        let i = 1;
        for(const tabla of Object.values(res)){
          html += `
            <tr>
              <td>Mes no.${i}</td>
              <td>$${tabla[0].toFixed(2)}</td>
              <td>$${tabla[1].toFixed(2)}</td>
              <td>$${tabla[2].toFixed(2)}</td>
              <td>$${tabla[3].toFixed(2)}</td>
            </tr>
          `;
          i += 1;
        }
        this.resultado.innerHTML = html;
      });
    }

}

window.onload = function(){
  // app.form.addEventListener("change", ()=>app.prepararTabla());

  app.form.addEventListener("submit", e => {
    e.preventDefault();
    e.stopPropagation();
    app.realizarCalculos();
  });
}
