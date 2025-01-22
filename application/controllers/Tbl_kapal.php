<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_model->total_rows($q);
        $tbl_kapal = $this->Tbl_kapal_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_data' => $tbl_kapal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal/tbl_kapal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_kapal' => $row->id_kapal,
                'nomer_kapal' => $row->nomer_kapal,
                'nama_kapal' => $row->nama_kapal,
                'tipe_kapal' => $row->tipe_kapal,
                'panjang_kapal' => $row->panjang_kapal,
                'lebar_kapal' => $row->lebar_kapal,
                'tinggi_kapal' => $row->tinggi_kapal,
                'tahun_kapal' => $row->tahun_kapal,
                'kapasitas_kapal' => $row->kapasitas_kapal,
                'status' => $row->status,
	    );
            $this->template->load('template','tbl_kapal/tbl_kapal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal/create_action'),
            'id_kapal' => set_value('id_kapal'),
            'nomer_kapal' => set_value('nomer_kapal'),
            'nama_kapal' => set_value('nama_kapal'),
            'tipe_kapal' => set_value('tipe_kapal'),
            'panjang_kapal' => set_value('panjang_kapal'),
            'lebar_kapal' => set_value('lebar_kapal'),
            'tinggi_kapal' => set_value('tinggi_kapal'),
            'tahun_kapal' => set_value('tahun_kapal'),
            'kapasitas_kapal' => set_value('kapasitas_kapal'),
	);
        $this->template->load('template','tbl_kapal/tbl_kapal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomer_kapal' => $this->input->post('nomer_kapal',TRUE),
                'nama_kapal' => $this->input->post('nama_kapal',TRUE),
                'tipe_kapal' => $this->input->post('tipe_kapal',TRUE),
                'panjang_kapal' => $this->input->post('panjang_kapal',TRUE),
                'lebar_kapal' => $this->input->post('lebar_kapal',TRUE),
                'tinggi_kapal' => $this->input->post('tinggi_kapal',TRUE),
                'tahun_kapal' => $this->input->post('tahun_kapal',TRUE),
                'kapasitas_kapal' => $this->input->post('kapasitas_kapal',TRUE),
	    );

            $this->Tbl_kapal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_kapal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal/update_action'),
                'id_kapal' => set_value('id_kapal', $row->id_kapal),
                'nomer_kapal' => set_value('nomer_kapal', $row->nomer_kapal),
                'nama_kapal' => set_value('nama_kapal', $row->nama_kapal),
                'tipe_kapal' => set_value('tipe_kapal', $row->tipe_kapal),
                'panjang_kapal' => set_value('panjang_kapal', $row->panjang_kapal),
                'lebar_kapal' => set_value('lebar_kapal', $row->lebar_kapal),
                'tinggi_kapal' => set_value('tinggi_kapal', $row->tinggi_kapal),
                'tahun_kapal' => set_value('tahun_kapal', $row->tahun_kapal),
                'kapasitas_kapal' => set_value('kapasitas_kapal', $row->kapasitas_kapal),
	    );
            $this->template->load('template','tbl_kapal/tbl_kapal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal', TRUE));
        } else {
            $data = array(
		'nomer_kapal' => $this->input->post('nomer_kapal',TRUE),
		'nama_kapal' => $this->input->post('nama_kapal',TRUE),
		'tipe_kapal' => $this->input->post('tipe_kapal',TRUE),
		'panjang_kapal' => $this->input->post('panjang_kapal',TRUE),
		'lebar_kapal' => $this->input->post('lebar_kapal',TRUE),
		'tinggi_kapal' => $this->input->post('tinggi_kapal',TRUE),
		'tahun_kapal' => $this->input->post('tahun_kapal',TRUE),
		'kapasitas_kapal' => $this->input->post('kapasitas_kapal',TRUE),
	    );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kapal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomer_kapal', 'nomer kapal', 'trim|required');
	$this->form_validation->set_rules('nama_kapal', 'nama kapal', 'trim|required');
	$this->form_validation->set_rules('tipe_kapal', 'tipe kapal', 'trim|required');
	$this->form_validation->set_rules('panjang_kapal', 'panjang kapal', 'trim|required');
	$this->form_validation->set_rules('lebar_kapal', 'lebar kapal', 'trim|required');
	$this->form_validation->set_rules('tinggi_kapal', 'tinggi kapal', 'trim|required');
	$this->form_validation->set_rules('tahun_kapal', 'tahun kapal', 'trim|required');
	$this->form_validation->set_rules('kapasitas_kapal', 'kapasitas kapal', 'trim|required');

	$this->form_validation->set_rules('id_kapal', 'id_kapal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       
        $data = array(
            'tbl_kapal_data' => $this->Tbl_kapal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kapal/tbl_kapal_doc',$data);
    }

}

/* End of file Tbl_kapal.php */
/* Location: ./application/controllers/Tbl_kapal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 06:02:26 */
/* http://harviacode.com */