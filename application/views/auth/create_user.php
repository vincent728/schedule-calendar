<?php 
$this->load->view('header'); 
$this->load->view('contents'); 
?>

<h1><?php echo lang('create_user_heading');?></h1>
<li><?php echo lang('create_user_subheading');?></li>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user",array('class'=>'myform'));?>
<?php echo form_fieldset();?>
   
<ul>
    <li>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </li>

      <li>
            <?php echo lang('create_user_lname_label', 'first_name');?> <br />
            <?php echo form_input($last_name);?>
      </li>

      <li>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </li>

      <li>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </li>

      <li>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </li>

      <li>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </li>

      <li>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </li>


      <li><?php echo form_submit('submit', lang('create_user_submit_btn'));?></li>
    
    
    
    
    
    
</ul>
      
<?php echo form_fieldset_close();?>
<?php echo form_close();
$this->load->view('header'); 
?>