$(function(){ 
    $("#my_text_title").val("test");
    $("#submit_diray_button").click(function(){ 
        str_title   = $("#my_text_title").val();
        str_content = $("#my_text_content").val();
        $.post(
            "api/save.php",
            {
                content:    str_content,
                title:      str_title,
            },
            function(data,status){
                alert(data+status);
            }
        );
    }); 
}); 
