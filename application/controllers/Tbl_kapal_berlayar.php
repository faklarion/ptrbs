<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal_berlayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_model');
        $this->load->model('Tbl_kapal_berlayar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_berlayar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal_berlayar/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal_berlayar/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_berlayar_model->total_rows($q);
        $tbl_kapal_berlayar = $this->Tbl_kapal_berlayar_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_berlayar_data' => $tbl_kapal_berlayar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal_berlayar/tbl_kapal_berlayar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_berlayar_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_kapal_berlayar' => $row->id_kapal_berlayar,
                'id_kapal' => $row->id_kapal,
                'tanggal_berlayar' => $row->tanggal_berlayar,
                'pelabuhan_tujuan' => $row->pelabuhan_tujuan,
                'rute_pelayaran' => $row->rute_pelayaran,
                'muatan' => $row->muatan,
                'kapten_kapal' => $row->kapten_kapal,
                'perkiraan_sampai' => $row->perkiraan_sampai,
	    );
            $this->template->load('template','tbl_kapal_berlayar/tbl_kapal_berlayar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_berlayar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal_berlayar/create_action'),
	    'id_kapal_berlayar' => set_value('id_kapal_berlayar'),
	    'id_kapal' => set_value('id_kapal'),
	    'tanggal_berlayar' => set_value('tanggal_berlayar'),
	    'pelabuhan_tujuan' => set_value('pelabuhan_tujuan'),
	    'rute_pelayaran' => set_value('rute_pelayaran'),
	    'muatan' => set_value('muatan'),
	    'kapten_kapal' => set_value('kapten_kapal'),
	    'perkiraan_sampai' => set_value('perkiraan_sampai'),
	);
        $this->template->load('template','tbl_kapal_berlayar/tbl_kapal_berlayar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
                $data = array(
            'id_kapal' => $this->input->post('id_kapal',TRUE),
            'tanggal_berlayar' => $this->input->post('tanggal_berlayar',TRUE),
            'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
            'rute_pelayaran' => $this->input->post('rute_pelayaran',TRUE),
            'muatan' => $this->input->post('muatan',TRUE),
            'kapten_kapal' => $this->input->post('kapten_kapal',TRUE),
            'perkiraan_sampai' => $this->input->post('perkiraan_sampai',TRUE),
	        );

            $dataKapal = array(
                'status' => 3,
            );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
            $this->Tbl_kapal_berlayar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_kapal_berlayar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_berlayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal_berlayar/update_action'),
		'id_kapal_berlayar' => set_value('id_kapal_berlayar', $row->id_kapal_berlayar),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'tanggal_berlayar' => set_value('tanggal_berlayar', $row->tanggal_berlayar),
		'pelabuhan_tujuan' => set_value('pelabuhan_tujuan', $row->pelabuhan_tujuan),
		'rute_pelayaran' => set_value('rute_pelayaran', $row->rute_pelayaran),
		'muatan' => set_value('muatan', $row->muatan),
		'kapten_kapal' => set_value('kapten_kapal', $row->kapten_kapal),
		'perkiraan_sampai' => set_value('perkiraan_sampai', $row->perkiraan_sampai),
	    );
            $this->template->load('template','tbl_kapal_berlayar/tbl_kapal_berlayar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_berlayar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal_berlayar', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_berlayar' => $this->input->post('tanggal_berlayar',TRUE),
		'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
		'rute_pelayaran' => $this->input->post('rute_pelayaran',TRUE),
		'muatan' => $this->input->post('muatan',TRUE),
		'kapten_kapal' => $this->input->post('kapten_kapal',TRUE),
		'perkiraan_sampai' => $this->input->post('perkiraan_sampai',TRUE),
	    );

            $this->Tbl_kapal_berlayar_model->update($this->input->post('id_kapal_berlayar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal_berlayar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_berlayar_model->get_by_id($id);

        $idKapal = $row->id_kapal;

        $dataKapal = array(
            'status' => 0,
        );

        if ($row) {
            $this->Tbl_kapal_model->update($idKapal, $dataKapal);
            $this->Tbl_kapal_berlayar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal_berlayar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal_berlayar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('tanggal_berlayar', 'tanggal berlayar', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_tujuan', 'pelabuhan tujuan', 'trim|required');
	$this->form_validation->set_rules('rute_pelayaran', 'rute pelayaran', 'trim|required');
	$this->form_validation->set_rules('muatan', 'muatan', 'trim|required');
	$this->form_validation->set_rules('kapten_kapal', 'kapten kapal', 'trim|required');
	$this->form_validation->set_rules('perkiraan_sampai', 'perkiraan sampai', 'trim|required');

	$this->form_validation->set_rules('id_kapal_berlayar', 'id_kapal_berlayar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       $awal    = $this->input->get('start_date');
       $akhir   = $this->input->get('end_date');

        $data = array(
            'tbl_kapal_berlayar_data' => $this->Tbl_kapal_berlayar_model->get_by_date($awal, $akhir),
            'start' => 0,
            'title' => 'LAPORAN KAPAL BERLAYAR',
            'periode' => 'Periode BERLAYAR : '.tgl_indo($awal).' - '.tgl_indo($akhir).'',
        );
        
        $this->load->view('tbl_kapal_berlayar/tbl_kapal_berlayar_doc',$data);
    }

}

/* End of file Tbl_kapal_berlayar.php */
/* Location: ./application/controllers/Tbl_kapal_berlayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 07:52:47 */
/* http://harviacode.com */