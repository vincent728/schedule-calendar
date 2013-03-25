<?php 
$this->load->view('header'); 
$this->load->view('contents'); 
?>

<h1><?php echo lang('create_group_heading');?></h1>
<li><?php echo lang('create_group_subheading');?></li>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group",array('class'=>'myform'));?>
<?php echo form_fieldset();?>
     
      <ul>
          
           <li>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </li>

      <li>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </li>

      <li><?php echo form_submit('submit', lang('create_group_submit_btn'));?></li>
          
          
          
      </ul>
<?php 

  echo form_close();
 echo form_fieldset_close();
$this->load->view('footer');
?>