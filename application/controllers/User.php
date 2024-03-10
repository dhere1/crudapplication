<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function index() {
    $this->load->model('User_model');
    $users = $this->User_model->all();
    $data = array();
    $data['users'] = $users;
    $this->load->view('list', $data);
  }

    function create() {
        $this->load->model('User_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

         
      if ($this->form_validation->run() == false) {
      $this->load->view('create');
 } else{
      //save record to daatabase
        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['email'] = $this->input->post('email');
        $formArray['created_at'] = date('Y-m-d');

        $this->User_model->create($formArray);
        $this->session->set_flashdata('success', 'Record added successfully!');
         redirect(base_url().'index.php/user/index');
        
      }
       
    } 
       
    function edit($userID) 
    {
      $this->load->model('User_model');
      $user = $this->User_model->getUser($userID);
      $data = array();
      $data['user'] = $user;
      $this->load->view('edit',$data);

    }


    public function update($user_ID)
    {
      $this->load->model('User_model');
      
      
      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      
      if($this->form_validation->run() == false) {
         $this->load->view('edit');
       } 
      else {
        

        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['email'] = $this->input->post('email');
        

        $this->User_model->updateUser($user_ID,$formArray);
        // $this->session->set_flashdata('success','Record updated successfully');
           redirect(base_url().'index.php/user/index');
      }

    }
    public function delete($user_ID)
    {
      $this->load->model('User_model');
      $user = $this->User_model->getUser($user_ID);
      if (empty($user)) {
        $this->session->set_flashdata('failure','Record not found in database');
         redirect(base_url().'index.php/user/index');

      }
      $this->User_model->deleteUser($user_ID);
        $this->session->set_flashdata('success','Record deleted successfully');
         redirect(base_url().'index.php/user/index');



    }


    
}
    