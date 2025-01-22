<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal_perbaikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_perbaikan_model');
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_perbaikan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal_perbaikan/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_perbaikan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_perbaikan_model->total_rows($q);
        $tbl_kapal_perbaikan = $this->Tbl_kapal_perbaikan_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_perbaikan_data' => $tbl_kapal_perbaikan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal_perbaikan/tbl_kapal_perbaikan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_perbaikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kapal_perbaikan' => $row->id_kapal_perbaikan,
		'id_kapal' => $row->id_kapal,
		'tanggal_mulai' => $row->tanggal_mulai,
		'tanggal_selesai' => $row->tanggal_selesai,
		'jenis_perbaikan' => $row->jenis_perbaikan,
		'biaya_perbaikan' => $row->biaya_perbaikan,
		'lokasi_perbaikan' => $row->lokasi_perbaikan,
		'teknisi_perbaikan' => $row->teknisi_perbaikan,
	    );
            $this->template->load('template','tbl_kapal_perbaikan/tbl_kapal_perbaikan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_perbaikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal_perbaikan/create_action'),
	    'id_kapal_perbaikan' => set_value('id_kapal_perbaikan'),
	    'id_kapal' => set_value('id_kapal'),
	    'tanggal_mulai' => set_value('tanggal_mulai'),
	    'tanggal_selesai' => set_value('tanggal_selesai'),
	    'jenis_perbaikan' => set_value('jenis_perbaikan'),
	    'biaya_perbaikan' => set_value('biaya_perbaikan'),
	    'lokasi_perbaikan' => set_value('lokasi_perbaikan'),
	    'teknisi_perbaikan' => set_value('teknisi_perbaikan'),
	);
        $this->template->load('template','tbl_kapal_perbaikan/tbl_kapal_perbaikan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
		'jenis_perbaikan' => $this->input->post('jenis_perbaikan',TRUE),
		'biaya_perbaikan' => $this->input->post('biaya_perbaikan',TRUE),
		'lokasi_perbaikan' => $this->input->post('lokasi_perbaikan',TRUE),
		'teknisi_perbaikan' => $this->input->post('teknisi_perbaikan',TRUE),
	    );

            $dataKapal = array(
                'status' => 5,
            );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
            $this->Tbl_kapal_perbaikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_kapal_perbaikan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_perbaikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal_perbaikan/update_action'),
		'id_kapal_perbaikan' => set_value('id_kapal_perbaikan', $row->id_kapal_perbaikan),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
		'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
		'jenis_perbaikan' => set_value('jenis_perbaikan', $row->jenis_perbaikan),
		'biaya_perbaikan' => set_value('biaya_perbaikan', $row->biaya_perbaikan),
		'lokasi_perbaikan' => set_value('lokasi_perbaikan', $row->lokasi_perbaikan),
		'teknisi_perbaikan' => set_value('teknisi_perbaikan', $row->teknisi_perbaikan),
	    );
            $this->template->load('template','tbl_kapal_perbaikan/tbl_kapal_perbaikan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_perbaikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal_perbaikan', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
		'jenis_perbaikan' => $this->input->post('jenis_perbaikan',TRUE),
		'biaya_perbaikan' => $this->input->post('biaya_perbaikan',TRUE),
		'lokasi_perbaikan' => $this->input->post('lokasi_perbaikan',TRUE),
		'teknisi_perbaikan' => $this->input->post('teknisi_perbaikan',TRUE),
	    );

            $this->Tbl_kapal_perbaikan_model->update($this->input->post('id_kapal_perbaikan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal_perbaikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_perbaikan_model->get_by_id($id);
        $idKapal = $row->id_kapal;

        $dataKapal = array(
            'status' => 0,
        );

        if ($row) {
            $this->Tbl_kapal_model->update($idKapal, $dataKapal);
            $this->Tbl_kapal_perbaikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal_perbaikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_perbaikan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
	$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
	$this->form_validation->set_rules('jenis_perbaikan', 'jenis perbaikan', 'trim|required');
	$this->form_validation->set_rules('biaya_perbaikan', 'biaya perbaikan', 'trim|required');
	$this->form_validation->set_rules('lokasi_perbaikan', 'lokasi perbaikan', 'trim|required');
	$this->form_validation->set_rules('teknisi_perbaikan', 'teknisi perbaikan', 'trim|required');

	$this->form_validation->set_rules('id_kapal_perbaikan', 'id_kapal_perbaikan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       $awal    = $this->input->get('start_date');
       $akhir   = $this->input->get('end_date');

        $data = array(
            'tbl_kapal_perbaikan_data' => $this->Tbl_kapal_perbaikan_model->get_by_date($awal, $akhir),
            'title' => 'LAPORAN KAPAL PERBAIKAN',
            'periode' => 'Periode Perbaikan : '.tgl_indo($awal).' - '.tgl_indo($akhir).'',
            'start' => 0
        );
        
        $this->load->view('tbl_kapal_perbaikan/tbl_kapal_perbaikan_doc',$data);
    }

}

/* End of file Tbl_kapal_perbaikan.php */
/* Location: ./application/controllers/Tbl_kapal_perbaikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 08:31:11 */
/* http://harviacode.com */