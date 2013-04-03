	
            <!--..allow menus according to credentials.-->
            
               <?php
               
                if($this->ion_auth->logged_in()==TRUE && $this->ion_auth->in_group($group=2)){
                ?>
                 <a href='<?php echo site_url('examples/clients_management')?>'>Clients</a> |
                <a href='<?php echo site_url('examples/events_management')?>'>Event(s)</a> |   
                <a id="calendar"href='<?php echo site_url('calendar/index')?>'>Calendar</a> |   
                <a href='<?php echo site_url('auth/logout')?>'>logout</a>  |
              <?php    
                }if($this->ion_auth->logged_in()==TRUE && $this->ion_auth->in_group($group=1)){
                ?>
                <a href='<?php echo site_url('auth/index')?>'>System users</a> |               
                <a href='<?php echo site_url('examples/user_groups')?>'>User groups</a> 
                 <?php 
                }
              
               ?>
		