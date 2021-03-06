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
class Loan extends CI_Controller {

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
        $this->load->model('Loan_model');
        $this->load->model('User_access_model');
        $this->User_access_model->check_user_access(11);
    }

    function index() {
//        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
//        $data['base_url'] = base_url();
//        $data['Title'] = 'Manage Loan';
//
//        $this->load->view($this->config->item('ADMIN_THEME') . 'loan/loan_dashboard', $data);
        redirect('loan/loan');
    }

    function loan($cmd = false) {
        $crud = new grocery_CRUD();
        $crud->set_table('loan')
                ->display_as("id_employee", 'Employee Name')
                ->set_relation('id_employee', 'employee', "name_employee")
                ->unset_fields('installments_loan')
                ->unset_columns('installments_loan')
                ->callback_edit_field('date_taken_loan', function () {
                    return '<input id="field-date_taken_loan" name="date_taken_loan" type="text" value="' . date('Y-m-d H:i:s') . '" >'
                            . '<style>div#date_taken_loan_field_box{display: none;}</style>';
                })
                ->callback_edit_field('status', function () {
                    return '<select id="field-status" name="status" >'
                            .'<option value ="Paid">Paid</option>'
                            .'<option value ="Not_Paid">Not Paid</option>'
                            .'</select>'
                            . '<style>div#status_field_box{display: none;}</style>';
                })->callback_column('status',array($this,'paid_or_not'))
                ->order_by('id_loan','desc');

        $output = $crud->render();
        $data['glosary'] = $output;
        
        $data['employee_name'] = $this->Loan_model->get_employee_dropdown();
        $btn = $this->input->post('btn_submit');
        if (isset($btn)) {
            $this->Loan_model->save_loan($_POST);
            $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Updated!</p></div>';
            $this->session->set_userdata($sdata);
            redirect('loan/loan');
        }
//        date range
        $range = $this->input->get('date_range');
        $part = explode("-", $range . '-');
        $from = date('Y-m-d', strtotime($part[0]));
        $to = date('Y-m-d', strtotime($part[1]));
//        --------------
        $status = $this->input->post('payment_status');
        $employee = $this->input->post('employee');
        if ($status != null) {
            $data['loans_search'] = $this->Loan_model->loan_info_by_status($status);
        } else if ($employee != null) {
            $data['loans_search'] = $this->Loan_model->loan_info_by_employee($employee);
        } else if ($from != "1970-01-01") {
            $data['loans_search'] = $this->Loan_model->loan_info_by_date($from, $to);
////            print_r($data);
        } else {
            $data['loans_search'] = $this->Loan_model->employee_loan();
        }

        $data['date_range'] = $range;
        $data['status'] = $status;
        $data['employee_info'] = $employee;
        $data['employees'] = $this->Loan_model->select_all('employee');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Loan';
        $this->load->view($this->config->item('ADMIN_THEME') . 'loan/loan', $data);
    }
    function paid_or_not($value,$row){
        if($value == 'paid'){
            return 'Paid';
        }if($value == 'not_paid'){
            return 'Not Paid';
        }
    }
//                ->set_relation_n_n('Employee Name', 'loan', 'employee','id_loan_payment','id_employee','name_employee')
    function loan_payment() {
        $crud = new grocery_CRUD();
        $crud->set_table('loan_payment')
                ->display_as('id_loan', 'Loan Id')
                ->set_relation('id_loan', 'loan', 'id_loan');
//                ->set_relation('id_employee', 'employee', "name_employee");
//                ->unset_fields('id_loan');
        $output = $crud->render();
        $data['glosary'] = $output;

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Loan Payment';
        $this->load->view($this->config->item('ADMIN_THEME') . 'loan/loan_payment', $data);
    }

    function loan_info() {
        $id = $this->input->post('id_employee');
        $data['loan_info'] = $this->Loan_model->select_loan_by_loan_id($id);
//        for($i = 1; $i <= count($data['loan_info']); $i++){
//         echo '<pre>';print_r($data['loan_info']);exit();
        echo json_encode($data);
//        }
    }

    function loan_history() {
        $data['employees'] = $this->Loan_model->select_all('employee');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Loan History';
        $this->load->view($this->config->item('ADMIN_THEME') . 'loan/loan_history', $data);
    }

    function loan_employee_list() {
        $range = $this->input->get('date_range');
//       
        $part = explode("-", $range . '-');
//        print_r($part);
        $from = date('Y-m-d', strtotime($part[0]));
//         print_r($from);exit();
//        echo $from;
        $to = date('Y-m-d', strtotime($part[1]));
        $date = array(
            'date1' => $from,
            'date2' => $to
        );
        if ($from == "1970-01-01" || empty($from)) {
            $data['employees_loan'] = $this->Loan_model->employee_loan();

//            echo '<pre>'; print_r($data);
        } else {
            $data['employees_loan'] = $this->Loan_model->employee_loan_by_range($date);
//            echo '<pre>'; print_r($_POST);
        }
        $data['date_range'] = $range;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Loan Employee List';
        $this->load->view($this->config->item('ADMIN_THEME') . 'loan/loan_empoloyee_list', $data);
    }

}
