<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lapor');
		$this->load->model('m_admin');
		//$this->output->enable_profiler(TRUE);
	}

	public function buildTree($data) {
		$roots = array();
		if(is_string($data))
			$data = str_split($data);
		// Menentukan nilai Frekuensi + Menghitung kemunculan Frekuensi
		for($index=0;$index < count($data);$index++) {
			$key = $data[$index];
	
	//Tambah nilai frekuensi Baru jika tidak ada
		if(!isset($roots[$key])) {
			$roots[$key] = new Node($key);
			$this->leaves[$key] = $roots[$key];
			}
			//Hasil Frekuensi	
			$roots[$key]->frequency++;
			}
		//Mengurutkan nilai terkecil hingga terbesar
	if(count($roots) === 1) {
			$key = strlen($key) === 1 ? chr(255 - ord($key)) : $key."+";
			$artificial = new Node($key);
			$roots[$key] = $artificial;
			$this->leaves[$key] = $artificial;
			}		
	// simpul konversi ke array
		$roots = array_values($roots);
	
		// Buat Pohon dan menentukan posisi atas pohon
				 while(count($roots) > 1) {
	// Temukan dua simpul dengan frekuensi terendah.
	
		//Menentukan posisi daun kanan dan kiri
	if($roots[0]->frequency < $roots[1]->frequency) {
		$leastOften = 0;
		$secondLeastOften = 1;
		} else {
		$leastOften = 1;
		$secondLeastOften = 0;
		}
		for($index=2;$index < count($roots);$index++)
		if($roots[$index]->frequency < $roots[$leastOften]->frequency) {
				$secondLeastOften = $leastOften;
				$leastOften = $index;
		} else if($roots[$index]->frequency < $roots[$secondLeastOften]->frequency){
				  $secondLeastOften = $index;
	
		// Gabungkan dua simpul
		$node = new Node();
		$leastZero = true;
		if($roots[$leastOften]->height > $roots[$secondLeastOften]->height)
			$leastZero = false;
		else if($roots[$leastOften]->height == $roots[$secondLeastOften]->height
		&& $roots[$leastOften]->value > $roots[$secondLeastOften]->value)
				$leastZero = false;
		if($leastZero) {
		$node->zeroChild = $roots[$leastOften];
		$node->oneChild = $roots[$secondLeastOften];
				} else {
		$node->zeroChild = $roots[$secondLeastOften];
	
	$node->oneChild = $roots[$leastOften];
		}
		$node->frequency = $node->zeroChild->frequency + $node->oneChild->frequency;
		$node->height = 1 + max($node->zeroChild->height,$node->oneChild->height);
		$node->zeroChild->myParent = $node;
		$node->oneChild->myParent = $node;
		$roots[$leastOften] = $node;
		unset($roots[$secondLeastOften]);
		$roots = array_values($roots);
		//Kode pohon Huffman
			$this->root = $roots[0];
		}
	}




















	
?>
