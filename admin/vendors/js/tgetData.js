/**
 * Created by admin on 04/10/18.
 */

/**
 * Call tBlock method to get Class List
 */
$('.selectpicker').on('change', function () {
    $.ajax({
        type: 'POST',
        url: 'tGetData.php',
        data: 'tBlock=' + $(this).val(),
        success: function (response) {
            //console.log(response);
            $('#ccdata').html(response)
        }
    });
});

/**
 * Call tClass method to get Subject List
 */
$('.stype').on('change', function () {
    $.ajax({
        type: 'POST',
        url: 'tGetData.php',
        data: 'ttBlock=' + $('#cblock').val() + '&tClass=' + $('#ccdata').val(),
        success: function (response) {
            //console.log(response);
            $('#scdata').html(response)
        }
    });
});

/**
 * Call tStudent method to get Student MST Marks List
 */
$('.stuCall').on('change', function () {
    $.ajax({
        type: 'POST',
        url: 'tGetData.php',
        data: 'tStuClass=' + $('#ccdata').val(),
        success: function (response) {
            //console.log(response);
            $('#stuData').html(response)
        }
    });
});

/**
 * Call tStudent method to get Student Attendance List
 */
$('.stuAtnCall').on('change', function () {
    $.ajax({
        type: 'POST',
        url: 'tGetData.php',
        data: 'tAtnStuClass=' + $('#ccdata').val(),
        success: function (response) {
            //console.log(response);
            $('#stuAtnData').html(response)
        }
    });
});

function check(e)
{
    $(".check").prop('checked', $(e).prop('checked'));
    if ($(".check").is(':checked'))
    {
        $(".attend").val('Present');
        $(".check").val('Present');
    }
    else
    {
        $(".attend").val('Absent');
        $(".check").val('Absent');
    }
}

function dataUpdate(e)
{
    if ($(e).is(':checked'))
    {
        $(e).val('Present');
        $(e).next().val('Present');
    }
    else
    {
        $(e).val('Absent');
        $(e).next().val('Absent');
    }
}


