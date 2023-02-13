var toolbarOptions = [['bold', 'italic'], ['link', 'image']];
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: toolbarOptions
    }
});




/*

//конвертирование HTML в Delta и вставка и quill
const value = '<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAGFBMVEUATP////8AAABhYWEAT/9dXV2MjIwAU/+QCMnqAAABSElEQVR4nO3PgU3DUBTAwELyk/03ZgFAaqoqftV5At/j69N73D3w9gjnRzg/wvkRzo9wfoTzI5wf4fwI50c4P8L5Ec7vH+Gxtimt45Jwfc9pXRJud28/0Ub4p/Dc+50vCfdHv52QMB8hYT9Cwn6EhP0ICfsREvYjJOxHSNiPkLAfIWE/QsJ+hIT9CAn7ERL2IyTsR0jYj5CwHyFhP0LCfoSE/QgJ+xES9iMk7EdI2I+QsB8hYT9Cwn6EhP0ICfsREvYjJOxHSNiPkLAfIWE/QsJ+hIT9CAn7ERL2IyTsR0jYj5CwHyFhP0LCfoSE/QgJ+xES9iMk7EdI2I+QsB8hYT9Cwn6EhP0ICfsREvZ7TXju/c6XhFMi/L119/YTrUvCY21TWscl4YdEOD/C+RHOj3B+hPMjnB/h/AjnRzg/wvkRzo9wfp8v/AH8bHMRAs8s+gAAAABJRU5ErkJggg=="></p><p>This is a continue of the text</p><p><br></p><p>`</p>'
const delta = quill.clipboard.convert(value)
quill.setContents(delta, 'silent')

*/



// Для Ajax
jQuery( 'form[name="contact-me"]' ).on( 'submit', function() {
    var form_data = jQuery( this ).serializeArray();
    
    // Here we add our nonce (The one we created on our functions.php. WordPress needs this code to verify if the request comes from a valid source.
    form_data.push( { "name" : "security", "value" : ajax_nonce } );
 
    // Here is the ajax petition.
    jQuery.ajax({
        url : ajax_url, // Here goes our WordPress AJAX endpoint.
        type : 'post',
        data : form_data,
        success : function( response ) {
            // You can craft something here to handle the message return
            alert( response );
        },
        fail : function( err ) {
            // You can craft something here to handle an error if something goes wrong when doing the AJAX request.
            alert( "There was an error: " + err );
        }
    });
     
    // This return prevents the submit event to refresh the page.
    return false;
});




jQuery("#home-form").on("submit",function() {    
    jQuery("#processing_ql").val(quill.root.innerHTML);
})

jQuery(window).load(function() {    
    const delta = quill.clipboard.convert(jQuery('#prev_postcontainer').html())
    quill.setContents(delta, 'silent')
});

