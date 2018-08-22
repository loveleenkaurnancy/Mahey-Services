/**
 * Created by admin on 04/09/18.
 */
$('.selectpicker').on('change', function () {
    $.ajax({
        type: 'POST',
        url: 'getClass.php',
        data: 'id=' + $(this).val(),
        success: function (response) {
            console.log(response);
            $('#ccdata').html(response)
        }
    });
});

$('.stype').on('change', function () {
    $.ajax({
        type: 'POST',
        url: 'getSubject.php',
        data: 'id=' + $('#cblock').val() + '&prod=' + $('#ccdata').val(),
        success: function (response) {
            console.log(response);
            $('#scdata').html(response)
        }
    });
});