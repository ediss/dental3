var chb = document.getElementsByName("checkboxvar[]");

$(chb).click(function(){
    //ovde ide kod za pokupljanje vrednosti i slanje na php
    //alert( "Handler for .click() called." );

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var podaci = $("#appointmentForm").serializeArray();

    var patient = document.getElementById('id_patient');
    var service = document.getElementById('id_service');
    var term = document.getElementById('id_term');
    var doctor = document.getElementById('id_doctor');

    var patientData = patient.dataset.patientid;
    var serviceData = service.dataset.serviceid;
    var termData    = term.dataset.term;
    var doctorData  = doctor.dataset.doctor;

    console.log(termData);

    $.ajax({
        url: '/doktor/test',
        type: 'POST',
        data: {podaci, myname:'edis', patient:patient},
        dataType: 'json',
        beforeSend: function (xhr) {
            // Function needed from Laravel because of the CSRF Middleware
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(response) {
            console.log('uspeh',response);
            //alert(data.data);
        },
        error: function(response) {
            console.log('Error', response);
        }
    })
});