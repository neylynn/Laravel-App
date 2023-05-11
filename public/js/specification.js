$(document).ready(function() {
    $('#error').hide();
        $('#remove_specification').hide();
        var i = 0;

        $(document).on('click', '#add_specification', function () {
            i +=1;

            if (i > 0) {
                $('#remove_specification').show();
                $('#submit').prop("disabled", false);
            }

            $('#specification').append('<div id="specification'+i+'">')
                $("#specification"+i).append(
                    '<div class="col-sm-5">'+
                    '<input type="text" id="fieldname" name="fieldname[]" class="form-control" placeholder="Specification Name">'+
                '</div>'+
                    '<div class="col-sm-5">'+
                        '<input type="text" id="value" name="value[]" class="form-control" placeholder="Value">'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                        '<a href="#" id="add_specification" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i></a><a href="#" id="remove_specification" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-minus"></i></a>'+
                    '</div>'+
                '</div><br><br>');
        });

        $(document).on('click', '#remove_specification', function () {
            $('#specification'+i).remove();
            i -= 1;
            console.log(i);
        });

        if($('#specification_collection').val()) {
            var i = 0;
            var specification_collection = $('#specification_collection').val();
            var specification = JSON.parse(specification_collection);

            for (key in specification) {
                i += 1;
                var minus = '';
                if (i > 1) {
                    var minus = '<a href="#" id="remove_specification" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-minus"></i></a>';
                }
                if (specification.hasOwnProperty(key)) {
                    console.log(key + " = " + specification[key]);
                    $('#specification').append('<div id="specification'+i+'">')
                        $("#specification"+i).append(
                            '<div class="col-sm-5">'+
                            '<input type="text" id="fieldname" name="fieldname[]" value="'+key+'" class="form-control" placeholder="Specification Name">'+
                        '</div>'+
                            '<div class="col-sm-5">'+
                                '<input type="text" id="value" name="value[]" value="'+specification[key]+'" class="form-control" placeholder="Value">'+
                            '</div>'+
                            '<div class="col-sm-2">'+
                                '<a href="#" id="add_specification" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i></a>'+minus+
                            '</div>'+
                        '</div><br><br>');   
                }
            }

        }
})