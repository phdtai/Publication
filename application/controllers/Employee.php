<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author sonjoy
 */
class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('Common');
        $this->load->model('User_access_model');
        $this->User_access_model->check_user_access(6);
    }

    function index() {
//        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
//        $data['base_url'] = base_url();
//        $data['Title'] = 'Manage Employee';
//
//        $this->load->view($this->config->item('ADMIN_THEME') . 'employee/employee_dashboard', $data);
        redirect('employee/manage_employee');
    }

    function manage_employee() {
        $crud = new grocery_CRUD();
        $crud->set_table('employee')
                ->set_subject('Employee')
                ->display_as('driving_license','Phone')
                ->order_by('id_employee','desc');
       $crud->callback_before_insert(array($this, 'update_contact_number'));
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage Employee';
        $this->load->view($this->config->item('ADMIN_THEME') . 'employee/manage_employee', $data);
    }
         function update_contact_number($post_array){ 
        $value = $this->input->post('driving_license');
        $values = $this->Common->bn2enNumber ($value);
        $post_array['driving_license'] =  $values ;
//        print_r($post_array);exit();
        return $post_array;
    }

    function manage_professtional_info() {
        $crud = new grocery_CRUD();
        $crud->set_table('employee_perfesional_info')
                ->display_as("previous_work_experience_year", 'Previous work experience in year')
                ->set_subject('Employee Professional')
                ->display_as("id_employee", 'Employee Name')
                ->set_relation('id_employee', 'employee', "name_employee")
                ->order_by('id','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage Employee';
        $this->load->view($this->config->item('ADMIN_THEME') . 'employee/manage_employee_professional', $data);
    }

    function manage_salary_info() {
        $crud = new grocery_CRUD();
        $crud->set_table('employee_salary_info')
                ->set_subject('Employee salary ')
                ->display_as("id_employee", 'Employee Name')
                ->set_relation('id_employee', 'employee', "name_employee")
                ->order_by('id','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage Employee';
        $this->load->view($this->config->item('ADMIN_THEME') . 'employee/manage_employee_salary', $data);
    }

}
