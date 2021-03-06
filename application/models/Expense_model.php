<?php

class Expense_model extends CI_Model {

    function expense_report($date) {
        if ($date != '') {
            $date = $this->dateformatter($date);
        }

        $this->db->select('name_expense,amount_expense,date_expense,description_expense');
        $this->db->from('expense');
        $this->db->join('expense_name', 'expense_name.id_name_expense=expense.id_name_expense', 'left');
        $this->db->order_by('expense.id_expense', 'desc');
        if ($date != '') {
            $condition = "DATE(date_expense) BETWEEN $date";
            $this->db->where($condition);
        }

        return $results = $this->db->get()->result();

//        $range_query = $this->db->query("SELECT name_expense,amount_expense,date_expense,description_expense FROM expense
//LEFT JOIN expense_name ON expense_name.id_name_expense=expense.id_name_expense 
//WHERE DATE(date_expense) BETWEEN $date");
//        return $range_query->result();
//        $range_query=$this->db->query("SELECT name_expense,CONCAT('TK ',amount_expense),DATE(date_expense),description_expense FROM expense
//LEFT JOIN expense_name ON expense_name.id_name_expense=expense.id_name_expense 
//WHERE date_expense BETWEEN $date");
//        
//        $this->load->library('table');
//        $this->table->set_heading(array('Income Name', 'Ammount', 'Date','Description'));
//        $tmpl = array (
//                    'table_open'          => '<table class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',
//
//                    'heading_row_start'   => '<tr style="background:#ddd">',
//                    'heading_row_end'     => '</tr>',
//                    'heading_cell_start'  => '<th class="text-center">',
//                    'heading_cell_end'    => '</th>',
//
//                    'row_start'           => '<tr>',
//                    'row_end'             => '</tr>',
//                    'cell_start'          => '<td>',
//                    'cell_end'            => '</td>',
//
//                    'row_alt_start'       => '<tr>',
//                    'row_alt_end'         => '</tr>',
//                    'cell_alt_start'      => '<td>',
//                    'cell_alt_end'        => '</td>',
//
//                    'table_close'         => '</table>'
//              );
//        
//        $this->table->set_template($tmpl);
//        $this->table->set_caption('<h4><span class="pull-left">Date Range:'.$this->datereport($date).'</span>'
//                . '<span class="pull-right">Report Date: '.date('Y-m-d h:i').'</span></h4>'
//                . '<style>td:nth-child(2) {    text-align: right;}</style>');
//        return $this->table->generate($range_query);
//        
    }

    function expense_sort_report($date) {
        if ($date != '') {
            $date = $this->dateformatter($date);
        }


        $this->db->select('name_expense,expense.id_name_expense ,expense.id_expense, name_expense,amount_expense,date_expense,description_expense');
        $this->db->from('expense');
        $this->db->join('expense_name', 'expense_name.id_name_expense=expense.id_name_expense', 'left');
        $this->db->order_by('expense.id_expense', 'desc');
        if ($date != '') {
            $condition = "DATE(date_expense) BETWEEN $date";
            $this->db->where($condition);
        }
         $results = $this->db->get()->result();
//         echo '<pre>';print_r($results);exit();
//         $test = $this->db->last_query();
//            die($test);
//        $range_query=$this->db->query("SELECT expense_name.id_name_expense as id_name,expense.id_name_expense as name_id, name_expense,amount_expense,date_expense,description_expense FROM expense
//LEFT JOIN expense_name ON expense_name.id_name_expense=expense.id_name_expense 
//WHERE DATE(date_expense) BETWEEN $date And expense_name.id_name_expense = expense.id_name_expense");
//        $result =  $range_query->result();
        
        $data = array();
        foreach ($results as $result) {
            $date_final = Date('Y-m-d',strtotime($result->date_expense));
            $report = $this->db->query('SELECT *,SUM(amount_expense) AS amount_expense,name_expense FROM expense LEFT JOIN expense_name ON expense_name.id_name_expense=expense.id_name_expense WHERE expense.id_name_expense =' . $result->id_name_expense.' AND DATE(date_expense) BETWEEN "'.$date_final.'" AND "'.$date_final.'"')->result();
//            $test = $this->db->last_query();
//            die($test);
            $data[$result->id_name_expense] = $report;
        }
//        
        return $data;
    }

    function get_max_expense_name() {
        $this->db->select_max('id_name_expense');
        return $query = $this->db->get('expense_name')->row();
    }

    function dateformatter($range_string, $formate = 'Mysql') {
        $date = explode(' - ', $range_string);
        $date[0] = explode('/', $date[0]);
        $date[1] = explode('/', $date[1]);

        if ($formate == 'Mysql')
            return "'{$date[0][2]}-{$date[0][0]}-{$date[0][1]}' and '{$date[1][2]}-{$date[1][0]}-{$date[1][1]}'";
        else
            return $date;
    }

    function datereport($date) {
        $date = str_replace("'", ' ', $date);
        $date = str_replace('and', 'to', $date);
        return $date;
    }

    function expense_register($id_name_expense, $amount_expense, $description_expense = "") {
        $data_to_insert_on_expense = array(
            'id_name_expense' => $id_name_expense,
            'amount_expense' => $amount_expense,
            'date_expense' => date('Y-m-d h:i:u'),
            'description_expense' => $description_expense
        );
        $this->db->insert('expense', $data_to_insert_on_expense);
    }
}
