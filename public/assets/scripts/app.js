$(document).ready(function() {



    $('#waybill_code').focus(function() {
        var lfrom = $('#lfrom').val();
        var lto = $('#lto').val();
        if (lfrom == "" || lto == "") {
            alert("Please fill the fields first");
            if (lfrom == "")
                $('#lfrom').focus();
            else
            if (lto == "")
                $('#lto').focus();
        } else {
            return true;
        }
    });

    $('#waybill_code').on('keyup', function(e) {

        var ln = $(this).val().length;
        var lf = $('#lfrom').val();
        var lt = $('#lto').val();
        if (ln == 6) {
            p = $(this).val();
            var code = $(this).val();
            $.post('search', {code: code, lf: lf, lt: lt}, function(data) {
                $('#content').html(data);
            });
        } else {

        }


    });

});

