$(document).ready(function () {
    $('#search-box').keyup(function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings("#result");
        if(inputVal.length){
            $.get("getMovie.php",{q:inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        }else{
            resultDropdown.empty();
        }
    });
    //set search input value on click
    $(document).on("click", "#result p", function(){
        $(this).parents("#search-box").val($(this).text());
        $(this).parent("#result").empty();
    });

    //filter search movies starts here
    $('.movie-filter').click(function(){
        var action = 'data';
        var lang = get_filter_text('lang');
        console.log(lang);
        var genre = get_filter_text('genre');
        console.log(genre);

        $.ajax({
            url:'filter.php',
            method:'POST',
            data:{action:action,lang:lang,genre:genre},
            success:function(response){
                $('.card-listing-wrapper').html(response);
            }
        });
    });

    function get_filter_text(text_id){
        var filterData=[];
        $('#'+text_id+':checked').each(function(){
            console.log($(this).val());
            filterData.push($(this).val());
        });
        return filterData;
    }
});