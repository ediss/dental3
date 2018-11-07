var dateAppointment     = document.getElementsByName("date-appointment");
var datePayment         = document.getElementsByName("date-payment");
var updatePermission    = document.getElementsByName("update-permission");
var deletePermission    = document.getElementsByName("delete-permission");
var updatePatient       = document.getElementsByName("update-patient");
var updateAdmin         = document.getElementsByName("admin_update");



//AJAX UPDATE PERMISSIONS
$(document).on("click", ".openModal", function () {
    var id = $(this).data('id');

    $(updatePermission).click(function(e) {
        $('#exampleModal-'+id).modal('hide');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var description = document.getElementById('description_'+id).value;
        var permission  = document.getElementById('permisssion_name_'+id).value;

        $.ajax({
            method      :   'POST',
            url         :   'dozvole/update',
            data        :   {varPermission:permission, varDescription:description, varHiddenId:id},
            beforeSend  :   function (xhr) {
                // Function needed from Laravel because of the CSRF Middleware
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(response) {
                console.log(response);
                document.getElementById("success-messages").style.display = "block";
                $('#success-messages').html('Uspešno ste promenili informacije o dozvoli '+response.permission);
            },
            error: function(response) {
                console.log('Error', response);
            }

        })

        e.preventDefault();
    });

});
//END AJAX UPDATE PERMISSIONS


//AJAX UPDATE PATIENTS
$(document).on("click", ".openModal", function () {
    var id = $(this).data('id');

    $(updatePatient).click(function(e) {

        $('#exampleModal-'+id).modal('hide');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var patient_name    = document.getElementById('username_'+id).value;
        var patient_email   = document.getElementById('email_'+id).value;

        $.ajax({
            method      :   'POST',
            url         :   'pacijenti/update',
            data        :   {varPatientName:patient_name, varPatientEmail:patient_email, varHiddenId:id},
            beforeSend  :   function (xhr) {
                // Function needed from Laravel because of the CSRF Middleware
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(response) {
                console.log(response);
                document.getElementById("success-messages").style.display = "block";
                $('#success-messages').html('Uspešno ste promenili informacije o korisniku');
            },
            error: function(response) {
                console.log('Error', response);
            }

        })

        e.preventDefault();
    });

});
//END AJAX UPDATE PATIENTS

//AJAX UPDATE ADMINS
$(document).on("click", ".openModal", function () {
    var id = $(this).data('id');

    $(updateAdmin).click(function(e) {

        $('#exampleModal-'+id).modal('hide');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var admin_name    = document.getElementById('username_'+id).value;
        var admin_email   = document.getElementById('email_'+id).value;

        $.ajax({
            method      :   'POST',
            url         :   'admini/update',
            data        :   {varAdminName:admin_name, varAdminEmail:admin_email, varHiddenId:id},
            beforeSend  :   function (xhr) {
                // Function needed from Laravel because of the CSRF Middleware
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(response) {
                console.log(response);
                document.getElementById("success-messages").style.display = "block";
                $('#success-messages').html('Uspešno ste promenili informacije o korisniku');

            },
            error: function (xhr) {
                $('#error_message').html('');
                $.each(xhr.responseJSON.errors, function(key,value) {
                  $('#error_message').append('<div class="alert alert-danger">'+value+'</div>');
              });
             },

        })

        e.preventDefault();
    });

});
//END AJAX UPDATE ADMINS


//AJAX DELETE PERMISSIONS
$(document).on("click", ".openModal", function () {
    var id = $(this).data('id');

    $(deletePermission).click(function(e) {

        alert('radi');
        $('#confirm-delete-'+id).modal('hide');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method      :   'POST',
            url         :   'dozvole/brisanje',
            data        :   {varHiddenId:id},
            beforeSend  :   function (xhr) {
                // Function needed from Laravel because of the CSRF Middleware
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(response) {
                console.log(response);
                document.getElementById("success-messages").style.display = "block";
                $('#success-messages').html('Uspešno ste izbrisali dozvolu '+response.permission);

            },
            error: function (xhr) {
                $('#error_message').html('');
                $.each(xhr.responseJSON.errors, function(key,value) {
                  $('#error_message').append('<div class="alert alert-danger">'+value+'</div>');
              });
             },

        })

        e.preventDefault();
    });

});
//END AJAX DELETE PERMISSIONS

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

