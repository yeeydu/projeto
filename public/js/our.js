
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
    //const mediaq = window.matchMedia('(max-width: 630px)')
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

    // sort columns
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

    // Submit form when category change
    $("#category_id").on('change',function (){
        var categoryChange = 1;
        $("#category_change").val(categoryChange);
        $("#category_change_create").val(categoryChange);
        $("#category_video_change").val(categoryChange); //
        $("#category_change_vid_create").val(categoryChange);
        if( $("#create_pic").val() == 1){
            $("#picCreate").submit();
        }
        else if( $("#create_video").val() == 1){
            $("#videoCreate").submit();
        }
        else if( $("#edit_vid").val() == 1){
            $("#videoEdit").submit();
        }
        else{
            $("#picEdit").submit();
        }


        /*$.get("/admin/fotografias/query?category_id=" + category_id_value, function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
            window.location.href = "/admin/fotografias/" + pic_id + "/edit?category_id=" + category_id_value
        */

        }
    )
// Function to update pack price with extras
        var total = 0;

    $('input:checkbox').change(function ()
    {
        var totalExtra = 0;
        var packPrice = isNaN(parseFloat($("#packValue").val())) ? 0 : parseFloat($("#packValue").val());
        $('input:checkbox:checked').each(function(){ // iterate through each checked element.
            //console.log(JSON.parse($(this).val()).price);
            totalExtra += isNaN(parseFloat(JSON.parse($(this).val()).price)) ? 0 : parseFloat(JSON.parse($(this).val()).price);

        });

        total = totalExtra + packPrice;
        $("#total_sum_value").html(total);
        $("#total_price").val(total);

    });
//-------------//

    /* date check*/
    var today = new Date().toLocaleDateString()
    var dateErro = 0;
    $("#datePic").change(function ()
        {
            var dateChoose = new Date($("#datePic").val()).toLocaleDateString();
            if (dateChoose < today){
                $("#errorDate").html('Data inválida!');
                dateErro = 1;
            }
            console.log(dateErro);
        }

    )



    //

});




/*if (selectedDate < today) {
    $("#errorDate").html('Selecione uma data futura');
}*/



