$(document).ready(function(){
    console.log("Ready");
    var username;
    var password;

    //Takes username and tweet and sends it to controller to be saved
    $("#create").click(function(){
        twit = $("#twit").val();
        username = $('#username').text();
        console.log('Username: '+ username + ' Twit: ' + twit);
            $.ajax({
                url: 'tweeter/createPost', 
                type: "POST",
                data: {twit: twit, username: username},
                dataType: 'JSON',
                success: function(returnedData){
                    console.log('Success or Failure? ' + returnedData );                    
                }
            }); 
            $('#twit').val('');
            location.reload(true);

    });




});