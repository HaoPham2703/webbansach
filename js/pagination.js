$(document).ready(function(){
    $(document).on('click', '.pagination li a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getData(page);
    });

    function getData(page){
        $.ajax({
            url: 'sanphammoinhat.php',
            type: 'GET',
            data: {page: page},
            success: function(response){
                $('.products').html(response);
            }
        });
    }
});
