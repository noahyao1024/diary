$(function(){ 
var myDate      = new Date();
var real_date   = myDate.toLocaleDateString();

    $("#my_text_title").val(real_date);
    $("#submit_diray_button").click(function(){ 
        str_title   = $("#my_text_title").val();
        str_content = $("#my_text_content").val();
        $.post(
            "api/save.php",
            {
                content:    str_content,
                title:      str_title
            },
            function(json_data,status){
                data = eval(json_data);
                console.log(data[0]);
                console.log(data);
            }
        );
    }); 
}); 
