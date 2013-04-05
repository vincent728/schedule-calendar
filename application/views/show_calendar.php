  <?php 
  $this->load->view('header');
   $this->load->view('contents');
   //check if is a logged user
   ?>
   
<div id="menu-wrapper">
    <?php
     if($this->ion_auth->logged_in()){
      $this->load->view('menu'); 
   }
   else{
       echo 'login'.  nbs(3).anchor('auth/login/',$attrib=img(array('src'=>'icons/login_2.png','title'=>'login')));
   }
    ?>  
</div>



   
   <?php
   
  echo $calendar_results;
  
   $this->load->view('footer');
  
  ?>
