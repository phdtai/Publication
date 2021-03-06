<?php

/**
 * Description of Contact
 *
 * @author MD. Mashfiq
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contacts_model extends CI_Model {

//put your code here
    public function set_filter($grocery_crud = false) {
        $cmd = $this->uri->segment(3);
        $teacher_name = $this->input->post('filter_teacher_name');
        $district = $this->input->post('filter_district');
        $division = $this->input->post('filter_division');
        $upazila = $this->input->post('filter_upazila');
        $subject = $this->input->post('filter_subject');
        $institute_name = $this->input->post('filter_institute_name');

        //setting session
        if ($teacher_name) {
            $this->session->set_userdata('contact_teacher_name', $teacher_name);
        }
        if ($district) {
            $this->session->set_userdata('contact_district', $district);
        }
        if ($division) {
            $this->session->set_userdata('contact_division', $division);
        }
        if ($upazila) {
            $this->session->set_userdata('contact_upazila', $upazila);
        }
        if ($subject) {
            $this->session->set_userdata('contact_subject', $subject);
        }
        if ($institute_name) {
            $this->session->set_userdata('contact_institute_name', $institute_name);
        }

        if ($cmd == 'reset_filter') {
            $this->session->unset_userdata('contact_teacher_name');
            $this->session->unset_userdata('contact_district');
            $this->session->unset_userdata('contact_division');
            $this->session->unset_userdata('contact_upazila');
            $this->session->unset_userdata('contact_subject');
            $this->session->unset_userdata('contact_institute_name');
            redirect("contacts/teacher");
        }

        if ($this->session->userdata('contact_teacher_name') != '') {
//            die("<script>alert('" . $this->session->userdata('contact_teacher_name') . "');</script>");
            $teacher_name = $this->session->userdata('contact_teacher_name');
            $grocery_crud->where("`name` LIKE  '%$teacher_name%'");
        }
        if ($this->session->userdata('contact_district') != '') {
            $district = $this->session->userdata('contact_district');
            $grocery_crud->where('district', $district);
        }
        if ($this->session->userdata('contact_division') != '') {
            $division = $this->session->userdata('contact_division');
            $grocery_crud->where('division', $division);
        }
        if ($this->session->userdata('contact_upazila') != '') {
            $upazila = $this->session->userdata('contact_upazila');
            $grocery_crud->where('upazila', $upazila);
        }
        if ($this->session->userdata('contact_subject') != '') {
            $subject = $this->session->userdata('contact_subject');
            $grocery_crud->where('id_contact_teacher_sucject', $subject);
        }
        if ($this->session->userdata('contact_institute_name') != '') {
            $institute_name = $this->session->userdata('contact_institute_name');
            $grocery_crud->where("`institute_name` LIKE  '%$institute_name%'");
        }

        return $grocery_crud;
    }

    function filter_elements() {
        $teacher_name = $this->input->post('filter_teacher_name');
        $district = $this->input->post('filter_district');
        $division = $this->input->post('filter_division');
        $upazila = $this->input->post('filter_upazila');
        $subject = $this->input->post('filter_subject');
        $institute_name = $this->input->post('filter_institute_name');
        if ($this->session->userdata('contact_teacher_name') != '') {
            $teacher_name = $this->session->userdata('contact_teacher_name');
        }
        if ($this->session->userdata('contact_district') != '') {
            $district = $this->session->userdata('contact_district');
        }
        if ($this->session->userdata('contact_division') != '') {
            $division = $this->session->userdata('contact_division');
        }
        if ($this->session->userdata('contact_upazila') != '') {
            $upazila = $this->session->userdata('contact_upazila');
        }
        if ($this->session->userdata('contact_subject') != '') {
            $subject = $this->session->userdata('contact_subject');
        }
        if ($this->session->userdata('contact_institute_name') != '') {
            $institute_name = $this->session->userdata('contact_institute_name');
        }

        $filter_elements['input_teacher_name'] = form_input('filter_teacher_name', $teacher_name, 'class="form-control" style="width: 200px;"');
        $filter_elements['input_institute_name'] = form_input('filter_institute_name', $institute_name, 'class="form-control" style="width: 200px;"');

        $filter_elements['dropdown_division'] = form_dropdown('filter_division', $this->config->item('division'), $division, 'class="form-control select2" style="width: 200px;"');
        $filter_elements['dropdown_district'] = form_dropdown('filter_district', $this->config->item('districts_english'), $district, 'class="form-control select2" style="width: 200px;"');
        $filter_elements['dropdown_upazila'] = form_dropdown('filter_upazila', $this->config->item('upazila_english'), $upazila, 'class="form-control select2" style="width: 200px;"');
        $filter_elements['dropdown_subject'] = $this->get_contact_teacher_sucject_dropdown($subject);

        return $filter_elements;
    }

    function get_contact_teacher_sucject_dropdown($subject = "") {
        $results = $this->db->select("*")->get("contact_teacher_sucject")->result();
        $teacher_subjects[''] = '';
        foreach ($results as $value) {
            $teacher_subjects[$value->id_contact_teacher_sucject] = $value->subject_name;
        }
        return form_dropdown('filter_subject', $teacher_subjects, $subject, 'class="form-control select2" style="width: 200px;"');
    }

    function agent_type_setter_post_array($post_array) {
        $post_array['type'] = 'Agent';
        $value = $this->input->post('phone');
        $values = $this->Common->bn2enNumber ($value);
        $post_array['phone'] =  $values ;

        return $post_array;
    }

    function marketing_officer_type_setter_post_array($post_array) {
        $post_array['type'] = 'Marketing Officer';
        $value = $this->input->post('phone');
        $values = $this->Common->bn2enNumber ($value);
        $post_array['phone'] =  $values ;
        return $post_array;
    }

}
