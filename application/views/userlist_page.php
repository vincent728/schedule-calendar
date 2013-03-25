<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->load->view('header');
$this->load->view('contents');

if(!empty($message)||!is_null($message)){
    echo $message;
}
$out='';
$counter=0;
foreach ($users as $value) {
  $counter++;
  
$out.='<tr><td>'.$counter.'</td>
      <td>'.$value->first_name.'</td>
       <td>'.$value->last_name.'</td>
       <td>'.$value->username.'</td>
       <td>'.$value->email.'</td>
       <td>'.$value->phone.'</td>
       <td>'.$value->company.'</td>
    
       </tr>';
} echo '<table width="" border="0" class="mytable">'.$out.'</table>';

$this->load->view('footer');
?>
