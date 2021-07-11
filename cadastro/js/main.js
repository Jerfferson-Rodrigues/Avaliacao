$(function () {

    $('[actionBtn=delete]').click(function () {
        var r = confirm("Deseja excluir o registro?");
        if (r == true) {
            return true;
        } else {
            return false;
        }
    })

})