window.onload = function(){
    $(".loader-wrapper").fadeOut("slow");

    $("#header").load("/cyberhydra/Page/header.php");
    $("#footer").load("/cyberhydra/Page/footer.html");

    $("#torn-InscAct").load("/cyberhydra/Torneo/PHP/mostTorn.php");
};

function Modal(numero_mensaje){
    var numero = numero_mensaje;

    $.ajax({
        url: "/cyberhydra/Modal/modal.php",
        type: "POST",
        data: { numero_mensaje: numero},
        success: function (data) {
            document.getElementById("modal").innerHTML = data;
        }
    });
}