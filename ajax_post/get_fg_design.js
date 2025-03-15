$(document).ready(function () {
        var $T = jQuery.noConflict();

    $T("#fg_design_no_cmt").select2({
        ajax: {
            url: "../controllers/selectFGData.php",
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