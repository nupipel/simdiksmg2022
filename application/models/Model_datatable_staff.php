<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_datatable_staff extends CI_Model
{
    //set nama tabel yang akan kita tampilkan datanya
    var $table = 'st_staff';
    //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
    var $column_order = array(null, 'nama', 'nuptk', 'nip');

    var $column_search = array('nama', 'nuptk', 'nip');
    // default order 
    var $order = array('nama' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDataStaff()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_staff($data)
    {
        $insert_Data_staff = $this->db->on_duplicate('st_staff', $data);
        if ($insert_Data_staff) {
            return true;
        }
    }

    public function count_guru_by_id($kodesekolah, $status, $jenis)
    {
        $this->db->from($this->table);
        $this->db->where(array('created_by' => $kodesekolah, 'status' => $status, 'jenis' => $jenis));

        return $this->db->count_all_results();
    }


    private function _get_datatables_query()
    {
        $kodesekolah = $this->input->post('id');
        $jenisPTK = $this->input->post('ptk');

        $this->db->from($this->table);
        $this->db->where('created_by', $kodesekolah);
        if ($jenisPTK == 'Guru') {
            $jenis = 'Guru';
        } else {
            $jenis = 'Tendik';
        }
        $this->db->where('jenis', $jenis);

        // var_dump($result);
        // die;

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $kodesekolah = $this->input->post('id');
        $jenisPTK = $this->input->post('ptk');

        $this->db->from($this->table);
        $this->db->where('created_by', $kodesekolah);
        if ($jenisPTK == 'Guru') {
            $jenis = 'Guru';
        } else {
            $jenis = 'Tendik';
        }
        $this->db->where('jenis', $jenis);

        return $this->db->count_all_results();
    }

    public function delete_by_id()
    {
        $kodesekolah = $this->input->post('id');
        $jenisPTK = $this->input->post('ptk');
        // $this->db->from($this->table);
        $this->db->where('created_by', $kodesekolah);
        if ($jenisPTK == 'Guru') {
            $jenis = 'Guru';
        } else {
            $jenis = 'Tendik';
        }
        $this->db->where('jenis', $jenis);
        return $this->db->delete('st_staff');
    }
}
