<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_riwayat_kapal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_riwayat_kapal_model');
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_riwayat_kapal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_riwayat_kapal/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_riwayat_kapal/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_riwayat_kapal_model->total_rows($q);
        $tbl_riwayat_kapal = $this->Tbl_riwayat_kapal_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_riwayat_kapal_data' => $tbl_riwayat_kapal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_riwayat_kapal/tbl_riwayat_kapal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_riwayat_kapal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kapal' => $row->id_kapal,
		'id_riwayat' => $row->id_riwayat,
		'jam_update' => $row->jam_update,
		'muatan' => $row->muatan,
		'pelabuhan_asal' => $row->pelabuhan_asal,
		'pelabuhan_tujuan' => $row->pelabuhan_tujuan,
		'status' => $row->status,
		'tanggal_update' => $row->tanggal_update,
	    );
            $this->template->load('template','tbl_riwayat_kapal/tbl_riwayat_kapal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_riwayat_kapal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_riwayat_kapal/create_action'),
	    'id_kapal' => set_value('id_kapal'),
	    'id_riwayat' => set_value('id_riwayat'),
	    'jam_update' => set_value('jam_update'),
	    'muatan' => set_value('muatan'),
	    'pelabuhan_asal' => set_value('pelabuhan_asal'),
	    'pelabuhan_tujuan' => set_value('pelabuhan_tujuan'),
	    'status' => set_value('status'),
	    'tanggal_update' => set_value('tanggal_update'),
	);
        $this->template->load('template','tbl_riwayat_kapal/tbl_riwayat_kapal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'jam_update' => $this->input->post('jam_update',TRUE),
		'muatan' => $this->input->post('muatan',TRUE),
		'pelabuhan_asal' => $this->input->post('pelabuhan_asal',TRUE),
		'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tanggal_update' => $this->input->post('tanggal_update',TRUE),
	    );

        $dataKapal = array(
            'status' => 6,
        );

        $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
        $this->Tbl_riwayat_kapal_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success 2');
        redirect(site_url('tbl_riwayat_kapal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_riwayat_kapal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_riwayat_kapal/update_action'),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'id_riwayat' => set_value('id_riwayat', $row->id_riwayat),
		'jam_update' => set_value('jam_update', $row->jam_update),
		'muatan' => set_value('muatan', $row->muatan),
		'pelabuhan_asal' => set_value('pelabuhan_asal', $row->pelabuhan_asal),
		'pelabuhan_tujuan' => set_value('pelabuhan_tujuan', $row->pelabuhan_tujuan),
		'status' => set_value('status', $row->status),
		'tanggal_update' => set_value('tanggal_update', $row->tanggal_update),
	    );
            $this->template->load('template','tbl_riwayat_kapal/tbl_riwayat_kapal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_riwayat_kapal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_riwayat', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'jam_update' => $this->input->post('jam_update',TRUE),
		'muatan' => $this->input->post('muatan',TRUE),
		'pelabuhan_asal' => $this->input->post('pelabuhan_asal',TRUE),
		'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tanggal_update' => $this->input->post('tanggal_update',TRUE),
	    );

            $this->Tbl_riwayat_kapal_model->update($this->input->post('id_riwayat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_riwayat_kapal'));
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
            $this->Tbl_riwayat_kapal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_riwayat_kapal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_riwayat_kapal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('jam_update', 'jam update', 'trim|required');
	$this->form_validation->set_rules('muatan', 'muatan', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_asal', 'pelabuhan asal', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_tujuan', 'pelabuhan tujuan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('tanggal_update', 'tanggal update', 'trim|required');

	$this->form_validation->set_rules('id_riwayat', 'id_riwayat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       $awal    = $this->input->get('start_date');
       $akhir   = $this->input->get('end_date');

        $data = array(
            'tbl_riwayat_kapal_data' => $this->Tbl_riwayat_kapal_model->get_by_date($awal, $akhir),
            'title' => 'LAPORAN RIWAYAT KAPAL',
            'periode' => 'Periode Tanggal Update : '.tgl_indo($awal).' - '.tgl_indo($akhir).'',
            'start' => 0
        );
        
        $this->load->view('tbl_riwayat_kapal/tbl_riwayat_kapal_doc',$data);
    }

}

/* End of file Tbl_riwayat_kapal.php */
/* Location: ./application/controllers/Tbl_riwayat_kapal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-02-06 07:10:57 */
/* http://harviacode.com */