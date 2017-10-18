var req;

// FUNÇÃO PARA BUSCA NOTICIA
function buscar(valor) {

    var cpf = valor;
    exp = /\.|\-/g
    cpf = cpf.toString().replace(exp, "");
    var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
    var soma1 = 0, soma2 = 0;
    var vlr = 11;

    for (i = 0; i < 9; i++) {
        soma1 += eval(cpf.charAt(i) * (vlr - 1));
        soma2 += eval(cpf.charAt(i) * vlr);
        vlr--;
    }
    soma1 = (((soma1 * 10) % 11) == 10 ? 0 : ((soma1 * 10) % 11));
    soma2 = (((soma2 + (2 * soma1)) * 10) % 11);

    var digitoGerado = (soma1 * 10) + soma2;
    if (digitoGerado != digitoDigitado) {
        document.getElementById('resultado').innerHTML = "<font size='6' color=red>CPF INVÁLIDO</font>";
        document.form1.login.value = "";
        document.form1.login.focus();
    } else {

        // Verificando Browser
        if (window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if (window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }

        // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "busca.php?cpf=" + valor;

        // Chamada do método open para processar a requisição
        req.open("Get", url, true);

        // Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function () {

            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if (req.readyState == 1) {
                document.getElementById('resultado').innerHTML = 'Buscando Noticias...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if (req.readyState == 4 && req.status == 200) {

                // Resposta retornada pelo busca.php
                var resposta = req.responseText;

                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById('resultado').innerHTML = resposta;
            }
        }
        document.form1.login.value = "";
        document.form1.login.focus();
        req.send(null);
    }
}

// FUNÇÃO PARA BUSCA NOTICIA
function buscar2(valor) {

    if (valor == "" || valor == " " || valor == null) {
        document.getElementById('resultado').innerHTML = "<font size='6' color=red>NOME INVÁLIDO</font>";
        login2.value = "";
        login2.focus();
    } else {

        // Verificando Browser
        if (window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if (window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }

        // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "busca2.php?nome=" + valor;

        // Chamada do método open para processar a requisição
        req.open("Get", url, true);

        // Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function () {

            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if (req.readyState == 1) {
                document.getElementById('resultado').innerHTML = 'Buscando Noticias...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if (req.readyState == 4 && req.status == 200) {

                // Resposta retornada pelo busca.php
                var resposta = req.responseText;

                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById('resultado').innerHTML = "";
                document.getElementById('nomes').innerHTML = resposta;
                $( "#nomes" ).dialog( "open" );
            }
        }
        login2.value = "";
        login2.focus();
        req.send(null);
    }
}


// FUNÇÃO PARA EXIBIR NOTICIA
function exibirConteudo(id) {

// Verificando Browser
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamento com a id da noticia (método GET)
    var url = "exibir.php?id=" + id;

// Chamada do método open para processar a requisição
    req.open("Get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req.onreadystatechange = function () {

        // Exibe a mensagem "Aguarde..." enquanto carrega
        if (req.readyState == 1) {
            document.getElementById('conteudo').innerHTML = 'Aguarde...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if (req.readyState == 4 && req.status == 200) {

            // Resposta retornada pelo exibir.php
            var resposta = req.responseText;

            // Abaixo colocamos a resposta na div conteudo
            document.getElementById('conteudo').innerHTML = resposta;
        }
    }
    req.send(null);
}