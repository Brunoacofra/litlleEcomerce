function adicionar(){
    var  a = document.getElementById("campos");
    qtd = a.getElementsByTagName("select").length;
    elemento = document.createElement("select");
    elemento.id = "select_", qtd+1;
    var xrh = new XMLHttpRequest();
    xrh.open("POST","buscaIngredientes.php",true);
    xrh.onload  = function (){
        resultado = this.responseText;
        op = document.createElement("option");
        op.innerText = resultado;
        var pai = document.querySelectorAll("#campos select")
        a.appendChild(elemento);
        elemento.appendChild(op);
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