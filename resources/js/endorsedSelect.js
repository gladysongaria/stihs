// // File: resources/js/endorsedSelect.js
// $(document).ready(function(){
//     $('#endorseTypeSelect').change(function(){
//         var selectedValue = $(this).val();
//         var url = '';

//         if (selectedValue === 'facility') {
//             url = '/get-facilities'; // Define the URL for fetching facilities
//             $('#endorsedToLabel').text('Facility');
//         } else if (selectedValue === 'teacher') {
//             url = '/get-users'; // Define the URL for fetching teachers
//             $('#endorsedToLabel').text('user');
//         }

//         $.ajax({
//             url: url,
//             type: 'GET',
//             success: function(response){
//                 var options = '<option value="" disabled selected>Select ' + selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1) + '</option>';
//                 for(var i = 0; i < response.length; i++){
//                     options += '<option value="'+ response[i].id +'">'+ response[i].name +'</option>';
//                 }
//                 $('#endorsedToSelect').html(options);
//             }
//         });
//     });
// });
