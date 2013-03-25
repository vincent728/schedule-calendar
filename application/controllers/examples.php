<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
		$this->load->view('example.php',$output);	
	}
	

	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	

        
        
        function schedule()
        {
            $crud = new grocery_CRUD();
            $crud->set_relation('client_id','clients','clientname');
            $crud->display_as('client_id','Client Name');
            $output = $crud->render();
       	$this->_example_output($output);
                        
        }
        
        function clients_management() {
             $crud = new grocery_CRUD();
             $crud->set_theme('datatables');
             $crud->set_table('clients');
          
            $crud->required_fields('phone_one');
            $crud->required_fields('directions');
            $output = $crud->render();
        	$this->_example_output($output);
        }
        
        function phonebook_management() {
            $crud = new grocery_CRUD();
             $crud->set_theme('datatables');
             $crud->set_table('phonebook');
             $crud->set_relation('clients_','phonebook','phone#');

            $output = $crud->render();
        	$this->_example_output($output);
        }
        

	
	
}