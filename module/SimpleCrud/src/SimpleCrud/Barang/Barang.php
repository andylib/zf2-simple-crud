<?php

namespace SimpleCrud\Barang;

class Barang
{
    protected $id;

    protected $kode;

    protected $nama;
    
    protected $harga;
    
    protected $satuan;

    protected $keterangan;

    public function getId()
    {
        return $this->id;
    }

    public function setKode($kode)
    {
        $this->kode = $kode;
    }

    public function getKode()
    {
        return $this->kode;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function setSatuan($satuan)
    {
        $this->satuan = $satuan;
    }

    public function getSatuan()
    {
        return $this->satuan;
    }

    public function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }

    public function getKeterangan()
    {
        return $this->keterangan;
    }
}
