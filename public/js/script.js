    var dateAppointment = document.getElementsByName("date-appointment");
    var datePayment     = document.getElementsByName("date-payment");

    $(dateAppointment).change(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var date = document.getElementById("date-appointment").value;

        $.ajax({
            url: '/ajaxAppointments',
            type: 'GET',
            data: {varDate:date},
            beforeSend: function (xhr) {
                // Function needed from Laravel because of the CSRF Middleware
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(response) {
                $('#appointments-table').html(response);
            },
            error: function(response) {
                console.log('Error', response);
            }
        })
    });



    $(datePayment).change(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var date = document.getElementById("date-payment").value;

        $.ajax({
            url: '/ajaxPayments',
            type: 'GET',
            data: {varDate:date},
            beforeSend: function (xhr) {
                // Function needed from Laravel because of the CSRF Middleware
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(response) {
                $('#payments-table').html(response);
            },
            error: function(response) {
                console.log('Error', response);
            }
        })
    });