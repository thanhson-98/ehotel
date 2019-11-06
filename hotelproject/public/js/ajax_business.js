$(document).ready(function () {
    $(function () {
        $('#start-date').datetimepicker({
            format: 'YYYY-MM-DD hh:mm:ss',
        });
    });

    $(function () {
        $('#end-date').datetimepicker({
            format: 'YYYY-MM-DD hh:mm:ss',
        });
    });
});

