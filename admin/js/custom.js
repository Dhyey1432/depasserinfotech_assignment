function readURL(input) {
    if (input.files && input.files[0]) {
        $("#blah").show();$("#image_lable").hide();var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).width(150).height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#select_country_create_new").change(function(){
    var country_id = $("#select_country_create_new").val();
    var ajax_url = 'ajax/ajax_state.php';
    $.ajax({
        type: "POST",
        url: ajax_url,
        data: {country_id:country_id},
        success: function(response){
            var state_data = jQuery.parseJSON(response);
            var html_str = '';
            if (state_data.length) {$("#select_state").html('')}
            for(var i=0 ; i < state_data.length ; i++ )
            {
                html_str += '<option value="'+ state_data[i].id +'">' + state_data[i].name  + '</option>';
            }
            $("#select_state").html(html_str);
        },
        error: function(response) {
            debugger ;
        }
    });
});
$("#select_state").change(function(){
    var state_id = $("#select_state").val(); 
    var ajax_url = 'ajax/ajax_cities.php';
    $.ajax({
        type: "POST",
        url: ajax_url,
        data: {state_id:state_id},
        success: function (response) {
            var cities_data = jQuery.parseJSON(response);
            if (cities_data.length) {
                $("#select_cities").html('')
            }
            var html_str = '';
            for(var i = 0 ; i < cities_data.length ; i++)
            {
                html_str += '<option value="'+ cities_data[i].id +'">' + cities_data[i].name  + '</option>';
            }
            $("#select_cities").html(html_str);
        },
        error : function (response) {

        }
    });
});