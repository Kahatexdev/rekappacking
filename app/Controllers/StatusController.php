<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StatusController extends BaseController
{
    public function reqpacking($noModel)
    {
        $status = 'Menunggu Approval';
        $field = 'status';

        $update = $this->dataPDK->update($noModel, [$field => $status]);
        if ($update) {
            return redirect()->to(base_url('packing/rekap/'))->with('success', 'Berhasil Meminta tambahan packing');
        } else {
            return redirect()->to(base_url('packing/rekap/'))->with('error', 'Gagal Meminta tambahan packing');
        }
    }
    public function approve($noModel)
    {
        $status = 'Approved';
        $field = 'status';

        $update = $this->dataPDK->update($noModel, [$field => $status]);
        if ($update) {
            return redirect()->to(base_url('ppc/requestpacking/'))->with('success', 'Berhasil Meminta tambahan packing');
        } else {
            return redirect()->to(base_url('ppc/requestpacking/'))->with('error', 'Gagal Meminta tambahan packing');
        }
    }
    public function done($noModel)
    {
        $status = 'Done';
        $field = 'status';

        $update = $this->dataPDK->update($noModel, [$field => $status]);
        if ($update) {
            return redirect()->to(base_url('ppc/requestpacking/'))->with('success', 'Berhasil Meminta tambahan packing');
        } else {
            return redirect()->to(base_url('ppc/requestpacking/'))->with('error', 'Gagal Meminta tambahan packing');
        }
    }
}
