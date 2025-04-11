function adicionar(){
    let a = document.getElementById("campos");
    let qtd = a.getElementsByTagName("select").length;
    let elemento = document.createElement("select");
    elemento.id = "select_"+(qtd+1);
    elemento.name = "select_"+(qtd+1);
    let xrh = new XMLHttpRequest();
    xrh.open("POST","./includes/endpoints/buscaIngredientes.php",true);
    xrh.onload  = function (){
        let resultado = JSON.parse(this.responseText);
        a.appendChild(elemento);
        console.log(resultado);
        console.log(resultado.length);
        for(let i = 0;i <= resultado.length-1;i++){
            let op = document.createElement("option");
            op.innerText = resultado[i]["ing_nome"];
            op.value = resultado[i]["ing_codigo"];
            elemento.appendChild(op);
        }
    }
    xrh.send();
    
}
function remover(){
    var  a = document.getElementById("campos");
    qtd = a.getElementsByTagName("select").length;
    if(qtd>=1){
        var  a = document.querySelectorAll("#campos select");
        a[a.length-1].remove();
    }
    else
    {
        alert("Sem campos para remover");
    }
}