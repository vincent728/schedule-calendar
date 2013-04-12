<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        
	<title>Courier Scheduler</title>
        <base href ="<?php echo base_url(); ?>" />
        <link href="css/default.css" rel="stylesheet"/>
        <script type='text/javascript' src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
                $('.table-calendar tr.days').click(function(){
                    day=$(this).find('.day_num').html();
                    //alert(day);
                });
            });
        
        </script>

</head>
<body>
