<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

    /* Homepage */
    public function index()
    {

        $where = array('slug' => 'anasayfa');
        $this->data['page_data'] = Model\Pages::make()->where($where)->first();
        $this->load->view('default/home', $this->data);
    }

    /* Login for admin panel */
    public function adminLogin()
    {

        if ($this->input->post()) {

            $email = $this->input->post('email');
            $password = Model\Users::cryptTo($this->input->post('password'));

            $user = Model\Users::make()->where(array('email' => $email, 'password' => $password))->first();

            if ($user && $user->type == 2) {

                $array = array(
                    'id' => $user->id,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'email' => $user->email,
                    'telephone' => $user->phone,
                    'type' => $user->type,
                    'admin_login' => TRUE
                );

                $this->session->set_userdata($array);

                redirect(base_url('panel'));
            } else {

                $this->data['errorMessage'] = 'Wrong credentials';
            }

            $this->load->view('panel/login', $this->data);
        } else {

            $this->load->view('panel/login', $this->data);
        }
    }

    /* login */
    public function login()
    {

        $obj = new stdClass();
        $obj->title = 'Login';
        $obj->keywords = 'keywords';
        $obj->description = 'description';
        $this->data['page_data'] = $obj;

        if ($this->input->post()) {

            $email = $this->input->post('email');
            $password = Model\Users::cryptTo($this->input->post('password'));

            $user = Model\Users::make()->where(array('email' => $email, 'password' => $password))->first();

            if ($user && $user->type == 1) {

                $array = array(
                    'id' => $user->id,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'email' => $user->email,
                    'telephone' => $user->phone,
                    'type' => $user->type,
                    'login' => TRUE
                );

                $this->session->set_userdata($array);

                redirect(base_url());
            } else {

                $this->data['errorMessage'] = 'Wrong credentials';
            }

            $this->load->view('default/login', $this->data);
        } else {

            $this->load->view('default/login', $this->data);
        }
    }

    /* Register */
    public function signUp()
    {

        $obj = new stdClass();
        $obj->title = 'Register';
        $obj->keywords = 'keywords';
        $obj->description = 'description';
        $this->data['page_data'] = $obj;

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'İsim', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Soyisim', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Adresi', 'required|xss_clean|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('phone', 'Telefonunuz', 'required|xss_clean');
            $this->form_validation->set_rules('password', 'Şifre', 'required|min_length[6]|max_length[40]|xss_clean');
            $this->form_validation->set_rules('password_again', 'Şifre Tekrar', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE) {

                $this->data['errorMessage'] = validation_errors();
            } else {

                $array = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'password' => Model\Users::cryptTo($this->input->post('password')),
                    'type' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                );

                $user = Model\Users::make($array);

                if ($user->save()) {

                    $this->session->set_flashdata('success', 'Registered successfully.');
                    redirect(base_url('kaydol'));
                } else {

                    $this->data['errorMessage'] = 'An error occured';
                }
            }
            $this->load->view('default/signup', $this->data);
        } else {

            $this->load->view('default/signup', $this->data);
        }
    }

    /* Logout */
    public function logout()
    {

        $this->session->sess_destroy();
        redirect(base_url());
    }

    /* Post contact form */
    public function postContact()
    {

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'Name', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean');
            $this->form_validation->set_rules('topic', 'Topic', 'required|xss_clean');
            $this->form_validation->set_rules('message', 'Message', 'required|xss_clean');

            $array = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'topic' => $this->input->post('topic'),
                'phone' => $this->input->post('phone'),
                'message' => $this->input->post('message'),
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('input_old', $array);
                redirect(base_url('iletisim'));

            } else {

                $message = Model\Contact::make($array);

                if ($message->save()) {

                    $this->session->set_flashdata('success', 'Message sended');
                    redirect(base_url('iletisim'));
                } else {

                    $this->session->set_flashdata('error', 'An error occurred.');
                    redirect(base_url('iletisim'));
                }
            }
        }
    }
}
