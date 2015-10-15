<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Memo extends CI_Model {

    private $subtotal;
    private $discount;
    private $total;
    private $due;
    private $cash;

    function memogenerat($id) {
        $this->load->library('table');
        $query = $this->db->query("SELECT pub_books.name as book_name,
            book_price,
            quantity,
            price,
            cash,
            sub_total,
            pub_memos.total as total,
            pub_memos_selected_books.total,
            discount,
            due,
            pub_contacts.name as party_name,
            pub_contacts.district as party_district,
            pub_contacts.address as party_address,
            pub_contacts.phone as party_phone

            FROM `pub_memos_selected_books`
			LEFT JOIN pub_books on pub_memos_selected_books.book_ID=pub_books.book_ID
			LEFT JOIN pub_memos on pub_memos.memo_ID=pub_memos_selected_books.memo_ID
            LEFT JOIN pub_contacts on pub_memos.contact_ID=pub_contacts.contact_ID

			WHERE pub_memos_selected_books.memo_ID='$id'");
        $tmpl = array(
            'table_open' => '<table class="table table-bordered table-striped">',
            'heading_row_start' => '<tr class="success">',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',
            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            'table_close' => '</table>'
        );
        $this->table->set_template($tmpl);
        $this->table->set_heading('Book Name', 'Book Price', 'Sales Price', 'Quantity', 'Total Price');
        foreach ($query->result() as $value) {
            $this->subtotal = $value->sub_total;
            $this->discount = $value->discount;
            $this->table->add_row($value->book_name, $value->book_price, $value->price, $value->quantity, $value->total);
            $this->due = $value->due;
            $this->cash = $value->cash;
            $this->total = $value->total;
        }
        $query1 = $this->db->query("SELECT pub_contacts.name as cname,
            pub_contacts.district as cdistrict,
            pub_contacts.address as caddress,
            pub_contacts.phone as cphone,
            pub_memos.memo_ID as memoid
            FROM `pub_contacts`
            LEFT join pub_memos on pub_contacts.contact_ID=pub_memos.contact_ID
            where pub_memos.memo_ID='$id'");

        foreach ($query1->result() as $value) {
            $data['party_name'] = $value->cname;
            $data['phone'] = $value->cphone;
            $data['address'] = $value->caddress;
            $data['district'] = $value->cdistrict;
            $data['memoid'] = $value->memoid;
        }




        $cell = array('border' => 0, 'colspan' => 3);

        $this->table->add_row($cell, '<strong>মোট :</strong>', $this->subtotal);
        $this->table->add_row($cell, '<strong>বই ফেরত :</strong>', '(-) ');
        $this->table->add_row($cell, '<strong>বোনাস :</strong>', '(-) ' . $this->discount);



        $this->table->add_row($cell, '<strong>জমা :</strong>', $this->cash);
        $this->table->add_row($cell, '<strong>বাকি :</strong>', $this->due);
        $data['table'] = $this->table->generate();
        return $data;
    }

    // function listmemo(){
    // 	$query = $this->db->query("SELECT name,memo_ID,memo_serial,issue_date
    // 		from pub_memos LEFT join pub_contacts on
    // 		pub_memos.contact_ID=pub_contacts.contact_ID");
    // }
}
