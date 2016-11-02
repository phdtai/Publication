<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Sales_edit_model
 * 
 * This will be user for edit an sale entity
 * 
 * Referense document : https://drive.google.com/file/d/0BycC64dJHo0JUXluYXNHZ2trNm8/view?usp=sharing
 *
 * @author MD. Mashfiq
 */
class Sales_edit_model extends CI_Model {

    private $existing_data;     // this will be grabbed from the database
    private $changed_data;      // This will be grabbed from the edit from

    /*
     * This is test data section
     * Here dummy data will be added for testing purpose
     */

    function test_data() {

       $data['existing_data'] =  $this->existing_data = array(
            'id_sales_total_sales' => 234,
            "id_customer" => "60",
            'item_selection' => array(
                array(
                    "id_item" => 1,
                    "item_quantity" => 2,
                    "name" => "ব্যবসায় সংগঠন ও ব্যবস্হাপনা - প্রথম পত্র",
                    "regular_price" => "205",
                    "sale_price" => "140",
                    "total" => 280 // should be calculated
                ), // should be calculated
                array(
                    "id_item" => 3,
                    "item_quantity" => 5,
                    "name" => "Business Organization & Management 2nd Paper",
                    "regular_price" => "200",
                    "sale_price" => "140",
                    "total" => 280 // should be calculated
                ), // should be calculated
                array(
                    "id_item" => 34,
                    "item_quantity" => 5,
                    "name" => "Business Organization & Management 2nd Paper",
                    "regular_price" => "200",
                    "sale_price" => "140",
                    "total" => 280 // should be calculated
                )
            ),
            'sub_total' => 560,
            "discount_amount" => 0,
            "discount_percentage" => 0,
            'total_amount' => 560,
            "dues_unpaid" => 0,
            'payment_info_cash' => 210,
            'payment_info_bank' => 210,
            'payment_info_customer_balance_reduction' => 0,
            'total_paid' => 461,
            'total_due' => 101,
            "number_of_packet" => 5,
            'bill_for_packeting' => 31,
            'slip_expense_amount' => 40
        );
       
       $data['changed_data'] =  $this->changed_data = array(
            'id_total_sales' => 70,
            "id_customer" => "60",
             'item_selection' => array(
                array(
                    "id_item" => 1,
                    "item_quantity" => 7,
                    "name" => "ব্যবসায় সংগঠন ও ব্যবস্হাপনা - প্রথম পত্র",
                    "regular_price" => "205",
                    "sale_price" => "140",
                    "total" => 280 // should be calculated 'ffff
                ), // should be calculated
                array(
                    "id_item" => 3,
                    "item_quantity" => 2,
                    "name" => "Business Organization & Management 2nd Paper",
                    "regular_price" => "207",
                    "sale_price" => "140",
                    "total" => 280 // should be calculated
                ), // should be calculated
                array(
                    "id_item" => 5,
                    "item_quantity" => 2,
                    "name" => "Business Organization & Management 2nd Paper",
                    "regular_price" => "205",
                    "sale_price" => "140",
                    "total" => 280 // should be calculated
                )
            ),
            'sub_total' => 560,
            "discount_amount" => 0,
            "discount_percentage" => 0,
            'total_amount' => 560,
            "dues_unpaid" => 0,
            'payment_info_cash' => 2600,
            'payment_info_bank' => 260,
            'payment_info_customer_balance_reduction' => 0,
            'total_paid' => 460,
            'total_due' => 100,
            "number_of_packet" => 5,
            'bill_for_packeting' => 30,
            'slip_expense_amount' => 40
        );
       
        
        
        return $data;
    }

    /*
     * This function will grabb data from the database+edit from and initialize to the respective variable
     */

    function grab_data($id_sales_total_sales = null) {
//         return $this->test_data();
        $sales_results = $this->db->select('*')
                        ->from('sales_total_sales')->get()->result();
        $sales = $this->db->select('*')
                ->from('view_customer_paid_unmarged')->get()->result();
        $items = $this->db->get('items')->result_array();
        foreach ($sales_results as $result) {
            $sales = $this->db->select('*')
                ->from('view_customer_paid_unmarged')->where('id_total_sales',$result->id_total_sales)->get()->row();
            $this->existing_data = array('id_sales_total_sales' => $result->id_total_sales,
            'id_customer' => $result->id_customer,
            'item_selection' => $items,
            'sub_total' => $result->sub_total,
            "discount_amount" => $result->discount_amount,
            "discount_percentage" => $result->discount_percentage,
            'total_amount' => $result->total_amount,
            "dues_unpaid" => $result->total_due,
            'payment_info_cash' => $sales->cash_paid,
            'payment_info_bank' => $sales->bank_paid,
            'payment_info_customer_balance_reduction' => $result->id_customer,
            'total_paid' => $result->total_paid,
            'total_due' => $result->total_due,
            "number_of_packet" => $result->number_of_packet,
            'bill_for_packeting' => $result->bill_for_packeting,
            'slip_expense_amount' => $result->slip_expense_amount);
        }
//        $bank = $this->db->select('*')->from;
        return $this->existing_data;
    }

    /*
     * This function will update the test sales table in the database
     */
    function existing_memo_data($id){
        return $this->db->get_where( ' sales_total_sales ' , '`id_total_sales`= '.$id )->row_array();
    }
     function existing_memo_items($id){
        return $this->db->get_where( ' sales ' , '`id_total_sales`= '.$id )->result_array();
    }
    
    function sales_update( $memo_id,$modified_data ) {
        
        $array1 = $this->existing_memo_data($memo_id);
        $array2 = $modified_data;
        
        
        $existing_items= $this->existing_memo_items($memo_id);
        $changed_items=$array2['item_selection'];
        
        $update_sales = array();
        $items = array();
        

//        unset($array1['item_selection']);
        unset($array2['item_selection']);
        
        echo '<pre>';
        print_r($existing_items);
        print_r($changed_items);
        exit();
        
                foreach($array1 as $key1 => $value1){
                    foreach($array2 as $key2 => $value2){
                        if($key1 == $key2){                            
                            if( $value1 != $value2 ){
                                $update_sales[$key1] = $value2; 
                            }
                        }
                    }

                }


                $update_item=array();
//                $array_index=array();
                 foreach($changed_items as $key1 => $value1){                   
                     
                    foreach($existing_items as $key2 => $value2){
                        
                        if($value2['id_item'] == $value1['id_item']){
                            foreach($value2 as $index1 => $val1){
                                foreach ($value1 as $index2 => $val2 ){
                                    if($index1 == $index2){
                                        if($val1 != $val2){
                                            $update_item[$value1['id_item']][$index1] = $val1;
                                        }
                                    }
                                }
                            }
                             unset($existing_items[$key2]);
                             unset($changed_items[$key2]);
                        }                        

                    }
//                    print_r($array_index);
//                     if(!empty($array_index)){
//                        unset($existing_items[$array_index]);
//                    }
                    

                }
                
                print_r($existing_items);
                
                //seles_tota_sales memo update
                $sales_memo = "UPDATE sales_total_sales SET  ";
                    foreach($update_sales as $key => $value){
                        $sales_memo.=" $key = '$value',";
                    }
                    $sales_memo = rtrim($sales_memo,',');
                    $sales_memo.=" WHERE id_total_sales = ".$array1['id_total_sales'];
                    
                echo $sales_memo;
   

//        print_r($result);   
        
        echo '<pre>';
//        print_r($update_sales); 
        print_r($update_item);
        print_r($changed_items);
    
    }
    
    function update_sales_total_sales($data,$id){
        $data = array(
            'id_customer' => '',
            'discount_percentage' => '',
            'discount_amount' => '',
            'sub_total' => '',
            'total_amount' => '',
            'total_paid' => '',
            'total_due' => '',
            'issue_date' => '',
            'number_of_packet' => '',
            'bill_for_packeting' => '',
            'slip_expense_amount' => '',
        );
        $this->db->where('id_total_sales',$id);
        $this->db->update('sales_total_sales',$data);
    }

    /*
     * This function will update the final stock
     */

    function stock_update() {
        
    }

    /*
     * If user increase or decrease the slip expense or bill payment option then it will be used to add row in expense table
     */

    function expense_update() {
        $id = $this->input->post('id_total_sales');
        $slip['amount_expense'] = $this->input->post('slip_expense_amount');
        $slip['date_expense'] = Date('Y-m-d H:i:s');
        $slip['id_name_expense'] = '4';
        $bill['amount_expense'] = $this->input->post('bill_for_packeting');
        $bill['date_expense'] = Date('Y-m-d H:i:s');
        $bill['id_name_expense'] = '3';
        $result = $this->db->get_where('sales_total_sales',array('id_total_sales' => $id))->row();
        if($slip['amount_expense'] < $result->slip_expense_amount || $slip['amount_expense'] > $result->slip_expense_amount ){
            $this->db->insert('expense',$slip);
            return true;
        }
        if($bill['amount_expense'] < $result->bill_for_packeting || $bill['amount_expense'] > $result->bill_for_packeting){
            $this->db->insert('expense',$bill);
            return true;
        }
        return false;
    }

    /*
     * 1. insert a row to payment log and the amount will be negetive
     * 2. new status colum need to be added to identify to row as edited adjust ment .
     * 3. Reduce from the cash balance
     */

    function reduce_cash($id_total_sales, $id_customer, $reduced_paid_amount) {
        $this->load->model("misc/Cash");
        if ($this->Cash->reduce($reduced_paid_amount) == FALSE) {
            return FALSE;
        }
        $this->load->model("misc/Customer_payment");
        $this->Customer_payment->payment_register($id_customer, -$reduced_paid_amount, $id_total_sales, 1,1);
        return true;
    }

    /*
     * 1. insert a row to payment log and the amount will be negetive
     * 2. new status colum need to be added to identify to row as edited adjust ment .
     * 3. Reduce from the cash balance
     */

    function increase_cash($id_total_sales, $id_customer, $increased_paid_amount) {
        $this->load->model("misc/Cash");
        if ($this->Cash->add($increased_paid_amount) == FALSE) {
            return FALSE;
        }
        $this->load->model("misc/Customer_payment");
        $this->Customer_payment->payment_register($id_customer, $increased_paid_amount, $id_total_sales, 1,1);
        return true;
    }

    /*
     * 1. use $this->Customer_due->add($id_customer, $amount) 
     */

    function increase_due() {
        
    }

    /*
     * 1. use proper model to execute this function
     */

    function increase_advance_balence($id_customer, $amount, $method = "as bank") {
        
    }

    function situation_selector() {
        
    }

    function situation_1_case_1() {
        
    }

    function situation_2_case_1() {
        
    }

    function situation_3_case_1() {
        
    }

    function situation_4_case_1() {
        
    }

    function situation_5_case_1() {
        
    }

    function situation_6_case_1() {
        
    }

    function situation_7_case_1() {
        
    }

    function situation_1_case_2() {
        
    }

    function situation_2_case_2() {
        
    }

    function situation_3_case_2() {
        
    }

    function situation_4_case_2() {
        
    }

    function situation_5_case_2() {
        
    }

    function situation_6_case_2() {
        
    }

    function situation_7_case_2() {
        
    }

}
