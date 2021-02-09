//if page completely loaded
$(window).on("load", function() {

    $("#modal-window-filter-cost-chart .button-ok").click(function(e) {
        
        $("#modal-window-filter-cost-chart").hide();

        var filterYears = $('#modal-window-filter-cost-chart select[name="select-years"]').val();
    
        /* filterYear is an Array of Strings, I create a single string where each element is seperated by " | " */
        $('#section-cost-chart .filter-years').html(filterYears.join(" | "));
        
        loadDiagramPie();

    });

});