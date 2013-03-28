<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
	<div>
		
            <!--..allow menus according to credentials.-->
            
               <?php
               
                if($this->ion_auth->is_admin()==TRUE){
                ?>
                 <a href='<?php echo site_url('examples/clients_management')?>'>Clients</a> |
                <a href='<?php echo site_url('examples/schedule')?>'>Schedule</a> |
<!--                <a href='<?php echo site_url('examples/user_groups')?>'>User groups</a> |
                <a href='<?php echo site_url('auth/create_user')?>'>Create users</a> |-->
<!--                <a href='<?php echo site_url('examples/user_management')?>'>system users</a> |--->
                
                <a href='<?php echo site_url('auth/logout')?>'>logout</a>      
            
                <?php    
                }elseif($this->ion_auth->is_normaluser()==TRUE){
                ?>
                <a href='<?php echo site_url('examples/clients_management')?>'>Clients</a> |
                <a href='<?php echo site_url('examples/schedule')?>'>Schedule</a> >|
                <a href='<?php echo site_url('auth/logout')?>'>logout</a>  
                <?php 
                }
               
               
               
               ?>
		
                
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
