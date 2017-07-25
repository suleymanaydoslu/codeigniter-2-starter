<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Model\Users;
use Model\Contact;

class HomeController extends Admin_Controller
{

    /* Admin Dashboard */
    public function index()
    {

        $this->data['user_count'] = count(Users::make()->where('type', 1)->all());
        $this->data['messages'] = Contact::limit(5)->order_by('created_at', 'DESC')->all();

        $this->load->view('panel/home', $this->data);
    }
}
