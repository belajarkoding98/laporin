<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function login()
	{
		$data = $this->db->select('id_admin1,nama_admin1,username_admin1,password_admin1')
						 ->where('username_admin1', $this->input->post('username'))
						 ->where('password_admin1', sha1($this->input->post('password')))
						 ->get('admin_1');

		if ($this->db->affected_rows() > 0) {
			$a = $data->row();

			$array = array(
				'id_admin'		  => $a->id_admin1,
				'nama_admin' 	  => $a->nama_admin1,
				'username_admin' => $a->username_admin1,
				'password_admin' => $a->password_admin1,
				'admin'			  => '1',
				'login'		 	 => true,
				'klasifikasi'	 => 'admin'
			);
			
			$this->session->set_userdata( $array );

			return true;
		} else {
			$data = $this->db->select('id_admin2,nama_admin2,username_admin2,password_admin2,tipe')
						 ->where('username_admin2', $this->input->post('username'))
						 ->where('password_admin2', sha1($this->input->post('password')))
						 ->get('admin_2');

			if ($this->db->affected_rows() > 0) {
				$a = $data->row();

				$array = array(
					'id_admin'		  => $a->id_admin2,
					'nama_admin' 	  => $a->nama_admin2,
					'username_admin' => $a->username_admin2,
					'password_admin' => $a->password_admin2,
					'admin'			  => '2',
					'tipe'			  => $a->tipe,
					'login'		 	 => true,
					'klasifikasi'	 => 'admin'
				);

				$this->session->set_userdata( $array );

				return true;
			} else {
				return false;
			}
		}
	}

	public function uploadFile($file)
	{
		$admin1 = '';
		$admin2 = $this->session->userdata('id_admin');
		$status = '0';

		if ($this->session->userdata('admin') == 1) {
			$status = 1;
			$admin1 = $this->session->userdata('id_admin');
			$admin2 = '';
		}
		
		$object = array('id_aduan' => $this->session->userdata('id_aduan'), 
						'id_admin1' => $admin1,
						'id_admin2' => $admin2,
						'file'		=> $file['file_name'],
						'status_chat'	=> $status
					);

		$this->db->insert('chat', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function chat()
	{
		$status = 0;
		$admin1 = '';
		$admin2 = $this->session->userdata('id_admin');

		if ($this->session->userdata('admin') == 1) {
			$status = 1;
			$admin1 = $this->session->userdata('id_admin');
			$admin2 = '';
		}

		$object = array(
			'id_aduan' => $this->session->userdata('id_aduan'),
			'id_admin1' => $admin1,
			'id_admin2' => $admin2,
			'chat' 	   => $this->input->post('chat'),
			'status_chat'   => $status
		);

		$this->db->insert('chat', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function updateDitangani($id)
	{
		$object = '';
		if ($this->input->post('ditangani') == 'd11') {
			$object = array('d11' => 1);
		} elseif ($this->input->post('ditangani') == 'd12') {
			$object = array('d12' => 1);
		} elseif ($this->input->post('ditangani') == 'd13') {
			$object = array('d13' => 1);
		}elseif ($this->input->post('ditangani') == 'd14') {
			$object = array('d14' => 1);
		}elseif ($this->input->post('ditangani') == 'd21') {
			$object = array('d21' => 1);
		}elseif ($this->input->post('ditangani') == 'd22') {
			$object = array('d22' => 1);
		}elseif ($this->input->post('ditangani') == 'd23') {
			$object = array('d23' => 1);
		}elseif ($this->input->post('ditangani') == 'd31') {
			$object = array('d31' => 1);
		}elseif ($this->input->post('ditangani') == '32') {
			$object = array('d32' => 1);
		}elseif ($this->input->post('ditangani') == '33') {
			$object = array('d33' => 1);
		}elseif ($this->input->post('ditangani') == 'p4') {
			$object = array('p4' => 1);
		}

		$this->db->where('id_aduan', $id)->update('balas_aduan', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function verifikasi($data, $id){
		$this->db->where('id_aduan', $id)->update('aduan', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function verifLaporan($id)
	{
		$data = array('status_verif' => 1, 'jenis_klasifikasi' => $this->input->post('jenis'));

		$this->db->where('id_aduan', $id)->update('aduan', $data);

		$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		
		if ($this->input->post('ditangani') == 'd11') {
			$d11=1;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		} elseif ($this->input->post('ditangani') == 'd12') {
$d11=0;$d12=1;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		} elseif ($this->input->post('ditangani') == 'd13') {
$d11=0;$d12=0;$d13=1;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd14') {
	$d11=0;$d12=0;$d13=0;$d14=1;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd21') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=1;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd22') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=1;$d23=0;$d31=0;$d32=0;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd23') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=1;$d31=0;$d32=0;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd31') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=1;$d32=0;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd32') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=1;$d33=0;$p4=0;
		}elseif ($this->input->post('ditangani') == 'd33') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=1;$p4=0;
		}elseif ($this->input->post('ditangani') == 'p4') {
$d11=0;$d12=0;$d13=0;$d14=0;$d21=0;$d22=0;$d23=0;$d31=0;$d32=0;$d33=0;$p4=1;
		}

		$object = array('id_aduan' => $id,'d11' => $d11,'d12' => $d12,'d13' => $d13,'d14' => $d14,'d21' => $d21,'d22' => $d22,'d23' => $d23,'d31' => $d31,'d32' => $d32,'d33' => $d33,'p4' => $p4);

		$this->db->insert('balas_aduan', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function ditanganiOleh()
	{
		return $this->db->where('id_aduan', $this->session->userdata('id_aduan'))->get('balas_aduan')->row();
	}

	public function detailAduan($ticket)
	{
		return $this->db->where('ticket', $ticket)->join('pelapor', 'pelapor.id_pelapor=aduan.id_pelapor')->get('aduan')->row();
	}


	public function getChat()
	{
		return $this->db->join('pelapor','pelapor.id_pelapor=chat.pelapor', 'left')
						->join('admin_1','admin_1.id_admin1=chat.id_admin1', 'left')
						->join('admin_2','admin_2.id_admin2=chat.id_admin2', 'left')
						->where('id_aduan', $this->uri->segment(4))
						->get('chat')
						->result();
	}

	public function tampilChat($id)
	{
		$object = array('status_chat' => 1);

		$this->db->where('id', $id)->update('chat', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteChat($id)
	{
		$this->db->where('id', $id)->delete('chat');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function updateStatusAduan($id, $a)
	{
		$object = array('status' => $a);
		$this->db->where('id_aduan', $id)->update('aduan', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function donutChart($status)
	{
		return $this->db->select('count(status) as jumlah,id_aduan')
						->group_by('status')
						->where('status', $status)
						->get('aduan')
						->row(); 
	}

	public function getWaktuLaporan()
	{
		return $this->db->select('waktu_laporan')->get('aduan')->result();
	}

	public function getPelapor($status)
	{
		return $this->db->get_where('pelapor', $status)->result();
	}

	public function hapusPelapor($id)
	{
		$this->db->where('id_pelapor', $id)->delete('pelapor');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		} 
	}

	public function updatePelapor($id)
	{
				$object = array('nama_pelapor' => $this->input->post('regNama'),
					  'no_telp'		 => $this->input->post('regTelp'),
					  'email'		 => $this->input->post('regEmail'),
					  'no_id'		 => $this->input->post('regId'),
					  'alamat'	 => $this->input->post('alamat')
					);

		$this->db->where('id_pelapor', $id)->update('pelapor', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function changeStatus($data, $id){
		$this->db->where('id_pelapor', $id)->update('pelapor', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getTotalPengaduan()
	{
		return $this->db->count_all('aduan');
	}

	public function getPengaduan($status)
	{
		$this->db->where($status);
		$this->db->from('aduan');
		return $this->db->count_all_results();
	}


}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */