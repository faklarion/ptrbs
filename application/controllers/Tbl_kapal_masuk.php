<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_masuk_model');
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_masuk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal_masuk/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_masuk/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_masuk_model->total_rows($q);
        $tbl_kapal_masuk = $this->Tbl_kapal_masuk_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_masuk_data' => $tbl_kapal_masuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal_masuk/tbl_kapal_masuk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kapal_masuk' => $row->id_kapal_masuk,
		'id_kapal' => $row->id_kapal,
		'tanggal_masuk' => $row->tanggal_masuk,
		'pelabuhan_asal' => $row->pelabuhan_asal,
		'muatan' => $row->muatan,
		'status_muatan' => $row->status_muatan,
		'status_kapal' => $row->status_kapal,
	    );
            $this->template->load('template','tbl_kapal_masuk/tbl_kapal_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal_masuk/create_action'),
	    'id_kapal_masuk' => set_value('id_kapal_masuk'),
	    'id_kapal' => set_value('id_kapal'),
	    'tanggal_masuk' => set_value('tanggal_masuk'),
	    'pelabuhan_asal' => set_value('pelabuhan_asal'),
	    'muatan' => set_value('muatan'),
	    'status_muatan' => set_value('status_muatan'),
	    'status_kapal' => set_value('status_kapal'),
	);
        $this->template->load('template','tbl_kapal_masuk/tbl_kapal_masuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kapal' => $this->input->post('id_kapal',TRUE),
                'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
                'pelabuhan_asal' => $this->input->post('pelabuhan_asal',TRUE),
                'muatan' => $this->input->post('muatan',TRUE),
                'status_muatan' => $this->input->post('status_muatan',TRUE),
                'status_kapal' => $this->input->post('status_kapal',TRUE),
            );

            $dataKapal = array(
                'status' => 1,
            );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
            $this->Tbl_kapal_masuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_kapal_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal_masuk/update_action'),
                'id_kapal_masuk' => set_value('id_kapal_masuk', $row->id_kapal_masuk),
                'id_kapal' => set_value('id_kapal', $row->id_kapal),
                'tanggal_masuk' => set_value('tanggal_masuk', $row->tanggal_masuk),
                'pelabuhan_asal' => set_value('pelabuhan_asal', $row->pelabuhan_asal),
                'muatan' => set_value('muatan', $row->muatan),
                'status_muatan' => set_value('status_muatan', $row->status_muatan),
                'status_kapal' => set_value('status_kapal', $row->status_kapal),
	    );
            $this->template->load('template','tbl_kapal_masuk/tbl_kapal_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal_masuk', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
		'pelabuhan_asal' => $this->input->post('pelabuhan_asal',TRUE),
		'muatan' => $this->input->post('muatan',TRUE),
		'status_muatan' => $this->input->post('status_muatan',TRUE),
		'status_kapal' => $this->input->post('status_kapal',TRUE),
	    );

            $this->Tbl_kapal_masuk_model->update($this->input->post('id_kapal_masuk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_masuk_model->get_by_id($id);

        $idKapal = $row->id_kapal;

        $data = array(
            'status' => 0,
        );

        if ($row) {
            $this->Tbl_kapal_masuk_model->delete($id);
            $this->Tbl_kapal_model->update($idKapal, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_masuk'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'trim|required');
        $this->form_validation->set_rules('pelabuhan_asal', 'pelabuhan asal', 'trim|required');
        $this->form_validation->set_rules('muatan', 'muatan', 'trim|required');
        $this->form_validation->set_rules('status_muatan', 'status muatan', 'trim|required');
        $this->form_validation->set_rules('status_kapal', 'status kapal', 'trim|required');

        $this->form_validation->set_rules('id_kapal_masuk', 'id_kapal_masuk', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kapal_masuk.doc");

        $data = array(
            'tbl_kapal_masuk_data' => $this->Tbl_kapal_masuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kapal_masuk/tbl_kapal_masuk_doc',$data);
    }

}

/* End of file Tbl_kapal_masuk.php */
/* Location: ./application/controllers/Tbl_kapal_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 06:18:35 */
/* http://harviacode.com */