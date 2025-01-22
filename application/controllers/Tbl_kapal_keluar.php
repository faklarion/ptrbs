<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_keluar_model');
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_keluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal_keluar/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_keluar/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_keluar_model->total_rows($q);
        $tbl_kapal_keluar = $this->Tbl_kapal_keluar_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_keluar_data' => $tbl_kapal_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal_keluar/tbl_kapal_keluar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kapal_keluar' => $row->id_kapal_keluar,
		'id_kapal' => $row->id_kapal,
		'tanggal_keluar' => $row->tanggal_keluar,
		'pelabuhan_tujuan' => $row->pelabuhan_tujuan,
		'muatan_keluar' => $row->muatan_keluar,
		'alasan_keluar' => $row->alasan_keluar,
	    );
            $this->template->load('template','tbl_kapal_keluar/tbl_kapal_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal_keluar/create_action'),
            'id_kapal_keluar' => set_value('id_kapal_keluar'),
            'id_kapal' => set_value('id_kapal'),
            'tanggal_keluar' => set_value('tanggal_keluar'),
            'pelabuhan_tujuan' => set_value('pelabuhan_tujuan'),
            'muatan_keluar' => set_value('muatan_keluar'),
            'alasan_keluar' => set_value('alasan_keluar'),
	);
        $this->template->load('template','tbl_kapal_keluar/tbl_kapal_keluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kapal' => $this->input->post('id_kapal',TRUE),
                'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
                'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
                'muatan_keluar' => $this->input->post('muatan_keluar',TRUE),
                'alasan_keluar' => $this->input->post('alasan_keluar',TRUE),
	        );

            $dataKapal = array(
                'status' => 2,
            );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
            $this->Tbl_kapal_keluar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kapal_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal_keluar/update_action'),
		'id_kapal_keluar' => set_value('id_kapal_keluar', $row->id_kapal_keluar),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'tanggal_keluar' => set_value('tanggal_keluar', $row->tanggal_keluar),
		'pelabuhan_tujuan' => set_value('pelabuhan_tujuan', $row->pelabuhan_tujuan),
		'muatan_keluar' => set_value('muatan_keluar', $row->muatan_keluar),
		'alasan_keluar' => set_value('alasan_keluar', $row->alasan_keluar),
	    );
            $this->template->load('template','tbl_kapal_keluar/tbl_kapal_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal_keluar', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
		'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
		'muatan_keluar' => $this->input->post('muatan_keluar',TRUE),
		'alasan_keluar' => $this->input->post('alasan_keluar',TRUE),
	    );

            $this->Tbl_kapal_keluar_model->update($this->input->post('id_kapal_keluar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_keluar_model->get_by_id($id);

        $idKapal = $row->id_kapal;

        $data = array(
            'status' => 0,
        );

        if ($row) {
            $this->Tbl_kapal_model->update($idKapal, $data);
            $this->Tbl_kapal_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('tanggal_keluar', 'tanggal keluar', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_tujuan', 'pelabuhan tujuan', 'trim|required');
	$this->form_validation->set_rules('muatan_keluar', 'muatan keluar', 'trim|required');
	$this->form_validation->set_rules('alasan_keluar', 'alasan keluar', 'trim|required');

	$this->form_validation->set_rules('id_kapal_keluar', 'id_kapal_keluar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kapal_keluar.doc");

        $data = array(
            'tbl_kapal_keluar_data' => $this->Tbl_kapal_keluar_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kapal_keluar/tbl_kapal_keluar_doc',$data);
    }

}

/* End of file Tbl_kapal_keluar.php */
/* Location: ./application/controllers/Tbl_kapal_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 07:31:32 */
/* http://harviacode.com */