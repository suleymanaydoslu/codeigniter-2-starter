<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Model\Users;

class UsersController extends Admin_Controller
{

    /* All users */
    public function all()
    {

        $this->data['users'] = Users::all();
        $this->data['count'] = Users::count_all();

        $this->load->view('panel/users/all', $this->data);
    }

    /* Show user */
    public function show($id)
    {
        $control = $this->data['user'] = Users::find($id);

        if ($control) {

            $this->load->view('panel/users/show', $this->data);
        } else {

            show_404();
        }
    }

    /* Edit user */
    public function edit($id)
    {
        $user = $this->data['user'] = Users::find($id);

        if ($user) {

            if ($this->input->post()) {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('firstname', 'Name', 'required|xss_clean');
                $this->form_validation->set_rules('lastname', 'Lastname', 'required|xss_clean');
                $this->form_validation->set_rules('email', 'Email Adress', 'required|xss_clean|valid_email');
                $this->form_validation->set_rules('pass', 'Password', 'min_length[6]|max_length[40]|xss_clean');
                $this->form_validation->set_rules('pass_again', 'Password Again', 'min_length[6]|max_length[40]|xss_clean|matches[pass]');

                if ($this->form_validation->run() == FALSE) {

                    $this->data['errorMessage'] = validation_errors();
                } else {

                    /* Email Sorgulaması */
                    if ($this->input->post('email') != $user->email) {

                        $check = Users::make()->where('email', $this->input->post('email'))->first();

                        if (count($check) > 0) {

                            $this->session->set_flashdata('error', 'This email adress belongs to someone');
                            redirect(base_url('panel/user/edit/' . $user->id));
                        }
                    }

                    /* Şifre değiştirilmek istenirse  */
                    if ($this->input->post('pass') && $this->input->post('pass_again')) {

                        $user->password = Users::cryptTo($this->input->post('pass'));
                    } else if ($this->input->post('pass') && $this->input->post('pass_again') == '') {

                        $this->session->set_flashdata('error', 'Please fill password again field!.');
                        redirect(base_url('panel/user/edit/' . $user->id));
                    }

                    /* Avatar güncelleme */
                    if ($_FILES['avatar']['error'] != 4) {

                        $newFileName = $_FILES['avatar']['name'];
                        $fileExt = array_pop(explode(".", $newFileName));
                        $filename = md5(time()) . "." . $fileExt;

                        $config['upload_path'] = 'assets/upload/avatars';
                        $config['allowed_types'] = 'png|jpg|jpeg';
                        $config['max_size'] = '10000';
                        $config['file_name'] = $filename;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('avatar')) {

                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect(base_url('panel/user/edit/' . $user->id));
                        } else {

                            if ($user->avatar) {

                                unlink($user->avatar);
                            }

                            $user->avatar = 'assets/upload/avatars/' . $filename;
                        }
                    }

                    $user->firstname = $this->input->post('firstname');
                    $user->lastname = $this->input->post('lastname');
                    $user->phone = $this->input->post('phone');
                    $user->email = $this->input->post('email');

                    if ($user->save()) {

                        $this->session->set_flashdata('success', 'Updated successfully.');
                        redirect(base_url('panel/user/edit/' . $user->id));
                    } else {

                        $this->data['errorMessage'] = "An error occured during update user";
                    }
                }
                $this->load->view('panel/users/edit', $this->data);

            } else {

                $this->load->view('panel/users/edit', $this->data);
            }

        } else {
            show_404();
        }
    }

    /* Create user */
    public function add()
    {

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'Name', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[5]|max_length[40]');
            $this->form_validation->set_rules('email', 'Email Adress', 'required|xss_clean|valid_email|is_unique[users.email]');

            if ($this->form_validation->run() == FALSE) {

                $this->data['errorMessage'] = validation_errors();
            } else {

                $array = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'type' => $this->input->post('type'),
                    'password' => Users::cryptTo($this->input->post('password'))
                );

                if ($_FILES['avatar']['error'] != 4) {

                    $newFileName = $_FILES['avatar']['name'];
                    $fileExt = array_pop(explode(".", $newFileName));
                    $filename = md5(time()) . "." . $fileExt;

                    $config['upload_path'] = 'assets/upload/avatars';
                    $config['allowed_types'] = 'png|jpg|jpeg';
                    $config['max_size'] = '10000';
                    $config['file_name'] = $filename;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('avatar')) {

                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        $this->session->set_flashdata('input_old', $array);
                        redirect(base_url('panel/user/add'));
                    } else {

                        $array['avatar'] = 'assets/upload/avatars/' . $filename;
                    }
                }

                $user = Users::make($array);

                if ($user->save(TRUE)) {

                    redirect(base_url('panel/users'));
                } else {

                    $this->data['errorMessage'] = 'An error occured.';
                }
            }
            $this->load->view('panel/users/add', $this->data);
        } else {

            $this->load->view('panel/users/add', $this->data);
        }
    }

    /* Delete user */
    public function delete($id)
    {

        $user = Users::find($id);

        if ($user) {

            if ($user->id == $this->session->userdata('id')) {

                $this->session->set_flashdata('error', 'You cant delete your own account');
                redirect(base_url('panel/users'));
            } else {

                if ($user->delete()) {

                    if ($user->avatar) {

                        unlink($user->avatar);
                    }

                    $this->session->set_flashdata('error', 'Deleted successfully');
                    redirect(base_url('panel/users'));
                } else {

                    $this->session->set_flashdata('error', 'An error occured.');
                    redirect(base_url('panel/users'));
                }
            }
        } else {

            show_404();
        }
    }
}
