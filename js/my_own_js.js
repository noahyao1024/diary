$(function(){ 
    var myDate      = new Date();
    var real_date   = myDate.toLocaleDateString();
    $("#my_search_button").click(function(){ 
        query = $("#my_search_text").val();
        self.location='index.php?query='+query+"&pn=1&rn=10";
    });

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
            function(json_data,status) {
                data = eval(json_data);
                if (0 == data[0]) {
                    alert("恭喜，添加成功!");
                    $("#myModal").modal('hide');
                    location.reload();
                } else {
                    alert(data[1]);
                }
            }
            );
    }); 
}); 

function delete_diary(int_blog_id) {
    $.post(
            "api/delete.php",
            {
                blog_id: int_blog_id
            },
            function(json_data, status) {
                data = eval(json_data);
                if (0 == data[0]) {
                    alert("删除成功.");
                    location.reload();
                } else {
                    alert(data[1]);
                }
            }
          );
}
