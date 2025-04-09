// Executar Mascáras

//Define o Objeto e chama a função
function mascara(o, f) {

    objeto = o;
    funcao = f;
    setTimeout("executaMascara()", 1);

}

function executaMascara() {
    objeto.value = funcao(objeto.value);
}

function RG(variavel) {
    variavel = variavel.replace(/\D/g, ""); // remove o que não é numero

    variavel = variavel.replace(/(\d{2})(\d)/, "$1.$2");// Coloca um ponto após o terceiro o digito e o quarto

    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto após o sexto o digito e o setimo

    variavel = variavel.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return variavel;
}

function CPF(variavel) {
    variavel = variavel.replace(/\D/g, ""); // remove o que não é numero

    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2");// Coloca um ponto após o terceiro o digito e o quarto

    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto após o sexto o digito e o setimo

    variavel = variavel.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return variavel;
}

function CEP(variavel) {
    variavel = variavel.replace(/\D/g, "");

    variavel = variavel.replace(/(\d{4})(\d{3})$/, "$1-$2");

    return variavel;
}

function validarFormulario() {
    const email = document.getElementById("email").value;
    const emailValido = EMAIL(email);
    
    if (!emailValido) {
        alert("Por favor, corrija o email antes de enviar o formulário.");
        return false;
    }
    
    return true;
}

function EMAIL(variavel) {
    const regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]{2,})+$/;
    
    const email = document.getElementById("email").value;
    
    if (!regex.test(email)) {
        console.log("ERRO NO FORMATO DO EMAIL");
        document.getElementById("email").style.borderColor = "red";
        return false;
    }
    
    document.getElementById("email").style.borderColor = "green";
    return true;
}

function LETRAS(variavel) {
    variavel = variavel.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");

    return variavel;
}

function NUM(variavel) {
    variavel = variavel.replace(/\D/g, "");

    return variavel;
}