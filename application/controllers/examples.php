<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examples extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
            //secure the login
        if($this->ion_auth->logged_in()==FALSE){
            redirect('auth/login');  
        }
    }
    

    function _example_output($output = null) {
        $this->load->view('example.php', $output);
    }

    function index() {
        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    function events_management() {
        $crud = new grocery_CRUD();
        $crud->set_table('schedule');
        $crud->set_relation('client_id', 'clients', 'clientname');
    
        $crud->set_subject('Event');
        $crud->fields('date','client_id','exceptional_directions');
        $crud->display_as('client_id', 'Client')->display_as('date','Event date');
        $crud->display_as('exceptional_directions', 'Notes');
        $crud->unset_texteditor('exceptional_directions');
        $output = $crud->render();
        $this->_example_output($output);
    }
    
 

    function clients_management() {
        $crud = new grocery_CRUD();
        $crud->set_table('clients');
        $crud->set_subject('Client');
        $crud->required_fields('phone_one');
        $crud->required_fields('directions');
        $crud->fields('clientname','contact_person','email','phone_one','phone_two','phone_three','directions');
        $crud->display_as('clientname','Client')->display_as('phone_one','phone one')->display_as('phone_two',' phone two')->display_as('phone_three',' phone three');
        $crud->unset_texteditor('directions');
        $output = $crud->render();
        $this->_example_output($output);
    }

    function user_management() {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('users');
        $output = $crud->render();
        $this->_example_output($output);
    }

    function user_groups() {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('groups');
        $output = $crud->render();
        $this->_example_output($output);
    }

    function login_attempts_management() {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('login_attempts');
        $output = $crud->render();
        $this->_example_output($output);
    }

    function phonebook_management() {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('phonebook');
        $crud->set_relation('clients_', 'phonebook', 'phone#');

        $output = $crud->render();
        $this->_example_output($output);
    }

}