<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of SalesReturn
 *
 * @author MD. Mashfiq
 */
class SalesReturn extends CI_Controller {

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
        $this->User_access_model->check_user_access(19);
    }

    function current_sates_return_insert() {
        $this->load->model('Sales_return_model');
        if (!empty($_POST)) {
//            die(print_r($_POST));
            if ($this->Sales_return_model->current_sates_return_insert_processor()) {
                redirect('admin/book_return');
            }
        }

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['crud_ci_link'] = 'admin/book_return';
        $data['crud_ci_link_text'] = 'Book Return';
        $data['buyer_dropdown'] = $this->Sales_return_model->get_buyer_dropdown();
        $data['book_selector_table'] = $this->Sales_return_model->book_selector_table();
//        die($data['buyer_dropdown']);
        $data['Title'] = 'Add returned book';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'current_sates_return_insert', $data);
    }

    function book_rebind_insert() {
        $this->load->model('Sales_return_model');
        if (!empty($_POST)) {
            if ($this->Sales_return_model->book_rebind_insert_processor()) {
                redirect('admin/send_book_rebind');
            }
        }

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['crud_ci_link'] = 'admin/send_book_rebind';
        $data['crud_ci_link_text'] = 'Send to Re-binding';
        $data['buyer_dropdown'] = $this->Sales_return_model->get_binding_store_dropdown();
        $data['book_selector_table'] = $this->Sales_return_model->book_selector_table();
//        die($data['buyer_dropdown']);
        $data['Title'] = 'Add send to rebind';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'current_sates_return_insert', $data);
    }

}
