btFecherForm = document.getElementById("bt-fechar-form");
formfalecom = document.getElementById("form-falecom");
FaleConsultor = document.getElementById("FaleConsultor");

mensagemForm  = document.getElementById("mensagemForm");

function fecharModal(){
    formfalecom.style.display="none";
}
function abrirModal(){  
    formfalecom.style.display="block";
}
btFecherForm.addEventListener("click", fecharModal);
FaleConsultor.addEventListener("click", abrirModal);

btEnviarForm = document.getElementById("btEnviarForm");
btEnviarForm.addEventListener("click", function(){
    assuntoForm = document.getElementById("AssuntoForm").value;
    textoForm = document.getElementById("TextoForm").value;
    dados = {assunto: assuntoForm, texto: textoForm};

    fetch("backend/enviarform.php", {
        method: "POST",
        headers: {
        'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(resposta => resposta.json())
    .then(dadosResposta => {
        console.log("Sucess", dadosResposta)
        mensagemForm.classList.remove("erro")
        mensagemForm.classList.add("sucesso")
        mensagemForm.innerHTML = "Mesagem Enviada!"
    })
    .catch(erro =>{
        console.log("Errror", erro)
        mensagemForm.classList.remove("sucesso")
        mensagemForm.classList.add("erro")
        mensagemForm.innerHTML = "Ocorreu um erro ao enviar a mensagem"
    })
});

