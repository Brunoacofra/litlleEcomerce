function adicionar(){
    var  a = document.getElementById("campos");
    qtd = a.getElementsByTagName("select").length;
    elemento = document.createElement("select");
    elemento.id = "select_"+(qtd+1);
    elemento.name = "select_"+(qtd+1);
    var xrh = new XMLHttpRequest();
    xrh.open("POST","buscaIngredientes.php",false);
    xrh.onload  = function (){
        resultado = JSON.parse(this.responseText);
        a.appendChild(elemento);
        for(i = 0;i <= resultado.length-1;i++){
            op = document.createElement("option");
            op.innerText = resultado[i]["ing_nome"];
            elemento.appendChild(op);
        }
        console.log(resultado);
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