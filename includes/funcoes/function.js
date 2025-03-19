function adicionar(){
    var  a = document.getElementById("campos");
    elemento = document.createElement("select");
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