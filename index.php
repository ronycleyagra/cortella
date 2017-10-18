<!DOCTYPE html>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport">
        <title>PALESTRA CORTELLA</title>
        <!-- styles -->
        <link href="./layout/styles/login.css" rel="stylesheet">
        <link href="./layout/styles/bootstrap.min.css" rel="stylesheet">
        <link href="https://file.myfontastic.com/25femE7xeK8GoTXAmZ4zwY/icons.css" rel="stylesheet">
        <link href="./layout/styles/aos.css" rel="stylesheet">
        <!-- scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="./layout/scripts/aos.js"></script>
        <script src="./funcs.js"></script>
        <!-- código do modal dos nomes -->
        <link rel="stylesheet" href="./layout/styles/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- FIM: código do modal dos nomes -->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                AOS.init({
                    easing: 'ease-out-in',
                    duration: 800
                });
            });

            //adiciona mascara ao CPF
            function MascaraCPF(cpf) {
                if (!event)
                    event = window.event;
                if (mascaraInteiro(cpf) == false) {
                    event.returnValue = false;
                }
                return formataCampo(cpf, '000.000.000-00', event);
            }

            //valida numero inteiro com mascara
            function mascaraInteiro() {
                if (!event)
                    event = window.event;
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.returnValue = false;
                    return false;
                }
                return true;
            }

            //formata de forma generica os campos
            function formataCampo(campo, Mascara, evento) {
                var boleanoMascara;

                var Digitato = evento.keyCode;
                exp = /\-|\.|\/|\(|\)| /g
                campoSoNumeros = campo.value.toString().replace(exp, "");

                var posicaoCampo = 0;
                var NovoValorCampo = "";
                var TamanhoMascara = campoSoNumeros.length;
                ;

                if (Digitato != 8) { // backspace 
                    for (i = 0; i <= TamanhoMascara; i++) {
                        boleanoMascara = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                || (Mascara.charAt(i) == "/"))
                        boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == "(")
                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
                        if (boleanoMascara) {
                            NovoValorCampo += Mascara.charAt(i);
                            TamanhoMascara++;
                        } else {
                            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                            posicaoCampo++;
                        }
                    }
                    campo.value = NovoValorCampo;
                    return true;
                } else {
                    return true;
                }
            }



        </script>

        <script>
            $(function () {
                $("#nomes").dialog({
                    autoOpen: false,
                    width: 800,
                    show: {
                        effect: "fold",
                        duration: 100
                    },
                    hide: {
                        effect: "fold",
                        duration: 100
                    }
                });

            });
        </script>
    </head>
    <body class="main aos-all" onload="javascript: form1.login.focus();">
        <header class="header">
            <h1 data-aos="zoom-in"><img src="./layout/images/topoportela2.jpg" width="100%"></h1>
        </header>
        <main class="main" role="main">
            <div class="container">
                <table border="0" width="100%">
                    <tr>
                        <td width="50%">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-4">
                                    <p data-aos="zoom-in" style="color: #e08e0b; "><b>DIGITE O CPF:</b></p>
                                    <form method="post" name="form1" onsubmit="buscar(form1.login.value)">
                                        <input type="text" name="login" id="login" onKeyPress="MascaraCPF(form1.login);" 
                                               maxlength="14" >
                                        <button type="button" onclick="buscar(form1.login.value)">PESQUISAR</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td width="50%">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-4">
                                    <p data-aos="zoom-in" style="color: #e08e0b; "><b>DIGITE O NOME:</b></p>
                                    <!-- <form  data-aos="zoom-in" name="form2"> -->
                                        <input type="text" name="login2" id="login2" class="camponome" >
                                        <button type="button" onclick="buscar2(login2.value)" class="botaopesquisar">PESQUISAR</button>
                                    <!-- </form>  -->
                                </div>
                            </div>

                        </td>
                    </tr>
                </table>
                <script>

                    const inputEle = document.form1.login;
                    inputEle.addEventListener('keyup', function (e) {
                        var key = e.which || e.keyCode;
                        if (key == 13) { // codigo da tecla enter
                            // colocas aqui a tua função a rodar
                            buscar(document.form1.login.value);
                        }
                    });

                    jQuery('#login2').keypress(function (event) {

                        var keycode = (event.keyCode ? event.keyCode : event.which);
                        if (keycode == 13) {
                            buscar2(login2.value)
                            return;
                        }
                    });
                </script>
                <br>
                <div id="resultado"></div>
                <div id="nomes"></div>
            </div>
        </main>
    </body>
</html>
