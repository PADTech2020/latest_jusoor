/**
 * Created by Abdulhamid on 11/16/2021.
 */
 $(document).ready(function(){
    var $survey_id = document.getElementById("survey_id").value;
    var $cookie_name = 'survey' + $survey_id;
    
    function getcookie(cookiename){
        var cookiestring  = document.cookie;
        var cookiearray = cookiestring.split(';');
        for(var i =0 ; i < cookiearray.length ; ++i){ 
            if(cookiearray[i].trim().match('^'+cookiename+'=')){ 
                return cookiearray[i].replace(`${cookiename}=`,'').trim();
            }
        }
        return null;
    }

    if( ! getcookie ($cookie_name) ){
        $('#surveyModal').modal('show');
    }
  });



$('#surveyModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus');
})
$("#survey-success-message").hide();

$("#survey-btn").click(function () {

    var $form = $("#survey-form");

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    request = $.ajax({
        url: "/api/v2/submit-survey",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        $form.hide();
        document.cookie='survey'+document.getElementById("survey_id").value + "=" + document.getElementById("survey_id").value;
        $("#survey-success-message").show();
       setTimeout(function () {
           $('#surveyModal').modal('hide');
       },5000);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
});