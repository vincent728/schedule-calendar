<?php

class Events_model extends CI_Model {
    /*
     * @method :load today's date and respected events
     * @param :year month
     * @return calendar
     * 
     * */

    public function todaysevents($year, $month) {
        $config = array(
            'start_day' => 'monday',
            'month_type' => 'long',
            'day_type' => 'long',
            'show_next_prev' => 'true',
            'next_prev_url' => base_url() . 'index.php/calendar/caldisplay'
        );
        $config['template'] = '

   {table_open}<table border="0" cellpadding="" cellspacing="" class="table-calendar">{/table_open}

   {heading_row_start}
   
   <tr class="heading">
   {/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}
   </tr>
   
  {/heading_row_end}

   {week_row_start}<tr class="daysoftheweek">{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr class="days">{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}
  
   <div class="day_num">
    {day}
   </div>
   
   <div class="content">
   {content}
    </div>
 
   {/cal_cell_content}
   
   {cal_cell_content_today}
    <div class="day_num highlight">
    {day}
   </div>
   
   <div class="">
   {content}
    </div>
   {/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}
   <div class="highlight">
   {day}
   </div>
   {/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
';
        $this->load->library('calendar', $config);

      
        
        $data_to_cal=$this->loadschedule($year, $month);
        $cal_cell=array();
        $dataVal=array();
        $allevents=array();
        $daytocheck='';
        
        foreach ($data_to_cal->result_array() as $value) {
          //$daytocheck=  substr($value['date'],8,2) ; 
          $daytocheck = date('j',strtotime($value['date']));
        //  echo $daytocheck; 
          $client=$value['clientname'];
          
          if(isset($dataVal[$daytocheck])){
            $dataVal[$daytocheck].='<div  class="content">'.$client.  nbs(6). anchor('calendar/clientsInfos/'.$value['clients'].'/'.$year.'-'.$month.'-'.$daytocheck,$title=img(array('src'=>'icons/alarm.png','title'=>'read more'))).'</div>';
          } else{
            $dataVal[$daytocheck]='<div  class="content">'.'view all'.nbs(6). anchor('calendar/loaddayschedule/'.$year.'-'.$month.'-'.$daytocheck,$title=img(array('src'=>'icons/view.png'))).'</div>';
            $dataVal[$daytocheck].='<div  class="content">'.$client.  nbs(6). anchor('calendar/clientsInfos/'.$value['clients'].'/'.$year.'-'.$month.'-'.$daytocheck,$title=img(array('src'=>'icons/alarm.png','title'=>'read more'))).'</div>';
          }
          
          
           //$allevents=array($daytocheck=>'<div  class="content">'. anchor('calendar/allevents/'.$year.'-'.$month.'-'.$daytocheck,$title='view').'</div>');
        }
        
         $cal_cell=$dataVal;
      
   
        return $this->calendar->generate($year, $month,$cal_cell);
    }
    /**
     * @method :load the client's name 
     * @param :date
     * @return :results
     */
    public function loadschedule( $year,$month) {
        $daytocheck=date('d');
        $data=array();
       // $completedate=$year.'-'.$month.'-'.$daytocheck;
        $completedate=$year.'-'.$month;
        $sql="select * from schedule,clients where 
              schedule.client_id=clients.clients and
              schedule.date like '%$completedate%' order by date desc              
             ";
        $results=$this->db->query($sql);

        return $results;
    }
    
    /**
     * @method :load contact details
     * @param :client id
     * @return results
     */
    public function loadphonenumbers($clientId) {
        $sql="select* from phonebook,clients where
            phonebook.clients_id=clients.clients and phonebook.clients_id='$clientId'";
        $results=$this->db->query($sql);
        return $results;
        
    }
    
    /**
     * @method :load client infos
     * @param :client id
     * @return  results
     * 
     */
    public function clientsInfos($clientId ,$date) {
        $sql="select * from clients,schedule where clients.clients='$clientId' and
                                schedule.client_id=clients.clients and
                                schedule.date like '%" . date('Y-m-d', strtotime($date)) . "%' order by date desc
               
               ";
        $results=$this->db->query($sql);
        return $results;
        
    }
    
    /**
     * @method :fetch events on specific date and year
     * @param date
     * @return results 
     */
    public function dayschedule($date) {
         $sql="select * from schedule,clients where 
              schedule.client_id=clients.clients and
              schedule.date like '%" . date('Y-m-d', strtotime($date)) . "%' order by date desc              
             ";
        $results=$this->db->query($sql);
    
        return $results;

        
    }
}

?>
