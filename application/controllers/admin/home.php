<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller
{

    /* Admin Dashboard */
    public function index()
    {

        $this->data['user_count'] = count(Model\Users::make()->where('type', 1)->all());
        $this->data['messages'] = Model\Contact::limit(5)->order_by('created_at', 'DESC')->all();

        $this->load->view('panel/home', $this->data);
    }
}
