$(document).ready(function() {
    var url = $('#url').attr('data-url');

        if(!$('#categoryEvent').val()) {
            var category = $('#category').val();
            getSubCategory(url ,category);   
        }

        $(document).on('change', '#category', function () {
            var category_id = $(this).val();
            getSubCategory(url ,category_id)
         });


        function getSubCategory (url, category_id) {
            $.ajax({
                url: url + '?id=' + category_id,
                type:"GET",
                success:function(data){
                    console.log(data);
                    var options;
                    $.each( data, function( key, value ) {
                        options = options + '<option value="'+value.id+'">'+value.name+'</option>';
                    });
                    var skillhtml = '<div><select name="sub_category_id">'+options+'</select></div>';
                    $("#sub_category").html(skillhtml);
                 },
             });
        }
})