<?php 
$this->load->view('header'); 
$this->load->view('contents'); 
?>


<h1><?php echo lang('edit_user_heading');?></h1>
<li><?php echo lang('edit_user_subheading');?></li>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string(),array('class'=>'myform'));?>
<?php echo form_fieldset();?>

<ul>
     <li>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </li>

      <li>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </li>

      <li>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </li>

      <li>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </li>

      <li>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </li>

      <li>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </li>

	 <h3><?php echo lang('edit_user_groups_heading');?></h3>
	<?php foreach ($groups as $group):?>
	<label class="checkbox">
	<?php
		$gID=$group['id'];
		$checked = null;
		$item = null;
		foreach($currentGroups as $grp) {
			if ($gID == $grp->id) {
				$checked= ' checked="checked"';
			break;
			}
		}
	?>
	<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
	<?php echo $group['name'];?>
	</label>
	<?php endforeach?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <li><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></li>
    
    
</ul>

     
      
      
<?php echo form_fieldset_close();?>
<?php echo form_close();
 $this->load->view('footer');
?>
