$(function(){
            $("#theform").submit(function(e) {
                        // upon clicking submit bttn on form
                                 
                        // assign input data to appropriate variables 
                        var url = "phpServerSideScript.php"; // the script where you handle the form input.
                        var appid=$('.example').data('appid'); 
                        var firstname = $('#firstname').val();
                        var lastname = $('#lastname').val();
                        var age = $('#age').val();
                        // serialize variables into json format to pass to web service script
                        var data = {'appid':appid, 'firstname':firstname, 'lastname':lastname, 'age':age, 'func':'save_form'};

                        // execute AJAX request using $.ajax
                        $.ajax({
                                    type: "POST",
                                    url: url,
                                    cache: false,
                                    data: data, 
                                    success: function(data){
                                                
                                                // upon success
                                                alert(data); // show response from the php script.
                                                $.each(data, function( key, value ) {
                                                            alert( key + ": " + value );
                                                });
                                    },
                                    error: function(request, status, error){
                                                alert(request.responseText);
                                    }
                        });

                        return false; // avoid to execute the actual submit of the form.
            });

});