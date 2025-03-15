$(document).ready(function () {
        var $T = jQuery.noConflict();

    $T("#design_no_crt").select2({
        ajax: {
            url: "../controllers/patternList.php",
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