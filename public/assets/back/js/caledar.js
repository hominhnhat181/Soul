    // create table cale  
    $('#datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
    });
    // custom fomat cale
    $('input[name="joined_date"]').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD'));
    });
    // cancel chosing
    $('input[name="joined_date"]').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    // get value
    $('input[name="joined_date"]').val('');
    if(request('joined_date'))
    $('input[name="joined_date"]').value("{{request('joined_date')}}");
    endif