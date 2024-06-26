<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Data Search in Codeigniter using Ajax JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />
        <h2 align="center">Live Data Search in Codeigniter using Ajax JQuery</h2><br />
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
            </div>
        </div>
        <br />
        <div id="result"></div>
    </div>
    <div style="clear:both"></div>
    <br />
    <br />
    <br />
    <br />
</body>
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
               url: "<?php echo base_url(); ?>confuse" ,
               method :"POST",
               data:{query:query},
               success : function(data){
                $('#result').html(data);
               }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });

</script>

</html>
