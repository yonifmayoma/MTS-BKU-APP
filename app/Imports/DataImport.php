<?php

namespace App\Imports;

use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // $waktu = $this->excelSerialToDate($row['waktu']);
        // $waktu_hingga = $this->excelSerialToDate($row['waktu_hingga']);
        Log::info('Imported row data:', $row);
        return new Data([
            // 'Waktu' => $row['waktu'] ?? null,
            // 'Waktu_Hingga' => $row['waktu_hingga'] ?? null,
            'Provinsi' => $row['provinsi'] ?? null,
            'Kabupaten_Kota' => $row['kabupatenkota'] ?? null,
            'Kecamatan' => $row['kecamatan'] ?? null,
            'Desa' => $row['desa'] ?? null,
            'Site_ID' => $row['site_id'] ?? null,
            'Nama_Site' => $row['nama_site'] ?? null,
            'Site_ID_Bakti' => $row['site_id_bakti'] ?? null,
            'Terminal_ID' => $row['terminal_id'] ?? null,
            'Keterangan_3T' => $row['keterangan_3t'] ?? null,
            'Tahun_Pembangunan' => $row['tahun_pembangunan'] ?? null,
            'Tower_Owner' => $row['tower_owner'] ?? null,
            'Tanggal_OnAir' => $row['tanggal_onair'] ?? null,
            'Project_Phase' => $row['project_phase'] ?? null,
            'Site_Penyiaran' => $row['site_penyiaran'] ?? null,
            'Status' => $row['status'] ?? null,
            'Tanggal_Integrasi' => $row['tanggal_integrasi'] ?? null,
            'Spotbeam' => $row['spotbeam'] ?? null,
            'Mitra_LC' => $row['mitra_lc'] ?? null,
            'Opsel' => $row['opsel'] ?? null,
            'Vendor_Opsel' => $row['vendor_opsel'] ?? null,
            'Teknologi' => $row['teknologi'] ?? null,
            'Bandwidth_Total' => $row['bandwidth_total_(kbps)'] ?? null,
            'Capacity_Uplink' => $row['capacity_uplink_(kbps)'] ?? null,
            'Capacity_Downlink' => $row['capacity_downlink_(kbps)'] ?? null,
            'Center_Point_GS' => $row['center_point_gs'] ?? null,
            'Center_Point_Topo' => $row['center_point_topo'] ?? null,
            'Longitude' => $row['longitude'] ?? null,
            'Latitude' => $row['latitude'] ?? null,
            'Penyedia_Power' => $row['penyedia_power'],
        ]);
    }

    // private function excelSerialToDate($serial)
    // {
    //     // Konversi nomor serial Excel ke format tanggal
    //     if (is_numeric($serial)) {
    //         // Excel mulai menghitung dari 1900-01-01
    //         $excelStartDate = Carbon::create(1899, 12, 30); // Mulai dari 1900-01-01
    //         return $excelStartDate->addDays($serial)->format('Y-m-d');
    //     }

    //     return null;
    // }

    // public function rules(): array
    // {
    //     return [
    //         '*.Waktu' => ['required', 'date'],
    //         '*.Waktu Hingga' => ['nullable', 'date'],
    //         '*.Provinsi' => ['required', 'string', 'max:100'],
    //         '*.Kabupaten/Kota' => ['required', 'string', 'max:100'],
    //         '*.Kecamatan' => ['required', 'string', 'max:100'],
    //         '*.Desa' => ['required', 'string', 'max:100'],
    //         '*.Site ID' => ['required', 'string', 'max:100'],
    //         '*.Nama Site' => ['required', 'string', 'max:100'],
    //         '*.Site ID Bakti' => ['nullable', 'string', 'max:100'],
    //         '*.Terminal ID' => ['nullable', 'string', 'max:100'],
    //         '*.Keterangan 3T' => ['nullable', 'string', 'max:100'],
    //         '*.Tahun Pembangunan' => ['nullable', 'integer'],
    //         '*.Tower Owner' => ['nullable', 'string', 'max:100'],
    //         '*.Tanggal OnAir' => ['nullable', 'date'],
    //         '*.Project Phase' => ['nullable', 'string', 'max:100'],
    //         '*.Site Penyiaran' => ['nullable', 'string', 'max:100'],
    //         '*.Status' => ['required', 'string', 'max:100'],
    //         '*.Tanggal Integrasi' => ['nullable', 'date'],
    //         '*.Spotbeam' => ['nullable', 'string', 'max:100'],
    //         '*.Mitra LC' => ['nullable', 'string', 'max:100'],
    //         '*.Opsel' => ['nullable', 'string', 'max:100'],
    //         '*.Vendor Opsel' => ['nullable', 'string', 'max:100'],
    //         '*.Teknologi' => ['nullable', 'string', 'max:100'],
    //         '*.Bandwidth Total (kbps)' => ['nullable', 'integer'],
    //         '*.Capacity Uplink (kbps)' => ['nullable', 'integer'],
    //         '*.Capacity Downlink (kbps)' => ['nullable', 'integer'],
    //         '*.Center Point GS' => ['nullable', 'string', 'max:100'],
    //         '*.Center Point Topo' => ['nullable', 'string', 'max:100'],
    //         '*.Longitude' => ['nullable', 'numeric'],
    //         '*.Latitude' => ['nullable', 'numeric'],
    //     ];
    // }
}
