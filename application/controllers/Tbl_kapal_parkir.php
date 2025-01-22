<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal_parkir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_parkir_model');
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_parkir/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal_parkir/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_parkir/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_parkir_model->total_rows($q);
        $tbl_kapal_parkir = $this->Tbl_kapal_parkir_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_parkir_data' => $tbl_kapal_parkir,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal_parkir/tbl_kapal_parkir_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_parkir_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kapal_parkir' => $row->id_kapal_parkir,
		'id_kapal' => $row->id_kapal,
		'tanggal_parkir' => $row->tanggal_parkir,
		'durasi_parkir' => $row->durasi_parkir,
		'lokasi_parkir' => $row->lokasi_parkir,
		'biaya_parkir' => $row->biaya_parkir,
		'alasan_parkir' => $row->alasan_parkir,
	    );
            $this->template->load('template','tbl_kapal_parkir/tbl_kapal_parkir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_parkir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal_parkir/create_action'),
	    'id_kapal_parkir' => set_value('id_kapal_parkir'),
	    'id_kapal' => set_value('id_kapal'),
	    'tanggal_parkir' => set_value('tanggal_parkir'),
	    'durasi_parkir' => set_value('durasi_parkir'),
	    'lokasi_parkir' => set_value('lokasi_parkir'),
	    'biaya_parkir' => set_value('biaya_parkir'),
	    'alasan_parkir' => set_value('alasan_parkir'),
	);
        $this->template->load('template','tbl_kapal_parkir/tbl_kapal_parkir_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kapal' => $this->input->post('id_kapal',TRUE),
                'tanggal_parkir' => $this->input->post('tanggal_parkir',TRUE),
                'durasi_parkir' => $this->input->post('durasi_parkir',TRUE),
                'lokasi_parkir' => $this->input->post('lokasi_parkir',TRUE),
                'biaya_parkir' => $this->input->post('biaya_parkir',TRUE),
                'alasan_parkir' => $this->input->post('alasan_parkir',TRUE),
	        );

            $dataKapal = array(
                'status' => 4,
            );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
            $this->Tbl_kapal_parkir_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_kapal_parkir'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_parkir_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal_parkir/update_action'),
                'id_kapal_parkir' => set_value('id_kapal_parkir', $row->id_kapal_parkir),
                'id_kapal' => set_value('id_kapal', $row->id_kapal),
                'tanggal_parkir' => set_value('tanggal_parkir', $row->tanggal_parkir),
                'durasi_parkir' => set_value('durasi_parkir', $row->durasi_parkir),
                'lokasi_parkir' => set_value('lokasi_parkir', $row->lokasi_parkir),
                'biaya_parkir' => set_value('biaya_parkir', $row->biaya_parkir),
                'alasan_parkir' => set_value('alasan_parkir', $row->alasan_parkir),
	    );
            $this->template->load('template','tbl_kapal_parkir/tbl_kapal_parkir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_parkir'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal_parkir', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_parkir' => $this->input->post('tanggal_parkir',TRUE),
		'durasi_parkir' => $this->input->post('durasi_parkir',TRUE),
		'lokasi_parkir' => $this->input->post('lokasi_parkir',TRUE),
		'biaya_parkir' => $this->input->post('biaya_parkir',TRUE),
		'alasan_parkir' => $this->input->post('alasan_parkir',TRUE),
	    );

            $this->Tbl_kapal_parkir_model->update($this->input->post('id_kapal_parkir', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal_parkir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_parkir_model->get_by_id($id);

        $idKapal = $row->id_kapal;

        $dataKapal = array(
            'status' => 0,
        );

        if ($row) {
            $this->Tbl_kapal_model->update($idKapal, $dataKapal);
            $this->Tbl_kapal_parkir_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal_parkir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_parkir'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('tanggal_parkir', 'tanggal parkir', 'trim|required');
	$this->form_validation->set_rules('durasi_parkir', 'durasi parkir', 'trim|required');
	$this->form_validation->set_rules('lokasi_parkir', 'lokasi parkir', 'trim|required');
	$this->form_validation->set_rules('biaya_parkir', 'biaya parkir', 'trim|required');
	$this->form_validation->set_rules('alasan_parkir', 'alasan parkir', 'trim|required');

	$this->form_validation->set_rules('id_kapal_parkir', 'id_kapal_parkir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       $awal    = $this->input->get('start_date');
       $akhir   = $this->input->get('end_date');

        $data = array(
            'tbl_kapal_parkir_data' => $this->Tbl_kapal_parkir_model->get_by_date($awal, $akhir),
            'title' => 'LAPORAN KAPAL PARKIR',
            'periode' => 'Periode Parkir : '.tgl_indo($awal).' - '.tgl_indo($akhir).'',
            'start' => 0
        );
        
        $this->load->view('tbl_kapal_parkir/tbl_kapal_parkir_doc',$data);
    }

}

/* End of file Tbl_kapal_parkir.php */
/* Location: ./application/controllers/Tbl_kapal_parkir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 08:11:11 */
/* http://harviacode.com */