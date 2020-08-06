<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Users crontroller for BE_USERS table
 */
class Verification extends BE_Controller
{

    /**
     * Constructs required variables
     */
    function __construct()
    {
        parent::__construct(NO_AUTH_CONTROL, 'Verified Users');
    }

    /**
     * List down the registered users
     */
    function index()
    {
        //get rows count
        $this->data['rows_count'] = $this->db->get('bs_verification')->countAllResults;

        // get users
        //$this->data['users'] = $this->db->get('bs_verification', $this->pag['per_page'], $this->uri->segment(4));
        $this->data['users'] = $this->db->get('bs_verification');

        // load index logic
        parent::index();
    }


    public function verify()
    {

        if ($this->is_POST()) {

            //INCOMING FORM VALIDATION
            $this->form_validation->set_data($this->input->post());
            $this->form_validation->set_rules('personal_name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('number', 'Phone number', 'required');
            $this->form_validation->set_rules('business_name', 'Business Name', 'required');
            // $this->form_validation->set_rules('official_id', 'Official ID', 'required');
            // $this->form_validation->set_rules('passport', 'Passport', 'required');

            if ($this->form_validation->run() == FALSE) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(422)
                    ->set_output(json_encode($this->form_validation->error_array()));
            }

            //IMAGE UPLOAD
            $config['upload_path'] = './uploads/verification';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('official_id')) {
                $error = array('error' => $this->upload->display_errors('', ''));
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(422)
                    ->set_output(json_encode($error));
            }
            $data['official_id'] = $this->upload->data();

            if (!$this->upload->do_upload('passport')) {
                $error = array('error' => $this->upload->display_errors('', ''));
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(422)
                    ->set_output(json_encode($error));
            }
            $data['passport'] = $this->upload->data();

            $input = [
                'personal_name' => $this->input->post('personal_name'),
                'username' => $this->input->post('personal_name'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('number'),
                'business_name' => $this->input->post('business_name'),
                'official_id' => $data['official_id']['file_name'],
                'passport' => $data['passport']['file_name']
            ];

            if ($this->db->insert('bs_verification', $input)) {

                $success = [
                    'status' => TRUE,
                    'message' => 'Success'
                ];
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($success));
            }

            $success = [
                'status' => FALSE,
                'message' => 'Server Side Error.Try Again'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode($success));
        }
    }

    public function download()
    {
        $this->load->helper('download');

        return force_download(realpath(FCPATH . "uploads/verification/{$this->uri->segment(4)}"), NULL);
    }
}
