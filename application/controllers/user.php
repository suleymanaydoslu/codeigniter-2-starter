<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends User_Controller
{

    /* Profile Edit*/
    public function profile()
    {

        $obj = new stdClass();
        $obj->title = 'My Profile';
        $obj->keywords = 'keywords';
        $obj->description = 'description';
        $this->data['page_data'] = $obj;

        $user = $this->data['user'] = Model\Users::find($this->session->userdata('id'));

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'İsim', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Soyisim', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Adresi', 'required|xss_clean|valid_email');
            $this->form_validation->set_rules('phone', 'Telefonunuz', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $this->data['errorMessage'] = validation_errors();
            } else {

                /* Email Sorgulaması */
                if ($this->input->post('email') != $user->email) {

                    $check = Model\Users::make()->where('email', $this->input->post('email'))->first();

                    if (count($check) > 0) {

                        $this->session->set_flashdata('error', 'existing email adress.');
                        redirect(base_url('profilim'));
                    }
                }

                $user->firstname = $this->input->post('firstname');
                $user->lastname = $this->input->post('lastname');
                $user->email = $this->input->post('email');
                $user->phone = $this->input->post('phone');
                $user->updated_at = date('Y-m-d H:i:s');

                if ($this->input->post('password')) {

                    $user->password = Model\Users::cryptTo($this->input->post('password'));
                }

                if ($user->save()) {

                    $this->session->set_flashdata('success', 'Updated successfully.');
                    redirect(base_url('profilim'));
                } else {

                    $this->data['errorMessage'] = 'An error occurred';
                }
            }
            $this->load->view('default/profile', $this->data);
        } else {

            $this->load->view('default/profile', $this->data);
        }
    }
}
