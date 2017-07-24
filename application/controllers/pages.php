<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller
{

    /* get page */
    public function getPageData()
    {

        $segment = $this->uri->uri_string();

        $where = array('slug' => $segment);
        $data = $this->data['page_data'] = Model\Pages::make()->where($where)->first();

        if ($data) {

            if ($data->slug == 'anasayfa') {

                redirect(base_url());
            } else {

                // example
                /*
                if ($data->slug == 'duyurular') {

                    $this->data['nots'] = Model\Notifications::all();
                }
                **/

                $this->load->view($data->view, $this->data);
            }
        } else {
            show_404();
        }
    }

    /* language change */
    public function switchLanguage($language = "")
    {

        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);

        $ref = $_SERVER["HTTP_REFERER"];
        redirect($ref);
    }
}
