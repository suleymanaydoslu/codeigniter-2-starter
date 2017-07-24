<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Admin_Controller
{

    /* Fetching all settings */
    public function all()
    {

        $this->data['settings'] = Model\Settings::all();
        $this->data['count'] = Model\Settings::count_all();

        $this->load->view('panel/settings/home', $this->data);
    }

    /* update setting */
    public function edit($id)
    {

        $setting = $this->data['setting'] = Model\Settings::find($id);

        if ($setting) {

            if ($_FILES) {

                if ($_FILES['file']['error'] != 4) {

                    $newFileName = $_FILES['file']['name'];
                    $fileExt = array_pop(explode(".", $newFileName));
                    $filename = md5(time()) . "." . $fileExt;

                    $config['upload_path'] = 'assets/img';
                    $config['allowed_types'] = 'png|jpg|jpeg';
                    $config['max_size'] = '10000';
                    $config['file_name'] = $filename;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {

                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url('panel/setting/edit/' . $setting->id));
                    } else {

                        if ($setting->value) {

                            unlink($setting->value);
                        }
                        $filename = 'assets/img/' . $filename;

                        $setting->value = $filename;

                        if ($setting->save()) {

                            $this->session->set_flashdata('success', 'Updated successfully.');
                            redirect(base_url('panel/settings'));
                        } else {

                            $this->data['errorMessage'] = "An error occured while updating setting";
                        }
                    }
                } else {

                    $filename = $setting->value;
                }

            } else if ($this->input->post()) {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('value', 'Setting value', 'required|xss_clean');

                if ($this->form_validation->run() == FALSE) {

                    $this->data['errorMessage'] = validation_errors();
                } else {

                    $setting->value = $this->input->post('value');

                    if ($setting->save()) {

                        $this->session->set_flashdata('success', 'Updated successfully');
                        redirect(base_url('panel/settings'));
                    } else {

                        $this->data['errorMessage'] = "An error occured while updating setting";
                    }
                }

                $this->load->view('panel/settings/edit', $this->data);
            } else {

                $this->load->view('panel/settings/edit', $this->data);
            }
        } else {
            show_404();
        }
    }
}
