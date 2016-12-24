$(document).ready(function(){
    $('#media').on('change', function(){
        if (typeof (FileReader) != "undifined") {
            var tmp = $('#tmp');
            tmp.empty();
            var reader = new FileReader();
            reader.onload = function(e){
                $("<img />", {
                    "src"  : e.target.result,
                    "class": "thumb-image",
                    "width": "100"
                }).appendTo(tmp);
            }
            tmp.show();
            reader.readAsDataURL($(this)[0].files[0]);
        }
    });
    $('#rm').on('click', '.thumb-image', function(){
        $(this).parent().remove();
    });
});