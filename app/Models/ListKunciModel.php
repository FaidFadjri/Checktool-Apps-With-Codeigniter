<?php

namespace App\Models;

use CodeIgniter\Model;

class ListKunciModel extends Model
{
    protected $table = 'daftar_kunci';


    public function getKunci($caddy)
    {
        $sql = "SELECT * FROM daftar_kunci WHERE teknisi = '$caddy'";
        return $this->query($sql)->getResult();
    }

    public function getHarga($id)
    {
        $sql = "SELECT * FROM daftar_kunci WHERE id = $id";
        return $this->query($sql)->getResult()[0]->harga;
    }
}
