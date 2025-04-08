    // Executar Mascáras

    //Define o Objeto e chama a função
    function mascara(o, f) {

        objeto = o;
        funcao = f;
        setTimeout("executaMascara()", 1);

    }


    function executaMascara() {
        objeto.value=funcao(objeto.value);
    }

    //Mascaras

    //Mascara do Telefone

    function telefone(variavel) {
        //parenteses em volta dos dois primeiros digitos
        variavel = variavel.replace(/\D/g,"");

        variavel = variavel.replace(/^(\d\d)(\d)/g,"($1)$2");
        variavel=variavel.replace(/(\d{4})(\d)/,"$1-$2");

        return variavel
    }

    //Mascara do RG e CPF
    function RGeCPF(variavel){
        variavel=variavel.replace(/\D/g,""); // remove o que não é numero

        variavel=variavel.replace(/(\d{3})(\d)/, "$1.$2") ;// Coloca um ponto após o terceiro o digito e o quarto

        variavel=variavel.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto após o sexto o digito e o setimo

        variavel=variavel.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); 

        return variavel;
    }

    //Mascara do CEP

    function cep(variavel) {
        variavel=variavel.replace(/\D/g,""); // remove o que não é numero
        
        variavel=variavel.replace(/(\d{5})(\d{1,3})$/,"$1-$2");

        variavel=variavel.replace(/(\d{2})(\d)/,"$1.$2");

        return variavel;
    }

    // mascara data

    function data(variavel) {
        variavel = variavel.replace(/\D/g,"") ;// remove o que não é numero

        variavel = variavel.replace(/(\d{2})(\d)/,"$1/$2");

        variavel = variavel.replace(/(\d{2})(\d)/,"$1/$2");

        return variavel;
    }

    console.log("hello world");