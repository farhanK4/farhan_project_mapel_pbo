<?php

class Customer {
    public $id;
    public $nama;
    public $alamat;
    public $No_Telepon;

    public function __construct($id, $nama, $alamat, $No_Telepon){
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->No_Telepon = $No_Telepon;

    }
}
?>