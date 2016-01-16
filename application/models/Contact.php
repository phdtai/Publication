<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author MD. Mashfiq
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Model {

//put your code here
    public function set_filter($grocery_crud = false) {
        $district = $this->input->post('filter_district');
        $division = $this->input->post('filter_division');
        $upazila = $this->input->post('filter_upazila');
        $subject = $this->input->post('filter_subject');
        if ($district) {
            $grocery_crud->where('district', $district);
        }
        if ($division) {
            $grocery_crud->where('division', $division);
        }
        if ($upazila) {
            $grocery_crud->where('upazila', $upazila);
        }
        if ($subject) {
            $grocery_crud->where('subject', $subject);
        }
        return $grocery_crud;
    }

    function filter_dropdowns() {
        $district = $this->input->post('filter_district');
        $division = $this->input->post('filter_division');
        $upazila = $this->input->post('filter_upazila');
        $subject = $this->input->post('filter_subject');
        $filter_dropdowns['dropdown_division'] = form_dropdown('filter_division', $this->config->item('division'), $division, 'class="form-control" style="width: 200px;"');
        $filter_dropdowns['dropdown_district'] = form_dropdown('filter_district', $this->config->item('districts_english'), $district, 'class="form-control" style="width: 200px;"');
        $filter_dropdowns['dropdown_upazila'] = form_dropdown('filter_upazila', $this->config->item('upazila_english'), $upazila, 'class="form-control" style="width: 200px;"');
        $filter_dropdowns['dropdown_subject'] = form_dropdown('filter_subject', $this->config->item('teacher_subject'), $subject, 'class="form-control" style="width: 200px;"');

        return $filter_dropdowns;
    }

}
