function adicionar(){
    var  a = document.getElementById("campos");
    elemento = document.createElement("select");
    var xrh = new XMLHttpRequest();
    xrh.open("POST","buscaIngredientes.php",true);
    xrh.onload  = function (){
       alert("resultado: "+this.responseText);
    }
    xrh.send();
    a.append(elemento);
}
function remover(){
    var  a = document.getElementById("campos");
    qtd = a.getElementsByTagName("select").length;
    if(qtd>=1){
        var  a = document.querySelector("#campos select");
        a.remove();
    }
    else
    {
        alert("Sem campos para remover");
    }
}