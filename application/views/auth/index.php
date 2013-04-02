<?php 
$this->load->view('header'); 
$this->load->view('contents'); 
?>

<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table class="mytable">
	<tr class="">
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, $attrib=img(array('src'=>'icons/edit.png','title'=>'edit'))) ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', $attrib=img(array('src'=>'icons/add-user.png','title'=>lang('index_create_user_link'))))?> | <?php echo anchor('auth/create_group', $attrib=img(array('src'=>'icons/group.png','title'=>lang('index_create_group_link'))))?>|
   <?php if($this->ion_auth->logged_in()==TRUE && $this->ion_auth->in_group($group=1)){
       echo anchor('auth/logout', lang('index_logout'));
   }?>
</p>
<?php
$this->load->view('footer'); 
?>