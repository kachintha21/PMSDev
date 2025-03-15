$(document).ready(function () {
        var $T = jQuery.noConflict();

    $T("#project_no_tct").select2({
        ajax: {
            url: "../controllers/getJobData.php",
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