$(function () {
    $("#successMsg").hide();
    $("#errorMsg").hide();
    $("form#data").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);        
            $.ajax({
                url: 'api/index.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (output) {
                    console.log(output);
                    if(output == 'ok'){
                        $('#data').trigger("reset");
                        $("#successMsg").show();
                    }else{
                        $("errorMsg").show();
                    }
                }
            });
        
    });
});