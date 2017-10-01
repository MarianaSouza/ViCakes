$(document).ready(function() {
    $("#submit").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'name=' + name + '&email=' + email + '&message=' + message;
        if (name == '' || email == '' || message == '') {
            alert("Por favor preencha todos os campos");
        } else {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "contact_me.php",
                data: dataString,
                cache: false,
                success: function(result) {
                    $('#result').html("<div class='alert alert-success'>");
                    $('#result > .alert-success')
                        .append("<strong>"+result+"</strong>");
                    $('#result > .alert-success')
                        .append('</div>');                	

                    $("#name").val('');
        						$("#email").val('');
        						$("#message").val('');
                }
            });
        }
        return false;
    });
});
