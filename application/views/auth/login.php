<?php
$this->load->view('header');
$this->load->view('contents');
?>
<h1><?php echo lang('login_heading'); ?></h1>
<li><?php echo lang('login_subheading'); ?></li>

<div id="infoMessage"><?php echo $message; ?></div>

<?php echo form_open("auth/login", array('class' => 'myform')); ?>
<?php echo form_fieldset() ?>

<ul>
    <li>
        <?php echo lang('login_identity_label', 'indentity'); ?>
        <?php echo form_input($identity); ?>
    </li>

    <li>
        <?php echo lang('login_password_label', 'password'); ?>
        <?php echo form_input($password); ?>
    </li>

    <li>
        <?php echo lang('login_remember_label', 'remember'); ?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
    </li>


    <li><?php echo form_label(); echo form_submit('submit', lang('login_submit_btn')); ?></li>


</ul>

<?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>

<li><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></li>

<?php $this->load->view('footer'); ?>