<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author MD. Mashfiq
 */
//define('DASHBOARD', "$baseurl");
class Admin extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
        $this->load->library('grocery_CRUD');
    }

    function index() {
        redirect('admin/memo_management');
    }

    function dashboard() {
        $this->load->model('account/account');
        $data['account_today'] = $this->account->today();
        $data['account_monthly'] = $this->account->monthly();
        $data['total'] = $this->account->total();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'dashboard', $data);
    }

    function account($cmd = false) {
        $this->load->model('Memo');
        $this->load->library('session');
        $this->load->model('account/account');

        $data['date_range'] = $this->input->post('date_range');
        if ($data['date_range'] != '') {
            $this->session->set_userdata('date_range', $data['date_range']);
        }
        if ($cmd == 'reset_date_range') {
            $this->session->unset_userdata('date_range');
            redirect("admin/account");
        }
        if ($this->session->userdata('date_range') != '') {
            $range = $this->Memo->dateformatter($this->session->userdata('date_range'));
            $data['date_range'] = $this->session->userdata('date_range');
        }
        if (isset($range)) {
            $data['today_detail_table'] = $this->account->today_detail_table($range);
        }
        $data['account_today'] = $this->account->today();
        $data['account_monthly'] = $this->account->monthly();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Account Information';
        $data['today_monthly_account_detail_table'] = $this->account->today_monthly_account_detail_table();
        $data['total_account_detail_table'] = $this->account->total_account_detail_table();
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'account', $data);
    }

    function report_sold_book_today($cmd = false) {

        $this->load->library('session');

//        basic info initialization
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Roport';
        $data['base_url'] = base_url();

//        Getting main content
        $this->load->model('Report');
        //$data['main_content'] = $this->Report->sold_book_today();


        $data['date_range'] = $this->input->post('date_range');
        if ($data['date_range'] != '') {
            $this->session->set_userdata('date_range', $data['date_range']);
        }
        if ($cmd == 'reset_date_range') {
            $this->session->unset_userdata('date_range');
            redirect("admin/report_sold_book_today");
        }
        if ($this->session->userdata('date_range') != '') {
            $range = $this->Report->dateformatter($this->session->userdata('date_range'));
            $data['date_range'] = $this->session->userdata('date_range');
        }
        if (isset($range)) {
            $data['main_content'] = $this->Report->sold_book_today($range);
        } else {

            $data['main_content'] = $this->Report->sold_book_today();
        }


        $this->load->view($this->config->item('ADMIN_THEME') . 'page-book-sold-quantity', $data);
    }

    function manage_book() {
        $crud = new grocery_CRUD();
        $crud->set_table('pub_books')->set_subject('Book')->order_by('book_ID', 'desc')->display_as('price', 'Sales Price');
        $crud->callback_add_field('catagory', function () {
            return form_dropdown('catagory', $this->config->item('book_categories'), '0');
        });
        $crud->callback_column('name', function ($value, $row) {
            return $row->name;
        });
        $crud->callback_add_field('storing_place', function () {
            return form_dropdown('storing_place', $this->config->item('storing_place'));
        });
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage Book';
        $this->load->view($this->config->item('ADMIN_THEME') . 'manage_book', $data);
    }

    function manage_contact() {
        $crud = new grocery_CRUD();
        $crud->columns(
                'contact_ID', 'name', 'contact_type', 'division', 'district', 'upazila', 'address', 'phone'
        );
        $crud->display_as('contact_ID', 'Contact code');
        $crud->set_table('pub_contacts')->set_subject('Contact')->order_by('contact_ID', 'desc');
        $crud->callback_add_field('contact_type', function () {
            return form_dropdown('contact_type', $this->config->item('contact_type'));
        })->callback_edit_field('contact_type', function ($value, $primary_key) {
            return form_dropdown('contact_type', $this->config->item('contact_type'), $value);
        });
        $crud->callback_add_field('division', function () {
            return form_dropdown('division', $this->config->item('division'));
        })->callback_edit_field('division', function ($value, $primary_key) {
            return form_dropdown('division', $this->config->item('division'), $value);
        });
        $crud->callback_add_field('district', function () {
            return form_dropdown('district', $this->config->item('districts_english'), '', 'class="form-control select2 dropdown-width" ');
        })->callback_edit_field('district', function ($value, $primary_key) {
            return form_dropdown('district', $this->config->item('districts_english'), $value);
        });

        $crud->callback_add_field('upazila', function () {
            return form_dropdown('upazila', $this->config->item('upazila_english'), '', 'class="form-control select2 dropdown-width" ');
        })->callback_edit_field('upazila', function ($value, $primary_key) {
            return form_dropdown('upazila', $this->config->item('upazila_english'), $value);
        });


        $crud->callback_add_field('subject', function () {
            return form_dropdown('subject', $this->config->item('teacher_subject'), '', 'class="form-control select2 dropdown-width" ');
        })->callback_edit_field('subject', function ($value, $primary_key) {
            return form_dropdown('subject', $this->config->item('teacher_subject'), $value);
        });

        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'General Contact';
        $this->load->view($this->config->item('ADMIN_THEME') . 'manage_contact', $data);
    }

    function manage_contact_teacher() {
        $this->load->model('Contact');

        $crud = new grocery_CRUD();
        $crud->set_table('pub_contacts_teacher')->set_subject('Teacher Contact')->order_by('teacher_ID', 'desc');
        $crud->callback_add_field('division', function () {
            return form_dropdown('division', $this->config->item('division'));
        })->callback_edit_field('division', function ($value, $primary_key) {
            return form_dropdown('division', $this->config->item('division'), $value);
        });
        $crud->callback_add_field('district', function () {
            return form_dropdown('district', $this->config->item('districts_english'), '', 'class="form-control select2 dropdown-width" ');
        })->callback_edit_field('district', function ($value, $primary_key) {
            return form_dropdown('district', $this->config->item('districts_english'), $value);
        });

        $crud->callback_add_field('upazila', function () {
            return form_dropdown('upazila', $this->config->item('upazila_english'), '', 'class="form-control select2 dropdown-width" ');
        })->callback_edit_field('upazila', function ($value, $primary_key) {
            return form_dropdown('upazila', $this->config->item('upazila_english'), $value);
        });


        $crud->callback_add_field('subject', function () {
            return form_dropdown('subject', $this->config->item('teacher_subject'), '', 'class="form-control select2 dropdown-width" ');
        })->callback_edit_field('subject', function ($value, $primary_key) {
            return form_dropdown('subject', $this->config->item('teacher_subject'), $value);
        });

        if (current_url() == site_url('admin/manage_contact_teacher')) {
            $crud = $this->Contact->set_filter($crud);
            $data['filter_dropdowns'] = $this->Contact->filter_dropdowns();
        }

        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Teacher Contact';
        $this->load->view($this->config->item('ADMIN_THEME') . 'manage_contact', $data);
    }

    function book_return() {
        $this->load->model('Stock_manages');
        $crud = new grocery_CRUD();
        $crud->set_table('pub_books_return')->set_subject('Returned Book')
                ->display_as('contact_ID', 'Party Name')
                ->display_as('book_ID', 'Book')
                ->display_as('issue_date', 'Issue Date')->order_by('issue_date', 'desc');

        $crud->set_relation('contact_ID', 'pub_contacts', 'name')
                ->set_relation('book_ID', 'pub_books', 'name');



        $crud->callback_after_insert(array($this->Stock_manages, 'marge_insert_book'));
        $output = $crud->render();

        $data['scriptInline'] = "<script>"
                . "var CurrentDate = '" . date("m/d/Y") . "';"
                . "</script>"
                . '<script type="text/javascript" src="' . base_url() . $this->config->item('ASSET_FOLDER') . 'js/Custom-book_return.js"></script>';
        $data['contact_dropdown'] = $this->Stock_manages->get_due_holder_dropdown();

        $data['glosary'] = $output;

        $data['total_book_return_section'] = true;
        $data['book_returned_dropdown'] = $this->Stock_manages->get_book_returned_dropdown();
        $data['total_book_returned'] = $this->Stock_manages->total_book_returned();

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Book Return';
        $this->load->view($this->config->item('ADMIN_THEME') . 'manage_contact', $data);
    }

    function total_book_return($book_ID) {
        $data = $this->db->select('sum(quantity)')
                ->from('pub_books_return')
                ->where('book_ID', $book_ID)
                ->get()
                ->result_array();
        echo $data[0]['sum(quantity)'];
    }

    function print_last_memo() {
        $this->db->select('LAST_INSERT_ID(`memo_ID`)');
//        $this->db->select('LAST_INSERT_ID()');
//        $this->db->insert_id('memo_ID');
        $this->db->from('pub_memos');
        $data = $this->db->get()->result_array();
//        print_r($data);
//        echo sizeof($data) - 1;
        $last_inserted_memo_id = $data[sizeof($data) - 1]['LAST_INSERT_ID(`memo_ID`)'];
        redirect('admin/memo/' . $last_inserted_memo_id);
    }

    function add_stock($process = false) {
//         $crud = new grocery_CRUD();
//         $crud->set_table('pub_stock')->set_subject('Stock');
//         $crud->set_relation('book_ID', 'pub_books', 'name');
//         $crud->set_relation('printing_press_ID', 'pub_contacts', 'name');
// //        $crud->set_relation('binding_store_ID', 'pub_contacts', 'name');
// //        $crud->set_relation('sales_store_ID', 'pub_contacts', 'name');
//         $output = $crud->render();
//         $data['glosary'] = $output;
        //  'admin/ass_stock/true' aso ?

        $this->load->model('stock_manages');

        if ($process) {
            $book_id = $this->input->post('book_id');
            $printingpress_id = $this->input->post('printingpress_id');
            $quantity = $this->input->post('quantity');
            $this->stock_manages->append_new_stock($book_id, $printingpress_id, $quantity);
            redirect('admin/manage_stocks');
        }


        $data['bookname'] = $this->stock_manages->get_bookid_dropdown();
        $data['printingpress'] = $this->stock_manages->get_printingpress_dropdown();

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage Book';
        $this->load->view($this->config->item('ADMIN_THEME') . 'stock_manage', $data);
    }

    function transfer_stock() {
        $this->load->model('Stock_manages');
        $this->Stock_manages->transfer_stock();
        redirect('admin/manage_stocks');
    }

    function manage_stocks($transfer = false) {
        $this->load->model('Stock_manages');

        $crud = new grocery_CRUD();
        $crud->set_table('pub_stock')->set_subject('Stock');
        $crud->set_relation('book_ID', 'pub_books', 'name');
        $crud->set_relation('printing_press_ID', 'pub_contacts', 'name');
//        $crud->set_relation('binding_store_ID', 'pub_contacts', 'name');
//
//        $crud->set_relation('sales_store_ID', 'pub_contacts', 'name');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['base_url'] = base_url();
        $data['Title'] = 'Manage Stock';

        $data['scriptInline'] = '<script>
            jQuery(\'[data-StockId]\').click(function () {
                var stock_id = $(this).attr("data-StockId");
                var maxQuantity = $(this).attr("data-maxQuantity");
                //console.log(stock_id);
                jQuery(\'[name="stock_id_from"]\').val(stock_id);
                jQuery(\'[name="Quantity"]\').attr("max",maxQuantity);
            });
        </script>';
        $data['transfer_from_contact_dropdown'] = $this->Stock_manages->get_contact_dropdown();


        $data['printing_table'] = $this->Stock_manages->get_stock_table();
        $data['binding_table'] = $this->Stock_manages->get_stock_table('Binding Store');
        $data['store_table'] = $this->Stock_manages->get_stock_table('Sales Store');
        $this->load->view($this->config->item('ADMIN_THEME') . 'manage_stock', $data);
    }

    function test() {
        $this->load->model('Memo');
        echo $this->Memo->selected_book_quantity(9, 16);
    }

    function memo($memo_id) {
        $this->load->model('Memo');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Memo Generation';
        $data['base_url'] = base_url();
        $data['Book_selection_table'] = $this->Memo->memogenerat($memo_id);
        $data['edit_btn_url'] = site_url('admin/memo_management/edit/' . $memo_id);

        $this->load->view($this->config->item('ADMIN_THEME') . 'memo', $data);
    }

    function memo_management($cmd = false, $primary_id = false) {
        $this->load->model('Memo');
        $this->load->library('session');

        $crud = new grocery_CRUD();
        $crud->set_table('pub_memos')
                ->set_subject('Memo')
                ->display_as('contact_ID', 'Party Name')
                ->display_as('issue_date', 'Issue Date (mm/dd/yyyy)')
                ->display_as('bank_pay', 'Bank Collection')->order_by('memo_ID', 'desc')
                ->required_fields('contact_ID', 'issue_date');

        $crud->set_relation('contact_ID', 'pub_contacts', 'name');
        $crud->unset_add_fields('memo_serial');
        $crud->Set_save_and_print(TRUE);
        $crud->unset_back_to_list();
        $crud->unset_delete();
        if ($primary_id) {
            if (!in_array($primary_id, $this->Memo->last_memo_ID_of_each_contact_ID())) {
                if ($cmd == 'edit') {
                    die("<script>"
                            . "alert(' আপনি এই মেমোটি এডিট করতে পারবেন না । প্রয়োজনে এই  ক্রেতার সর্বশেষ  মেমোটি এডিট  করুন । ধন্যবাদ ।   ');"
                            . "window.location.assign( '" . site_url('admin/memo_management') . "');"
                            . "</script>");
                    $crud->unset_edit();
                }
                if ($cmd == 'delete') {
                    die("<script>"
                            . "alert('আপনি এই মেমোটি ডিলিট করতে পারবেন না । প্রয়োজনে এই  ক্রেতার সর্বশেষ  মেমোটি ডিলিট  করুন । ধন্যবাদ ।  ');"
                            . "window.location.assign( '" . site_url('admin/memo_management') . "');"
                            . "</script>");
                    $crud->unset_delete();
                }
            }
        }

        //date range config
        $data['date_range'] = $this->input->post('date_range');
        if ($data['date_range'] != '') {
            $this->session->set_userdata('date_range', $data['date_range']);
        }
        if ($cmd == 'reset_date_range') {
            $this->session->unset_userdata('date_range');
            redirect("admin/memo_management");
        }
        if ($this->session->userdata('date_range') != '') {
            $crud->where("DATE(issue_date) BETWEEN " . $this->Memo->dateformatter($this->session->userdata('date_range')));
            $data['date_range'] = $this->session->userdata('date_range');
        }

        $crud->callback_edit_field('memo_serial', function ($value, $primary_key) {
            $unique_id = $value;
            return '<label>' . $unique_id . '</label><input type="hidden" maxlength="50" value="' . $unique_id . '" name="memo_serial" >';
        });
        $crud->callback_add_field('sub_total', array($this->Memo, 'add_book_selector_table'))
                ->callback_edit_field('sub_total', array($this->Memo, 'edit_book_selector_table'))
                ->callback_after_insert(array($this->Memo, 'after_adding_memo'))
                ->callback_after_update(array($this->Memo, 'after_editing_memo'))
                ->callback_after_delete(array($this->Memo, 'after_deleting_memo'))
                ->add_action('Print', '', site_url('admin/memo/1'), 'fa fa-print', function ($primary_key, $row) {
                    return site_url('admin/memo/' . $row->memo_ID);
                });

        $addContactButtonContent = anchor('admin/manage_contact/add', '<i class="fa fa-plus-circle"></i> Add New Contact', 'class="btn btn-default" style="margin-left: 15px;"');
        $data['scriptInline'] = ""
                . "<script>"
                . "var addContactButtonContent = '$addContactButtonContent';\n "
                . "var CurrentDate = '" . date("m/d/Y h:i:s a") . "';"
                . "var previousDueFinderUrl = '" . site_url("admin/previousDue/") . "';"
                . "</script>\n"
                . '<script type="text/javascript" src="' . base_url() . $this->config->item('ASSET_FOLDER') . 'js/Custom-main.js"></script>';
        $output = $crud->render();
//        $this->grocery_crud->set_table('pub_memos')->set_subject('Memo');
//        $output =  $this->grocery_crud->render();
        $data['date_filter'] = $cmd;
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Memo Management';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'memo_management', $data);

        $this->Memo->clean_pub_memos_selected_books_db();
    }

    function due_management($cmd = false) {
        $this->load->model('Stock_manages');
        $this->load->model('Memo');

        $last_memo_ID_of_each_contact_ID = implode(',', $this->Memo->last_memo_ID_of_each_contact_ID());
        if ($last_memo_ID_of_each_contact_ID === '') {
            die("<script>alert('কোন মেমো ডাটাবেজে নেই । দয়া করে মেমো যোগ করুন । ');"
                    . "window.location.assign( '" . site_url('admin/memo_management/add') . "');</script>");
        }

        $crud = new grocery_CRUD();
        $crud->set_table('pub_memos')
                ->set_subject('Memo')
                ->display_as('contact_ID', 'Party Name')
                ->display_as('issue_date', 'Issue Date (mm/dd/yyyy)')
                ->display_as('bank_pay', 'Bank Collection')->order_by('memo_ID', 'desc')
                ->unset_add()->unset_edit()->unset_delete()
                ->where('memo_ID in', '(' . $last_memo_ID_of_each_contact_ID . ')', false)
                ->where('due >', '0');

        //date range config
        $data['date_range'] = $this->input->post('date_range');
        if ($data['date_range'] != '') {
            $this->session->set_userdata('date_range', $data['date_range']);
        }
        if ($cmd == 'reset_date_range') {
            $this->session->unset_userdata('date_range');
            redirect("admin/due_management");
        }
        if ($this->session->userdata('date_range') != '') {
            $crud->where("DATE(issue_date) BETWEEN " . $this->Memo->dateformatter($this->session->userdata('date_range')));
            //$crud->where("issue_date BETWEEN " . $this->Memo->dateformatter($this->session->userdata('date_range')));
            $data['date_range'] = $this->session->userdata('date_range');
        }

        $crud->set_relation('contact_ID', 'pub_contacts', 'name');

        $crud->add_action('Update', '', site_url('admin/memo/'), 'fa fa-edit', function ($primary_key, $row) {
            return site_url('admin/memo_management/edit/' . $row->memo_ID);
        })->add_action('Print', '', site_url('admin/memo/'), 'fa fa-print', function ($primary_key, $row) {
            return site_url('admin/memo/' . $row->memo_ID);
        });
        $output = $crud->render();

        $data['date_filter'] = $cmd;

        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Due  Management';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'memo_management', $data);
    }

    //    Getting the previous due and make other row's due 0
    function previousDue($contact_ID = 2, $memo_ID = FALSE) {
        $db_tables = $this->config->item('db_tables');
        if ($memo_ID) {
            $db_rows = $this->db->select("contact_ID,due")->from($db_tables['pub_memos'])
                            ->where('contact_ID', $contact_ID)
                            ->where('memo_ID <', $memo_ID)
                            ->get()->result_array();
            $previousDue = isset($db_rows[sizeof($db_rows) - 1]['due']) ? $db_rows[sizeof($db_rows) - 1]['due'] : 0;
            echo $previousDue;
        } else {
            $db_rows = $this->db->select("contact_ID,due")->from($db_tables['pub_memos'])
                            ->where('contact_ID', $contact_ID)
                            ->get()->result_array();
            $previousDue = isset($db_rows[sizeof($db_rows) - 1]['due']) ? $db_rows[sizeof($db_rows) - 1]['due'] : 0;
            echo $previousDue;
        }
    }

}
