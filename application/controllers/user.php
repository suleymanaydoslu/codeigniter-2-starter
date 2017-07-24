<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends User_Controller
{

    /* Profile Edit*/
    public function profile()
    {

        $obj = new stdClass();
        $obj->title = 'Profilim';
        $obj->keywords = 'kombi, serviscilik,kursu, avrupa, birliği, proje';
        $obj->description = 'Kombi servisciliği kursu profilim sayfası';
        $this->data['page_data'] = $obj;

        $user = $this->data['user'] = Model\Users::find($this->session->userdata('id'));

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('tc_kimlik', 'TC Kimlik Numarası', 'required|xss_clean]');
            $this->form_validation->set_rules('firstname', 'İsim', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Soyisim', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Adresi', 'required|xss_clean|valid_email');
            $this->form_validation->set_rules('phone', 'Telefonunuz', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $this->data['errorMessage'] = validation_errors();
            } else {

                /* TC kimlik no sorgulaması */
                if ($this->input->post('tc_kimlik') != $user->tc_kimlik) {

                    $check = Model\Users::make()->where('tc_kimlik', $this->input->post('tc_kimlik'))->first();

                    if (count($check) > 0) {

                        $this->session->set_flashdata('error', 'Bu T.C. kimlik numarası başka bir kullanıcıya ait.');
                        redirect(base_url('profilim'));
                    }
                }

                /* Email Sorgulaması */
                if ($this->input->post('email') != $user->email) {

                    $check = Model\Users::make()->where('email', $this->input->post('email'))->first();

                    if (count($check) > 0) {

                        $this->session->set_flashdata('error', 'Bu email adresi başka bir kullanıcıya ait.');
                        redirect(base_url('profilim'));
                    }
                }

                $user->tc_kimlik = $this->input->post('tc_kimlik');
                $user->firstname = $this->input->post('firstname');
                $user->lastname = $this->input->post('lastname');
                $user->email = $this->input->post('email');
                $user->phone = $this->input->post('phone');
                $user->updated_at = date('Y-m-d H:i:s');

                if ($this->input->post('password')) {

                    $user->password = Model\Users::cryptTo($this->input->post('password'));
                }

                if ($user->save()) {

                    $this->session->set_flashdata('success', 'Profiliniz başarıyla güncellendi.');
                    redirect(base_url('profilim'));
                } else {

                    $this->data['errorMessage'] = 'Profiliniz güncellenirken bir hata ile karşılaşıldı';
                }
            }
            $this->load->view('default/profile', $this->data);
        } else {

            $this->load->view('default/profile', $this->data);
        }
    }

    /* Başvuru güncelleme */
    public function editApply($id)
    {

        $obj = new stdClass();
        $obj->title = 'Başvuru Güncelleme';
        $obj->keywords = 'kombi, serviscilik,kursu, avrupa, birliği, proje';
        $obj->description = 'Kombi servisciliği kursu başvuru güncelleme sayfası';
        $this->data['page_data'] = $obj;

        $this->data['register'] = $register = Model\Registers::find($id);
        $this->data['groups'] = Model\Groups::all();

        if ($register) {
            if ($register->user_id == $this->session->userdata('id')) {

                if ($this->input->post()) {

                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('group', 'Katılacağınız grup', 'required|xss_clean');
                    $this->form_validation->set_rules('experience', 'Tecrübeniz', 'required|xss_clean');
                    $this->form_validation->set_rules('description', 'Açıklamanız', 'required|xss_clean');

                    if ($this->form_validation->run() == FALSE) {

                        $this->data['errorMessage'] = validation_errors();
                    } else {

                        $register->group_id = $this->input->post('group');
                        $register->experience = $this->input->post('experience');
                        $register->description = $this->input->post('description');
                        $register->updated_at = date('Y-m-d H:i:s');

                        if ($register->save()) {

                            $this->session->set_flashdata('success', 'Başvurunuz başarıyla güncellendi.');
                            redirect(base_url('basvuru-guncelle/' . $register->id));
                        } else {

                            $this->data['errorMessage'] = 'Başvurunuz güncellenirken bir hata ile karşılaşıldı';
                        }
                    }
                    $this->load->view('default/edit_apply', $this->data);
                } else {

                    $this->load->view('default/edit_apply', $this->data);
                }
            } else {

                show_404();
            }
        } else {
            show_404();
        }
    }

    /* Başvuru Silme */
    public function deleteApply($id)
    {

        $register = Model\Registers::find($id);

        if ($register) {

            if ($register->user_id == $this->session->userdata('id')) {

                if ($register->delete()) {

                    $this->session->set_flashdata('error', 'Başvurunuz başarıyla silindi.');
                    redirect(base_url('profilim'));

                } else {

                    $this->session->set_flashdata('error', 'Başvurunuz silinirken bir hata ile karşılaşıldı.');
                    redirect(base_url('profilim'));
                }
            } else {

                show_404();
            }
        } else {
            show_404();
        }
    }
}
