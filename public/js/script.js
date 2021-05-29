$('#gender').on('change', function(){
    $('#gender-opt').remove();
})

$('#roles').on('change', function(){
    $('#roles-opt').remove();
})

$('#category').on('change', function(){
    $('#category-opt').remove();
})

$('#cover').dropify([
]);

$(window).on('load', function () {
    $("#preloader").fadeOut("slow");
});
