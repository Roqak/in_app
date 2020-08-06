<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Users crontroller for BE_USERS table
 */
class Loan extends BE_Controller
{

    /**
     * Constructs required variables
     */
    function __construct()
    {
        parent::__construct(NO_AUTH_CONTROL, 'Loans');
    }

    /**
     * List down the registered users
     */
    function index()
    {
        //get rows count
        $this->data['rows_count'] = $this->db->get('bs_loan')->countAllResults;

        // get users
        //$this->data['users'] = $this->db->get('bs_loan', $this->pag['per_page'], $this->uri->segment(4));
        $this->data['users'] = $this->db->get('bs_loan');

        // load index logic
        parent::index();
    }


    public function application()
    {

        if ($this->is_POST()) {

            //INCOMING FORM VALIDATION
            $this->form_validation->set_data($this->input->post());
            $this->form_validation->set_rules('business_name', 'Business Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
            $this->form_validation->set_rules('purpose', 'Purpose', 'required');
            $this->form_validation->set_rules('account', 'Account Details', 'required');
            $this->form_validation->set_rules('relative_1_name', 'Relative 1 Name', 'required');
            $this->form_validation->set_rules('relative_2_name', 'Relative 2 Name', 'required');
            $this->form_validation->set_rules('relative_1_phone', 'Relative 1 Phone', 'required');
            $this->form_validation->set_rules('relative_2_phone', 'Relative 2 Phone', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');

            if ($this->form_validation->run() == FALSE) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(422)
                    ->set_output(json_encode($this->form_validation->error_array()));
            }

            //IMAGE UPLOAD
            $config['upload_path'] = './uploads/loans';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('official_id')) {
                $error = ['error' => $this->upload->display_errors('', '')];
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(422)
                    ->set_output(json_encode($error));
            }
            $data['official_id'] = $this->upload->data();

            $checked = FALSE;
            if ($this->input->post('first_timer')) $checked = TRUE;

            $input = [
                'business_name' => $this->input->post('business_name'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'amount' => $this->input->post('amount'),
                'purpose' => $this->input->post('purpose'),
                'account' => $this->input->post('account'),
                'relative_1_name' => $this->input->post('relative_1_name'),
                'relative_2_name' => $this->input->post('relative_2_name'),
                'relative_1_phone_number' => $this->input->post('relative_1_phone'),
                'relative_2_phone_number' => $this->input->post('relative_2_phone'),
                'state' => $this->input->post('state'),
                'first_timer' => $checked,
                'official_id' => $data['official_id']['file_name'],

            ];

            if ($this->db->insert('bs_loan', $input)) {

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

        return force_download(realpath(FCPATH . "uploads/loans/{$this->uri->segment(4)}"), NULL);
    }
}
