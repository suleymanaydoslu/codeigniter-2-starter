<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends Admin_Controller
{

    /* Fetching all messages */
    public function home()
    {

        $this->data['messages'] = Model\Contact::all();
        $this->data['count'] = Model\Contact::count_all();

        $this->load->view('panel/contact/home', $this->data);
    }

    /* Show message */
    public function show($id)
    {

        $message = $this->data['message'] = Model\Contact::find($id);

        if ($message) {

            $this->load->view('panel/contact/show', $this->data);
        } else {

            show_404();
        }
    }

    /* Deleting nessage */
    public function delete($id)
    {

        $message = Model\Contact::find($id);

        if ($message) {

            if ($message->delete()) {

                $this->session->set_flashdata('success', 'Message deleted successfully.');
                redirect(base_url('panel/contacts'));
            } else {

                $this->session->set_flashdata('error', 'An error occured while deleting the message.');
                redirect(base_url('panel/contacts'));
            }
        } else {

            show_404();
        }
    }
}
