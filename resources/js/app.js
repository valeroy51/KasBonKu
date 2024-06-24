import './bootstrap';

// search product
$(document).on('keyup', function(e){
    e.preventDefault();
    let search_string = $('#search').val();
    console.log(search_string);
})