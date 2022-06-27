/* Função para os cards*/
var card = document.getElementById("card-know-more")
function showText() {
    card.innerHTML = "Saber mais"
    card.style.display ='block'

}
function reset() {
    card.innerHTML = "";
    card.style.display ='none'

}
//--------------------

/* mostrar alert de confirmação de eliminação de um registo*/
$('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Tem a certeza que pretende apagar este registo?`,
        text: "Se o eliminar não o poderá recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});

$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = true;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });
});
