var dateAppointment     = document.getElementsByName("date-appointment");
var datePayment         = document.getElementsByName("date-payment");

$(document).on("click", ".openModal", function () {
    var id = $(this).data('id');

    $(doneService).change(function(){
        var service = document.getElementById("done-service_"+id).value;

        if(service == 'Da') {
            document.getElementById("notes_"+id).style.visibility= "visible";
            document.getElementById("files_"+id).style.visibility= "visible";

        }
        else {
            document.getElementById("notes_"+id).style.visibility = "hidden";
            document.getElementById("files_"+id).style.visibility = "hidden";

        }


    });
});


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

///
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
