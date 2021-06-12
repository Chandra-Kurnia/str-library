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

$('#keyword').on('keydown', function(){
    console.log($(this).val());
    // $('#table').load('/books/adventure/?keyword=' + $('#keyword').val());
});
