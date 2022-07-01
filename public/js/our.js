
/* mostrar alert de confirmação de eliminação de um registo*/
$('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Tem a certeza que pretende apagar este registo?`,
        text: "Se o eliminar não o poderá recuperar!",
        icon: "warning",
        buttons: ["Não", "Sim"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});
/* mostrar alert de confirmação de edição de um registo*/
$('.show_confirm_edit').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Tem a certeza que pretende editar este registo?`,
        icon: "info",
        buttons: ["Não", "Sim"],
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});
/* mostrar alert de confirmação de edição de um registo*/
$('.show_confirm_create').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Tem a certeza que pretende criar este registo?`,
        icon: "info",
        buttons: ["Não", "Sim"],
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

    const mediaQuery = window.matchMedia('(max-width: 960px)')
    const mediaq = window.matchMedia('(max-width: 630px)')
    function handleTabletChange(mediaQuery,mediaq) {
        // Check if the media query is true
        if (mediaQuery.matches) {
            if(!($('#wrapper').hasClass('toggled'))){
                $('#media').removeClass('media-content-true');
            }
            else{
                $('#wrapper').removeClass('toggled');
            }

        }
    }
    // Register event listener
    mediaQuery.addListener(handleTabletChange)
    // Initial check
    handleTabletChange(mediaQuery)

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if ($('#wrapper').hasClass('toggled')) {
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
    function checkWrapperIsOpen(){
        if ($('#wrapper').hasClass('toggled')) {
            $('#media').addClass('media-content-true');
        }
        else{
            $('#media').removeClass('media-content-true');
        }
    }

    setInterval(checkWrapperIsOpen, 10);

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });

    //Search funtion
    $("#myFilter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#listTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    /* sort columns*/
    $(".sort").click(function(){
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc){rows = rows.reverse()}
        for (var i = 0; i < rows.length; i++){table.append(rows[i])}
    })
    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }
    function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
    //-----------


});
