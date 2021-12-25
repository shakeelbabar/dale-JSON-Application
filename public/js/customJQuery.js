$('#exampleInputFile').on('change', function() {
    //get the file name
    var fileName = $(this).val();
    // //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
});



// $(document).on('submit', 'form.AjaxForm', function() {            
//     $.ajax({
//         url     : $(this).attr('action'),
//         type    : $(this).attr('method'),
//         dataType: 'json',
//         data    : $(this).serialize(),
//         success : function( data ) {
//                      alert('Submitted');
//         },
//         error   : function( xhr, err ) {
//                      alert('Error');     
//         }
//     });    
//     return false;
// });