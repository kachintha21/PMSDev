$(document).ready(function () {
        var $T = jQuery.noConflict();

    $T("#pattern_no_pmt").select2({
        ajax: {
            url: "../controllers/curveData.php",
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