//AJAX SEARCH PATIENTS
var searchPatient       = document.getElementById("search_patient_table");
var searchPermission    = document.getElementById("search_permission_table");

if(searchPatient){
    searchPatient.addEventListener("keyup", liveSearch);
    function liveSearch() {
        alert('radi');

        var search = document.getElementById("search_patient_table").value;

        if(search != '' && search != null) {
            $.ajax({
                url: 'pacijenti/ajax',
                type: 'GET',
                data: {varSearch:search},

                success: function(response) {
                    renderPatientsTable(response);
                },
                error: function(response) {
                    console.log('Error', response);
                }
            })
        }

    }

    function renderPatientsTable(response) {
        var patients_table  =   document.getElementById('patients_table_body');
        var row             =   patients_table.childNodes[1];
        var route           =   row.dataset.route;
        route               =   route.substring(0, route.lastIndexOf('/'));


        patients_table.innerHTML    =   "";

        response.forEach(function(element) {
            var row = patients_table.insertRow(0);

            var btnProfile = "<a href=" + route + '/' + element.id + "  class = 'btn btn-primary' >Profil</a>";
            var btnDelete  = "<a href='#' class = 'btn btn-danger ml-1 openModal' data-id = '" + element.id + "' data-toggle = 'modal' data-target='#confirm-delete-" + element.id + "'>Izbriši</a>";

            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            // Add some text to the new cells:
            cell1.innerHTML = element.name;
            cell2.innerHTML = element.email;
            cell3.innerHTML = btnProfile+" "+btnDelete;
        });
    }
}




//AJAX SEARCH PERMISSIONS
if(searchPermission){
    searchPermission.addEventListener("keyup", liveSearchPermission);

    function liveSearchPermission() {

        var search = document.getElementById("search_permission_table").value;

        if(search != '' && search != null) {
            $.ajax({
                url: 'dozvole/ajax',
                type: 'GET',
                data: {varSearch:search},

                success: function(response) {
                    renderPermissionTable(response);
                },
                error: function(response) {
                    console.log('Error', response);
                }
            })
        }

    }

    function renderPermissionTable(response) {
        var permission_table    =   document.getElementById('permission_table_body');
        var row                 =   permission_table.childNodes[1];
        var route               =   row.dataset.route;
        route                   =   route.substring(0, route.lastIndexOf('/'));


        permission_table.innerHTML    =   "";

        response.forEach(function(element) {
            var row = permission_table.insertRow(0);

            var btnProfile = "<a href=" + route + '/' + element.id + "  class = 'btn btn-primary' >Profil</a>";
            var btnDelete  = "<a href='#' class = 'btn btn-danger ml-1 openModal' data-id = '" + element.id + "' data-toggle = 'modal' data-target='#confirm-delete-" + element.id + "'>Izbriši</a>";

            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            // Add some text to the new cells:
            cell1.innerHTML = element.description;
            cell2.innerHTML = element.email;
            cell3.innerHTML = btnProfile+" "+btnDelete;
        });
    }


}
