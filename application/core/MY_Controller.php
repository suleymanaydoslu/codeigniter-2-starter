<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $data;

    public function __construct()
    {

        parent::__construct();

        $this->data['csrf_token'] = $this->security->get_csrf_hash();
        $this->data['yol'] = getURL();

        /* catching messages on redirects */
        if ($this->session->flashdata('error')) {

            $this->data['errorMessage'] = $this->session->flashdata('error');
        } else if ($this->session->flashdata('success')) {

            $this->data['successMessage'] = $this->session->flashdata('success');
        }

        /* Catching input old on redirects */
        if ($this->session->flashdata('input_old')) {

            $this->data['input_old'] = $this->session->flashdata('input_old');
        }

        /* fetching user data from session */
        if ($this->session->userdata('admin_login') == TRUE || $this->session->userdata('login') == TRUE) {

            $this->data['user_info'] = $this->session->all_userdata();
        } else {

            $this->data['user_info'] = NULL;
        }

        /* for extra pages to show in menu */
        $this->data['extra_pages'] = Model\Pages::make()->where('is_stocked', 0)->all();
    }
}

class User_Controller extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();

        if ($this->session->userdata('admin_login') == TRUE) {
            redirect(base_url('panel'));
        }
        if ($this->session->userdata('login') != TRUE) {

            redirect(base_url('giris'));
        }
    }
}

class Admin_Controller extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();

        if ($this->session->userdata('login') == TRUE) {

            redirect(base_url('profilim'));
        }
        if ($this->session->userdata('admin_login') != TRUE) {
            redirect(base_url('panel/login'));
        }
    }
}
