<?php

class Calendar extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
      
    }

    

    public function index() {

        $this->caldisplay($year = NULL, $month = NULL);
    }

    /*     * calendar loader */

    public function caldisplay($year = NULL, $month = NULL) {
        /* setting preference/configurations for the calendar */
        $data['calendar_results'] = $this->events_model->todaysevents($year, $month);

        //print_r($data['calendar_results']);
        $this->load->view('show_calendar', $data);
    }

    /*     * controller function for view more details on the schedule */

    public function clientsInfos() {

        $data['results'] = $this->events_model->clientsInfos($this->uri->segment(3));
        $this->load->view('clientdetails', $data);
    }

    /*     * controller function to load day schedule* */

    public function loaddayschedule() {
        $data['results'] = $this->events_model->dayschedule($this->uri->segment(3));

        $data['day'] = $this->uri->segment(3);
        $this->load->view('dayschedule', $data);
    }
    
  
}

?>
