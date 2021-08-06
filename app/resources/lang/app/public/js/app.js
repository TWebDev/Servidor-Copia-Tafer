
$(document).ready(function () {
    $(".btn - update - item").on('click', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        var href = "{{route('carritoAct', $item -> id) }}";
        var cant = $("#Producto_" + id).val();

        window.location.href = href + "/" + cant;
    });
});