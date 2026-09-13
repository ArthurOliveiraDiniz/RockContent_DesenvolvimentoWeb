const btEntrar = document.getElementById("btEntrar");
const mensagemLogin = document.getElementById("mensagemLogin");

btEntrar.addEventListener("click", function () {
    const email = document.getElementById("emailLogin").value;
    const senha = document.getElementById("senhaLogin").value;

    mensagemLogin.classList.remove("sucesso", "erro");
    mensagemLogin.innerHTML = "";

    const dados = {
        email: email,
        senha: senha
    };

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dados)
    })
    .then(resposta => resposta.json())
    .then(dadosResposta => {
        if (dadosResposta.estado === "sucesso") {
            mensagemLogin.classList.add("sucesso");
            mensagemLogin.innerHTML = "Login realizado!";

            window.location.href = "index.php";
        } else {
            mensagemLogin.classList.add("erro");
            mensagemLogin.innerHTML = "E-mail ou senha inválidos.";
        }
    })
    .catch(erro => {
        console.error("Erro:", erro);
        mensagemLogin.classList.add("erro");
        mensagemLogin.innerHTML = "Ocorreu um erro ao realizar o login.";
    });
});
