<?php
$this->load->view('header');
$this->load->view('contents');
if($results->num_rows()>0){
    
    $form_out='';
    
    foreach ($results->result_array() as $rows) {
        
      $Clientname=$rows['clientname']; 
        
         
      if(!empty($rows['phone_one'])){
          $phone1='<li>'.form_label('phone #(1):').form_input(array('name'=>'','value'=>$rows['phone_one'],'readonly'=>'readonly')).'</li>';
      }else{
          $phone1='';
      }
      
       if(!empty($rows['phone_two'])){
          $phone2='<li>'.form_label('phone #(2) :').form_input(array('name'=>'','value'=>$rows['phone_two'],'readonly'=>'readonly')).'</li>';
      }else{
          $phone2='';
      }
      
      if(!empty($rows['phone_three'])){
          $phone3='<li>'.form_label('phone #(3) :').form_input(array('name'=>'','value'=>$rows['phone_three'],'readonly'=>'readonly')).'</li>';
      }else{
          $phone3='';
      }
     
      if(!empty($rows['contact_person'])){
          $contactperson='<li>'.form_label('Contact Person :').form_input(array('name'=>'','value'=>$rows['contact_person'],'readonly'=>'readonly')).'</li>';
      }else{
          $contactperson='';
      }
      
           
      if(!empty($rows['email'])|| is_null($rows['email'])){
          $email='<li>'.form_label('Email address :').form_input(array('name'=>'','value'=>$rows['email'],'readonly'=>'readonly')).'</li>';
      }else{
          $email='';
      }
      
      if(!empty($rows['exceptional_directions'])|| is_null($rows['exceptional_directions'])){
          $notes='<li>'.form_label('Notes :').form_textarea(array('name'=>'','value'=>$rows['exceptional_directions'],'readonly'=>'readonly')).'</li>';
      }else{
          $notes='';
      }
      $form_out.=$contactperson.$email.$phone1.$phone2.$phone3.$notes;

    } 
       
    echo form_open('',array('name'=>'','class'=>'myform')).form_fieldset('Event for'.  nbs(3).date('l, d-m-Y',strtotime($rows['date']))).
            '<ul>'.
             '<li>'.
              form_label('Client Name').form_input(array('name'=>'','value'=>$rows['clientname'],'readonly'=>'readonly')).'</li>'.
              $form_out.
             '<li>'. form_label('Directions').  form_textarea(array('name'=>'','value'=>$rows['directions'],'readonly'=>'readonly')).
              '</li>'.
              '</ul>'.
            form_fieldset_close().
            form_close();
}
else{
    
}

$this->load->view('footer');
?>
