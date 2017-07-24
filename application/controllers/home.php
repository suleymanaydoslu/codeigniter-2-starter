<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function index()
    {

        $where = array('slug' => 'anasayfa');
        $this->data['page_data'] = Model\Pages::make()->where($where)->first();
        $this->load->view('default/home', $this->data);
    }

    /* Yönetim Paneli Giriş Yaptırma */
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

                $this->data['errorMessage'] = 'Bilgileriniz Hatalı. Lütfen Tekrar Deneyin';
            }

            $this->load->view('panel/login', $this->data);
        } else {

            $this->load->view('panel/login', $this->data);
        }
    }

    /* giriş yaptırma */
    public function login()
    {

        $obj = new stdClass();
        $obj->title = 'Giriş';
        $obj->keywords = 'kombi, serviscilik,kursu, avrupa, birliği, proje';
        $obj->description = 'Kombi servisciliği kursu giriş sayfası';
        $this->data['page_data'] = $obj;

        if ($this->input->post()) {

            $email = $this->input->post('email');
            $password = Model\Users::cryptTo($this->input->post('password'));

            $user = Model\Users::make()->where(array('email' => $email, 'password' => $password))->first();

            if ($user && $user->type == 1) {

                $array = array(
                    'id' => $user->id,
                    'tc_kimlik' => $user->tc_kimlik,
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

                $this->data['errorMessage'] = 'Bilgileriniz Hatalı. Lütfen Tekrar Deneyin';
            }

            $this->load->view('default/login', $this->data);
        } else {

            $this->load->view('default/login', $this->data);
        }
    }

    /* Kayıt Olma*/
    public function signUp()
    {

        $obj = new stdClass();
        $obj->title = 'Kaydol';
        $obj->keywords = 'kombi, serviscilik,kursu, avrupa, birliği, proje';
        $obj->description = 'Kombi servisciliği kursu kayıt olma sayfası';
        $this->data['page_data'] = $obj;

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('tc_kimlik', 'TC Kimlik Numarası', 'required|xss_clean|is_unique[users.tc_kimlik]');
            $this->form_validation->set_rules('firstname', 'İsim', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Soyisim', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Adresi', 'required|xss_clean|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('phone', 'Telefonunuz', 'required|xss_clean');
            $this->form_validation->set_rules('password', 'Şifre', 'required|min_length[6]|max_length[40]|xss_clean');
            $this->form_validation->set_rules('password_again', 'Şifre Tekrar', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE) {

                $this->data['errorMessage'] = validation_errors();
            } else {

                //$password = Model\Users::cryptTo($this->input->post('password'));

                $array = array(
                    'tc_kimlik' => $this->input->post('tc_kimlik'),
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

                    $this->session->set_flashdata('success', 'Üye Kaydınız Başarıyla Alındı.');
                    redirect(base_url('kaydol'));
                } else {

                    $this->data['errorMessage'] = 'Üye kaydınız alınırken bir hata ile karşılaşıldı';
                }
            }
            $this->load->view('default/signup', $this->data);
        } else {

            $this->load->view('default/signup', $this->data);
        }
    }

    /* Çıkış Yaptırma*/
    public function logout()
    {

        $this->session->sess_destroy();
        redirect(base_url());
    }

    /* İletişim formu gönderme */
    public function postContact()
    {

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'Adınız', 'required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Soyadınız', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
            $this->form_validation->set_rules('phone', 'Telefon', 'required|xss_clean');
            $this->form_validation->set_rules('topic', 'Konu', 'required|xss_clean');
            $this->form_validation->set_rules('message', 'Mesaj', 'required|xss_clean');

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

                    $this->session->set_flashdata('success', 'Mesajınız Başarıyla Gönderildi.');
                    redirect(base_url('iletisim'));
                } else {

                    $this->session->set_flashdata('error', 'Mesajınız Gönderilemedi.');
                    redirect(base_url('iletisim'));
                }
            }
        }
    }

    /* İletişim formu gönderme */
    public function postRegister()
    {

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('group', 'Grup', 'required|xss_clean');
            $this->form_validation->set_rules('experience', 'Tecrübe', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'Açıklama', 'required|xss_clean');
            $this->form_validation->set_rules('graduate', 'Mezuniyet Durumu', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('on-kayit'));

            } else {

                $array = array(
                    'user_id' => $this->session->userdata('id'),
                    'group_id' => $this->input->post('group'),
                    'experience' => $this->input->post('experience'),
                    'description' => $this->input->post('description'),
                    'graduate' => $this->input->post('graduate'),
                    'created_at' => date('Y-m-d H:i:s')
                );

                $register = Model\Registers::make($array);

                if ($register->save()) {

                    $this->session->set_flashdata('success', 'Ön Kayıt Başvurunuz Başarıyla Gönderildi.');
                    redirect(base_url('profilim'));
                } else {

                    $this->session->set_flashdata('error', 'Başvurunuz Gönderilemedi.');
                    redirect(base_url('on-kayit'));
                }
            }
        }
    }
}