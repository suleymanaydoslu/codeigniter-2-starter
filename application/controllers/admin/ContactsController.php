<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Model\Contact;

class ContactsController extends Admin_Controller
{

    /* Fetching all messages */
    public function home()
    {

        $this->data['messages'] = Contact::all();
        $this->data['count'] = Contact::count_all();

        $this->load->view('panel/contact/home', $this->data);
    }

    /* Show message */
    public function show($id)
    {

        $message = $this->data['message'] = Contact::find($id);

        if ($message) {

            $this->load->view('panel/contact/show', $this->data);
        } else {

            show_404();
        }
    }

    /* Deleting message */
    public function delete($id)
    {

        $message = Contact::find($id);

        if ($message) {

            if ($message->delete()) {

                $this->session->set_flashdata('success', 'Message deleted successfully.');
                redirect(base_url('panel/messages'));
            } else {

                $this->session->set_flashdata('error', 'An error occurred while deleting the message.');
                redirect(base_url('panel/messages'));
            }
        } else {

            show_404();
        }
    }
}
