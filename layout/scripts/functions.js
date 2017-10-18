/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {
    AOS.init({
        easing: 'ease-out-in',
        duration: 800
    });
});

function enviar() {
    document.filtros.submit();
}

function imprimir() {
    var di = document.filtros.di.value;
    var df = document.filtros.df.value;
    var comentario = document.filtros.comentario.value;
    window.open("printestado.php?di=" + di + "&df=" + df + "&comentario=" + comentario, "_blank");
}

