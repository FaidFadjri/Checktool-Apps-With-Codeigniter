<?php

namespace App\Models;

use CodeIgniter\Model;

class ToolsModel extends Model
{
    protected $table = 'tools';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'kunci', 'status', 'jumlah', 'kosong', 'bulan', 'tanggal', 'tahun', 'hilang', 'rusak',
        'teknisi', 'date', 'harga'
    ];


    public function getKunci($caddy)
    {
        $sql = "SELECT * FROM daftar_kunci WHERE teknisi = '$caddy'";
        return $this->query($sql)->getResult();
    }

    public function getCheckToday($teknisi, $date, $month, $year)
    {
        $sql = "SELECT * FROM tools WHERE teknisi = '$teknisi' AND tanggal = $date AND bulan = $month AND tahun = $year";
        return $this->query($sql)->getResult();
    }

    public function getKunciById($id)
    {
        $sql = "SELECT * FROM tools WHERE id = $id";
        return $this->query($sql)->getResult()[0];
    }

    public function updateStatusKunci($id, $status, $harga, $jumlah, $kosong, $hilang, $rusak)
    {
        $sql = "UPDATE tools SET status = '$status', harga = $harga, jumlah = $jumlah, kosong = $kosong, hilang = $hilang, rusak = $rusak WHERE id = $id";
        return $this->query($sql);
    }

    public function delete_today($teknisi)
    {
        $date       = date('j');
        $month      = date('n');
        $year       = date('Y');

        $sql = "DELETE FROM tools WHERE teknisi = '$teknisi' AND tanggal = $date AND bulan = $month AND tahun = $year";
        return $this->query($sql);
    }
}
