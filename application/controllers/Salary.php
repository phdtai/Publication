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
class Salary extends CI_Controller {

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
        $this->load->model('Salary_model');
    }

    function index() {
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage salary';

        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/salary_dashboard', $data);
    }

    function employee_salary() {
        $id = $this->input->post('id_employee');
        $data['edit_salary'] = $this->Salary_model->select_salary_payment_by_salary_id($id);
//        echo '<pre>';print_r($data['edit_salary']);exit();
        echo json_encode($data);
//        return $data['salary_info'];
    }

    function salary_payment() {
        $crud = new grocery_CRUD();
        $crud->set_table('salary_payment')
                ->set_subject('Salary Payment')
                ->display_as("id_employee", 'Employee Name')
                ->display_as("amount_salary_payment", 'Total Amount of Salary')
                ->unset_delete()
                ->unset_edit()
                ->unset_read()
                ->callback_column('status_salary_payment', array($this, 'set_value'))
                ->set_relation('id_employee', 'employee', "name_employee");
        $output = $crud->render();
        $data['glosary'] = $output;

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Salary Payment';

        $data['employees'] = $this->Salary_model->select_all('employee');

        // echo '<pre>';print_r($father[0]->father_name);exit();
        $id = $this->uri->segment(4);
        $data['edit_salary'] = $this->Salary_model->select_salary_payment_by_salary_id($id);

        //echo '<pre>';print_r($id);exit();
        $data['salary_payment'] = $this->Salary_model->select_all('salary_payment');
        //$data['salary_bonus'] = $this->Salary_model->select_all('salary_bonus_type');
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/salary_payment', $data);
    }

    function set_value($value) {
        if ($value == 1) {
            return'<b>Announced</b>';
        }
        if ($value == 2) {
            return'<b>Paid</b>';
        }
        if ($value == 3) {
            return'<b>Error</b>';
        }
    }

    //    save salary payment
    public function save_announced() {
        $announced = $this->input->post('status_salary_payment');
        $employee = $this->input->post('id_employee');
        $basic = $this->input->post('amount_salary_payment');
        $bonus = $this->input->post('bonus_type');
        for ($i = 0; $i < count($announced); $i++) {
            for ($j = 0; $j < count($employee); $j++) {
                if ($employee[$j] == $announced[$i]) {
                    $data['id_employee'] = $employee[$j];
                    $data['month_salary_payment'] = date('n', now());
                    $data['year_salary_payment'] = date('Y', now());
                    $data['issue_salary_payment'] = date('Y-m-d H:i:s', now());
                    $data['amount_salary_payment'] = $basic[$j];
                    $data['status_salary_payment'] = 1;
                    $payment_id = $this->Salary_model->save_info('salary_payment', $data);
                    $amount = $this->Salary_model->select_bonus_amount($bonus[$j]);
                    if ($amount != null) {
                        $info['id_salary_bonus_type'] = $bonus[$j];
                        $info['amount_salary_bonus'] = $amount[0]->amount;
                        $info['id_salary_payment'] = $payment_id;
                        $this->Salary_model->save_info('salary_bonus', $info);
                    }
                }
            }
        }
        $sdata = array();
        $sdata['message'] = '<div class = "alert alert-success" id="msg"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Your Data is successfully Saved</p></div>';
        $this->session->set_userdata($sdata);
        redirect('Salary/salary_announced');
    }

    function paid_salary_payment() {
        $id = $this->input->post('id_employee');
//        payment update
        $data['date_salary_payment'] = date('Y-m-d H:i:s', now());
        $data['status_salary_payment'] = 2;
        $amount_salary = $this->input->post('amount_salary_payment');
        $payment_id = $this->Salary_model->deduction_update('salary_payment', 'id_employee', $data, $id, $amount_salary, 'amount_salary_payment', 'id_salary_payment');
        $this->Salary_model->update_cash('cash', $amount_salary);


//        bonus update
        $bonus['status_bonus_payment'] = 2;
        $bonus_id = $this->Salary_model->update_info('salary_bonus', 'id_salary_payment', $bonus, $payment_id->id_salary_payment, 'id_salary_bonus');
//        loan payment insert
        if ($this->input->post('id_loan') != null) {
            $loan['id_loan'] = $this->input->post('id_loan');
            $loan['paid_amount_loan_payment'] = $this->input->post('paid_amount_loan_payment');
            $loan['payment_date_loan_payment'] = date('Y-m-d H:i:s', now());
            $this->Salary_model->save_info('loan_payment', $loan);
        }
//        advance update
//        $amount = floatval($this->input->post('paid_amount_loan_payment'));
//        $advance['amount_paid_salary_advance'] =  $this->input->post('amount_paid_salary_advance');
//        $advance_id = $this->Salary_model->deduction_update('salary_advance','id_employee', $advance, $id,$amount,'amount_given_salary_advance','id_salary_advance');
//        advance payment insert
        if ($this->input->post('id_salary_advance') != null) {
            $advance_payment['id_salary_advance'] = $this->input->post('id_salary_advance');
            $advance_payment['payment_date_salary_advance_payment'] = date('Y-m-d H:i:s', now());
            $advance_payment['paid_amount_salary_advance_payment'] = $this->input->post('amount_paid_salary_advance');

            $this->Salary_model->save_info('salary_advance_payment', $advance_payment);
        }

        redirect('Salary/salary_payment');
    }


    function salary_advanced() {
        $crud = new grocery_CRUD();
        $crud->set_table('salary_advance')
                ->set_subject('Salary Advanced')
                ->display_as("id_employee", 'Employee Name')
                ->set_relation('id_employee', 'employee', "name_employee");
        $output = $crud->render();
        $data['glosary'] = $output;

//        employee search
        $employee = $this->input->post('employee');

//        date range
        $range = $this->input->post('date_range');
        $part = explode("-", $range . '-');
        $from = date('Y-m-d', strtotime($part[0]));
        $to = date('Y-m-d', strtotime($part[1]));
//        ---------------

        if ($employee != null) {
            $data['salaries_search'] = $this->Salary_model->salary_advance_by_employee_id($employee);
        } else if ($from != "1970-01-01") {

            $data['salaries_search'] = $this->Salary_model->Salary_advance_by_date($from, $to);
////            print_r($data);
        } else {
            $data['salaries'] = $this->Salary_model->salary_advance_with_employee();
        }

        $data['date_range'] = $range;
        $data['employee_info'] = $employee;
        $data['employees'] = $this->Salary_model->select_all('employee');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Salary Advance';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/salary_advanced', $data);
    }

    function salary_bonus() {
        $crud = new grocery_CRUD();
        $crud->set_table('salary_bonus')
                ->set_subject('Salary Bonus')
                ->set_relation('id_salary_bonus_type', 'salary_bonus_type', "name_salary_bonus_type")
                ->set_relation('id_salary_payment', 'salary_payment', "id_salary_payment");
        $output = $crud->render();
        $data['glosary'] = $output;

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Salary Bonus';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/salary_bonus', $data);
    }

    function salary_bonus_type() {
        $crud = new grocery_CRUD();
        $crud->set_table('salary_bonus_type')
                ->set_subject('Salary Bouns Type');
        $output = $crud->render();
        $data['glosary'] = $output;

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Salary Bonus type';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/salary_bonus_type', $data);
    }

    function salary_announced($id = null) {
        $data['employees'] = $this->Salary_model->select_all_employee();
        $salary = $data['employees'];
        $data['bonus_type'] = $this->Salary_model->select_all('salary_bonus_type');
//        echo '<pre>';print_r($data);exit();
//        after insert
        $data['edit_salary'] = $this->Salary_model->select_salary_payment_by_salary_id($id);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Salary Announcement';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/salary_announced_list', $data);
    }

    function current_salary_payment() {
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Current Salary Payment';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/current_salary', $data);
    }

    function current() {
        $month = date('n', now());
        $data['current_salary'] = $this->Salary_model->current_salary($month);
//        echo '<pre>';print_r($data['current_salary']);exit();
        echo json_encode($data);
    }

    function total_employee_paid() {
        $data['total_paid'] = $this->Salary_model->select_all_salary_of_employee();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Total Employee Salary';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/total_employee_paid', $data);
    }

    function total_salary_paid() {

//        date range
        $range = $this->input->post('date_range');
        $part = explode("-", $range . '-');
        $from = date('Y-m-d', strtotime($part[0]));
        $to = date('Y-m-d', strtotime($part[1]));
//        --------------
        if ($from != "1970-01-01") {

            $data['totals'] = $this->Salary_model->total_info_by_date($from, $to);
////            print_r($data);
        } else {
            $data['total_paid_salary'] = $this->Salary_model->select_all_paid_salary();
        }



        $data['date_range'] = $range;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Total Salary Paid';
        $this->load->view($this->config->item('ADMIN_THEME') . 'salary/total_salary_paid', $data);
    }

}
