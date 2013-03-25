<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examples extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    function _example_output($output = null) {
        $this->load->view('example.php', $output);
    }

    function index() {
        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    function schedule() {
        $crud = new grocery_CRUD();
        $crud->set_relation('client_id', 'clients', 'clientname');
        $crud->set_subject('Schedule');
        $crud->display_as('client_id', 'Client Name');
        $crud->unset_texteditor('exceptional_directions');
        $output = $crud->render();
        $this->_example_output($output);
    }

    function clients_management() {
        $crud = new grocery_CRUD();
        $crud->set_table('clients');
        $crud->set_subject('Client');

        $crud->required_fields('phone_one');
        //$crud->set_relation_n_n('Namba','clients','phonebook','clients','clients_id','phone#','clientname');
   // $crud->set_relation_n_n($field_name, $relation_table, $selection_table, $primary_key_alias_to_this_table, $primary_key_alias_to_selection_table, $title_field_selection_table);
        $crud->required_fields('directions');
        $crud->display_as('phone_one','phone number one')->display_as('phone_two','Altenate phone number')->display_as('clientname','Client');
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