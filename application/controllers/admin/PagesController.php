<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Model\Pages;

class PagesController extends Admin_Controller
{

    /* Getting all the pages */
    public function all()
    {

        $this->data['pages'] = Pages::all();
        $this->data['count'] = Pages::count_all();

        $this->load->view('panel/pages/home', $this->data);
    }

    /* Edit page */
    public function edit($id)
    {

        $page = $this->data['page'] = Pages::find($id);

        if ($page) {

            if ($this->input->post()) {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('title', 'Page Name', 'required|xss_clean');
                $this->form_validation->set_rules('meta_keywords', 'Google Seo Keywords', 'required|xss_clean');
                $this->form_validation->set_rules('meta_description', 'Google Seo Description', 'required|xss_clean');
                $this->form_validation->set_rules('content', 'Content', 'required|xss_clean');

                if ($this->form_validation->run() == FALSE) {

                    $this->data['errorMessage'] = validation_errors();
                } else {

                    $page->title = $this->input->post('title');
                    $page->keywords = $this->input->post('meta_keywords');
                    $page->description = $this->input->post('meta_description');
                    $page->content = $this->input->post('content');

                    if ($page->save()) {

                        $this->session->set_flashdata('success', 'Updated successfully.');
                        redirect(base_url('panel/pages'));
                    } else {

                        $this->data['errorMessage'] = "An error occured while updating page";
                    }
                }

                $this->load->view('panel/pages/edit', $this->data);
            } else {

                $this->load->view('panel/pages/edit', $this->data);
            }
        } else {
            show_404();
        }
    }

    /* Creating a page */
    public function add()
    {

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Page name', 'required|xss_clean');
            $this->form_validation->set_rules('meta_keywords', 'Google Seo Keywords', 'required|xss_clean');
            $this->form_validation->set_rules('meta_description', 'Google Seo Description', 'required|xss_clean');
            $this->form_validation->set_rules('content', 'Content', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $this->data['errorMessage'] = validation_errors();
            } else {

                $slug = url_title($this->input->post('title'), 'dash', TRUE);
                $slug_check = Pages::make()->where('slug', $slug)->first();

                if ($slug_check > 0) {

                    $slug = $slug . '_' . random_string('alnum', 2);
                }

                $array = array(
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('meta_keywords'),
                    'description' => $this->input->post('meta_description'),
                    'content' => $this->input->post('content'),
                    'is_stocked' => 0,
                    'slug' => $slug,
                    'view' => 'default/pages/basic.tpl'
                );

                $page = Pages::make($array);

                if ($page->save(TRUE)) {

                    $this->session->set_flashdata('success', 'Created successfully');
                    redirect(base_url('panel/pages'));
                } else {

                    $this->data['errorMessage'] = 'An error occured while creating page';
                }
            }
            $this->load->view('panel/pages/add', $this->data);
        } else {

            $this->load->view('panel/pages/add', $this->data);
        }
    }

    /* Delete page */
    public function delete($id)
    {

        $page = Pages::find($id);

        if ($page) {

            if ($page->delete()) {

                $this->session->set_flashdata('success', 'Page deleted successfully.');
                redirect(base_url('panel/pages'));
            } else {

                $this->session->set_flashdata('error', 'An error occured while deleting page');
                redirect(base_url('panel/pages'));
            }
        } else {

            show_404();
        }
    }
}
