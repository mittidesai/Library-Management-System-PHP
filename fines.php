<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fines</title>
        <script src="jquery-1.7.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <script>
            $(document).ready(function(){
                refreshFines();
                $("#upfines").on('click', function() {
                    refreshFines();
                });
                function refreshFines(){
                    $.ajax({
                        url: "refreshfines.php",
                        type: 'GET',
                        success: function(output){
                            console.log(output);
                            output = JSON.parse(output.replace(/(<([^>]+)>)/ig,""));
                            var html = "<table class='table'>";
                            html+="<tr>";
                                html+="<td>Card_No</td>";
                                html+="<td>First Name</td>";
                                html+="<td>Last Name</td>";
                                html+="<td>Fine</td>";
                                html+="<td>Action</td>";
                            html+="</tr>";
                            for(var i=0; i<output.length; i++){
                                html+="<tr>";
                                    html+="<td>"+output[i].cno+"</td>";
                                    html+="<td>"+output[i].fname+"</td>";
                                    html+="<td>"+output[i].lname+"</td>";
                                    html+="<td>$"+output[i].fine+"</td>";
                                    html+="<td><div class='pay btn btn-success' id="+output[i].cno+">Pay</div></td>";
                                html+="</tr>";
                            }
                            html+="</table>";
                            $("#fineHolder").html(html);
                        },
                        error: function(x, y, z){
                            console.log(x, y, z);
                        }
                    });
                }
                $(".pay").live('click', function() {
                    confirm("Are you sure to pay the fine for card no "+$(this).attr('id')+"?");
                });
                 
                
            });
        </script>
    </head>
    <body>

        <center class="row">
            <h1>Fines</h1>
            <input type="submit" name="upfines" class="button" value="Refresh Fines" id="upfines">    
        </center>
        <br>
        <div class="row" id="fineHolder"></div>
    </body>
</html>
