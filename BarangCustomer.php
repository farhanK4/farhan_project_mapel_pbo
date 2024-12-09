<?php
class BarangCustomer{
    private $dataFile = 'dataCutomer.json';
    private $customerList = [];

    public function __construct(){
        if(file_exists($this->dataFile)){
            $data = file_get_contents($this->dataFile);
            $this->customerList = json_decode($data, true);
        }
    }

    //Menambahkan Barang
    public function tambahCustomer($nama, $alamat, $No_Telepon){
        $id = uniqid(); //Generate ID unik
        $customer = new Customer($id, $nama, $alamat, $No_Telepon);
        $this->customerList[] = $customer;
        $this->simpanData();
    }

    //Mendapatkan semua barang 
    public function getCustomer(){
        return $this->customerList;
    }

    //Menghapus Barang berdasarkan ID
    public function hapusCustomer($id){
        $this->customerList = array_filter($this->customerList, function($customer) use($id) {
            return $customer['id'] !== $id;
        });
        $this->simpanData();
    }

    //Menyimpan data ke file JSON
    private function simpanData(){
        file_put_contents($this->dataFile, json_encode($this->customerList, JSON_PRETTY_PRINT));
    }
}
?>