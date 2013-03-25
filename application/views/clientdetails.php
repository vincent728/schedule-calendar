<?php
$this->load->view('header');
$this->load->view('contents');
if($results->num_rows()>0){
    
    foreach ($results->result_array() as $rows) {
        
      $Clientname=$rows['clientname']; 
      $email=$rows['email'];

    } echo form_open('',array('name'=>'','class'=>'myform')).form_fieldset().
            '<ul>'.
             '<li>'.
             form_label('client name').form_input(array('name'=>'','value'=>$rows['clientname'],'readonly'=>'readonly')).'<li>'.
             form_label('emai').form_input(array('name'=>'','value'=>$email,'readonly'=>'readonly')).'</li><li>'.
             form_label('phone #(1)').form_input(array('name'=>'','value'=>$rows['phone_one'],'readonly'=>'readonly')).'</li><li>'.
             form_label('phone #(2)').form_input(array('name'=>'','value'=>$rows['phone_two'],'readonly'=>'readonly')).'</li><li>'.
            
             form_label('Directions').  form_textarea(array('name'=>'','value'=>$rows['directions'],'readonly'=>'readonly')).
              '</li></li>'.
            '</ul>'.
            form_fieldset_close().
            form_close();
}
else{
    
}

$this->load->view('footer');
?>
