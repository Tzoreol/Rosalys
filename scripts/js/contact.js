$(document).ready(function(){
    $('#send').click(function() {
        var subject = $('#subject').val();
        var message = $('#message').val();
        var receiver = $('#receiver').val();

        if(subject === "" || message === "") {
            $("#error").text("Merci de remplir tous les champs");
            $('#error').slideDown('slow');
        } else {
            $.ajax({
                url: "/Rosalys/scripts/ajax/sendEmail.ajax.php",
                statusCode: {
                    404: function () {
                        $("#error").text("Une erreur est survenue");
                        $('#error').slideDown('slow');
                    }
                },
                method: 'POST',
                data: {
                    receiver: receiver,
                    subject: subject,
                    message: message
                },
                success: function (result) {
                    $("#success").text("Le message a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s");
                    $('#success').slideDown('slow');
                }
            });
        }
    });
});
