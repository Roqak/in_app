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
        parent::__construct(MODULE_CONTROL, 'register_user_module');
    }

    /**
     * List down the registered users
     */
    function index()
    {

        //registered users filter
        $conds = array('register_role_id' => 4);

        // get rows count
        //$this->data['rows_count'] = $this->User->count_all($conds);

        // get users
        // $this->data['users'] = $this->User->get_all_by($conds, $this->pag['per_page'], $this->uri->segment(4));

        // load index logic
        parent::index();
    }

    /**
     * Searches for the first match in system users
     */
    function search()
    {

        // breadcrumb urls
        $data['action_title'] = get_msg('user_search');

        // handle search term
        $search_term = $this->searchterm_handler($this->input->post('searchterm'));

        // condition
        $conds = array('searchterm' => $search_term, 'registered_role_id' => 4);

        $this->data['rows_count'] = $this->User->count_all_by($conds);

        $this->data['users'] = $this->User->get_all_by($conds, $this->pag['per_page'], $this->uri->segment(4));

        parent::search();
    }
}
