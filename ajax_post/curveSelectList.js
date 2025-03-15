$(document).ready(function () {
        var $T = jQuery.noConflict();

    $T("#curve_no_lpt").select2({
        ajax: {
            url: "../controllers/GetCurveList.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
})