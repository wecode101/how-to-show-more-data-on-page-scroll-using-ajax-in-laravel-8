<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <title>Wecode101 infinite scroll tutorial</title>
</head>
<body>
<div class="container">
    <h3 class="text-center mt-5">Laravel 8 infinite scroll using ajax</h3>
    <div id="post">
        <!-- include student-data file here -->
        @include('student-data')
    </div>
    <div class="load-data text-center" style="display:none">
        <i class="mdi mdi-48px mdi-spin mdi-loading"></i> Loading ...
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!-- script ajax that enable infinite scroll -->
<script>
    function loadMoreData(page)
    {
        $.ajax({
            url:'?page=' + page,
            type:'get',
            beforeSend: function()
            {
                $(".load-data").show();
            }
        })
            .done(function(data){
                if(data.html == ""){
                    $('.load-data').html("No more Posts Found!");
                    return;
                }
                $('.load-data').hide();
                $("#post").append(data.html);
            })
            // Call back function
            .fail(function(jqXHR,ajaxOptions,thrownError){
                console.log("Server not responding.....");
            });

    }
    //function for Scroll Event
    var page =1;
    $(window).scroll(function(){
        let val = $(window).scrollTop() + $(window).height();
        let rnd = Math.round(val);

        if(rnd >= $(document).height()){
            page++;
            loadMoreData(page);
        }
    });
</script>
</body>
</html>
