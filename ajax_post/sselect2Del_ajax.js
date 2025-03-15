$(document).ready(function () {
        var $T = jQuery.noConflict();

    $T("#dec_patt").select2({
        ajax: {
            url: "../controllers/select2getDataDel.php",
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