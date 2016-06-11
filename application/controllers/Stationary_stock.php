<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounting
 *
 * @author MD. Mashfiq
 */
class Stationary_stock extends CI_Controller {
            
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
       
    }
    
    function index(){
        $crud = new grocery_CRUD();
        $crud->set_table('stationary_stock');
        $crud->set_relation('id_name_expense', 'expense_name', 'name_expense');
        
              
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        
        
        
        $this->load->model('stationary_model');
        $data['expense_name_dropdown']=$this->stationary_model->expense_name_dropdown();
                
        $expense_name_id=$this->input->post('expense_name_id');    
        $date_range = $this->input->post('date_range');
         if ($date_range != '' or $expense_name_id !='') {
            $data['report']=$this->stationary_model->stationary_report($date_range,$expense_name_id);
        }else{
           $output = $crud->render();
            $data['glosary'] = $output;
        }
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Stationary Stock';
        
        $this->load->view($this->config->item('ADMIN_THEME').'stationary/stationary', $data);
    }
    
    function stationary_stock_register(){
        $crud = new grocery_CRUD();
        $crud->set_table('stationary_stock_register');
        $crud->set_relation('id_name_expense', 'expense_name', 'name_expense');
        
              
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        
        $this->load->model('stationary_model');
        $date_range = $this->input->post('date_range');
         if ($date_range != '') {
            $data['report']=$this->stationary_model->stationary_report($date_range);
        }else{
           $output = $crud->render();
        $data['glosary'] = $output;
        }
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Stationary Stock';
        
        $this->load->view($this->config->item('ADMIN_THEME').'stationary/stationary_stock', $data);
    }
    
   
    
}