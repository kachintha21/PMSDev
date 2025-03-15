$(document).ready(function () {

        var $T = jQuery.noConflict();

    $T("#pattern_name").select2({
        ajax: {
            url: "../controllers/selectReport.php",
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