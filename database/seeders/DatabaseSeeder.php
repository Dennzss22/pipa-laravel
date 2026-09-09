<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use App\Models\Block;
use App\Models\PipeCategory;
use App\Models\PipeSize;
use App\Models\PipeType;
use App\Models\PipeClass;
use App\Models\PipeWeight;
use App\Models\User;
use App\Models\Partner;
use App\Models\Material;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Seed Users with roles
        User::updateOrCreate(
            ['email' => 'admin@spindo.com'],
            ['name' => 'Administrator', 'password' => 'admin1234', 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'supervisor@spindo.com'],
            ['name' => 'Supervisor Gudang', 'password' => 'super1234', 'role' => 'supervisor']
        );

        User::updateOrCreate(
            ['email' => 'dendi@spindo.com'],
            ['name' => 'Dendi Setiawan', 'password' => 'Dendiaprilio1204', 'role' => 'operator']
        );

        User::updateOrCreate(
            ['email' => 'rizky@spindo.com'],
            ['name' => 'Rizky M', 'password' => 'rizky1234', 'role' => 'operator']
        );

        User::updateOrCreate(
            ['email' => 'khilmi@spindo.com'],
            ['name' => 'Khilmi Arif', 'password' => 'khilmi1234', 'role' => 'operator']
        );

        User::updateOrCreate(
            ['email' => 'akbar@spindo.com'],
            ['name' => 'Akbar Riskiawan', 'password' => 'akbar1122', 'role' => 'operator']
        );

        User::updateOrCreate(
            ['email' => 'reo@spindo.com'],
            ['name' => 'Reo Yudha', 'password' => 'reo1122', 'role' => 'operator']
        );

        // 1. Seed Warehouses & Blocks (A1-L3)
        $warehouses = [
            ['name' => 'Gudang A', 'description' => 'Gudang A - Unit 7 Gresik'],
            ['name' => 'Gudang B', 'description' => 'Gudang B - Unit 7 Gresik'],
            ['name' => 'Gudang C', 'description' => 'Gudang C - Unit 7 Gresik'],
            ['name' => 'Gudang D', 'description' => 'Gudang D - Unit 7 Gresik'],
        ];

        $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];

        foreach ($warehouses as $index => $whData) {
            $wh = Warehouse::firstOrCreate(['name' => $whData['name']], $whData);

            foreach ($letters as $letter) {
                for ($num = 1; $num <= 3; $num++) {
                    $code = "{$letter}{$num}";
                    $slocPrefix = '7A' . strtoupper(chr(65 + $index)); // 7AA, 7AB, 7AC, 7AD
                    $sloc = $slocPrefix . $num;
                    Block::firstOrCreate(
                        ['warehouse_id' => $wh->id, 'code' => $code],
                        ['sloc_code' => $sloc]
                    );
                }
            }
        }

        // 1.5 Seed Partners (from AppSheet dropdown data)
        $partners = [
            ['nama' => 'SPINDO Unit III', 'tipe' => 'internal', 'kode' => 'SPN-III'],
            ['nama' => 'SPINDO Unit V', 'tipe' => 'internal', 'kode' => 'SPN-V'],
            ['nama' => 'SPINDO Unit VI', 'tipe' => 'internal', 'kode' => 'SPN-VI'],
            ['nama' => 'SPINDO Unit VII', 'tipe' => 'internal', 'kode' => 'SPN-VII'],
            ['nama' => 'PT. SARIMAS BAHTERA', 'tipe' => 'customer', 'kode' => 'SAR-001'],
            ['nama' => 'PT. INTISUMBER BAJASAKTI', 'tipe' => 'customer', 'kode' => 'INT-001'],
            ['nama' => 'PT. SULINDA JAYA STEEL', 'tipe' => 'supplier', 'kode' => 'SUL-001'],
            ['nama' => 'PT. IMMANUEL PUTRA JAYA', 'tipe' => 'customer', 'kode' => 'IMM-001'],
            ['nama' => 'PT. RANGKA RAYA', 'tipe' => 'supplier', 'kode' => 'RAN-001'],
            ['nama' => 'PT. LOTTE HARDWARE', 'tipe' => 'customer', 'kode' => 'LOT-001'],
            ['nama' => 'Depo Samarinda', 'tipe' => 'customer', 'kode' => 'DSM-001'],
        ];
        foreach ($partners as $p) {
            Partner::firstOrCreate(['kode' => $p['kode']], $p);
        }

        // 1.6 Seed sample Materials (from AppSheet Kode Material data)
        $materials = [
            ['kode_produk' => 'G1B03NBC0600-06000', 'nama_mudah' => 'PIPA GALVA NON-DRAT 8" MEDIUM', 'jenis' => 'PIPA GALVA NON-DRAT', 'deskripsi' => 'PGB GLV EFB MP 8" 219,1x6,00x6000', 'ukuran' => '8"', 'diameter_mm' => 219.1, 'tebal_dinding_mm' => 6.00, 'class' => 'MEDIUM', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'G1B03NBC0750-06000', 'nama_mudah' => 'PIPA GALVA NON-DRAT 8" SCH-40', 'jenis' => 'PIPA GALVA NON-DRAT', 'deskripsi' => 'PGB GLV EFB MP 8" 219,1x7,50x6000', 'ukuran' => '8"', 'diameter_mm' => 219.1, 'tebal_dinding_mm' => 7.50, 'class' => 'SCH-40', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'G1B07CAY0310-06000', 'nama_mudah' => 'PIPA GALVA NON-DRAT 1" SCH-40', 'jenis' => 'PIPA GALVA NON-DRAT', 'deskripsi' => 'PGB GLV EFB STR MP 1" 33,4x3,10x6000', 'ukuran' => '1"', 'diameter_mm' => 33.4, 'tebal_dinding_mm' => 3.10, 'class' => 'SCH-40', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'H1B07CAY0310-06000', 'nama_mudah' => 'PIPA HITAM SCH-40 1"', 'jenis' => 'PIPA HITAM', 'deskripsi' => 'PHB MILL EFP STR MP 1" 33,4x3,10x6000', 'ukuran' => '1"', 'diameter_mm' => 33.4, 'tebal_dinding_mm' => 3.10, 'class' => 'SCH-40', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'H1B07HBE0510-06000', 'nama_mudah' => 'PIPA HITAM SCH-40 3"', 'jenis' => 'PIPA HITAM', 'deskripsi' => 'PHB MILL EFP STR MP 3" 88,9x5,10x6000', 'ukuran' => '3"', 'diameter_mm' => 88.9, 'tebal_dinding_mm' => 5.10, 'class' => 'SCH-40', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'G1B10FBC0330-06000', 'nama_mudah' => 'PIPA GALVA DRAT 2" MEDIUM', 'jenis' => 'PIPA GALVA DRAT', 'deskripsi' => 'PGB GLV STR THRD MP 2" 59,8x3,30x6000', 'ukuran' => '2"', 'diameter_mm' => 59.8, 'tebal_dinding_mm' => 3.30, 'class' => 'MEDIUM', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'H1B08EBN0280-06000', 'nama_mudah' => 'PIPA HITAM LGH 1-1/2"', 'jenis' => 'PIPA HITAM', 'deskripsi' => 'PHB MILL EFP BYD VB MP 1-1/2" 48,3x2,80x6000', 'ukuran' => '1-1/2"', 'diameter_mm' => 48.3, 'tebal_dinding_mm' => 2.80, 'class' => 'LGH', 'pengerjaan' => 'FG'],
            ['kode_produk' => 'G2B10LAV0455-06000', 'nama_mudah' => 'PIPA GALVA DRAT 6" MEDIUM', 'jenis' => 'PIPA GALVA DRAT', 'deskripsi' => 'PGBB GLV STR THRD MP 6" 184,1x4,55x6000', 'ukuran' => '6"', 'diameter_mm' => 184.1, 'tebal_dinding_mm' => 4.55, 'class' => 'MEDIUM', 'pengerjaan' => 'FG'],
        ];
        foreach ($materials as $m) {
            Material::firstOrCreate(['kode_produk' => $m['kode_produk']], $m);
        }

        // 2. Seed Pipe Categories
        $categories = [
            ['code' => 'hitam',    'name' => 'PIPA HITAM'],
            ['code' => 'galvanis', 'name' => 'PIPA GALVANIS'],
            ['code' => 'kotak',    'name' => 'PIPA KOTAK / HOLLOW'],
        ];
        foreach ($categories as $cat) {
            PipeCategory::firstOrCreate(['code' => $cat['code']], $cat);
        }

        // 3. Seed Pipe Sizes
        $sizes = [
            ['size_label' => '1/2"',   'pcs_per_bundle' => 217],
            ['size_label' => '3/4"',   'pcs_per_bundle' => 169],
            ['size_label' => '1"',     'pcs_per_bundle' => 127],
            ['size_label' => '1 1/4"', 'pcs_per_bundle' => 91],
            ['size_label' => '1 1/2"', 'pcs_per_bundle' => 61],
            ['size_label' => '2"',     'pcs_per_bundle' => 61],
            ['size_label' => '2 1/2"', 'pcs_per_bundle' => 37],
            ['size_label' => '3"',     'pcs_per_bundle' => 29],
            ['size_label' => '4"',     'pcs_per_bundle' => 19],
            ['size_label' => '5"',     'pcs_per_bundle' => 10],
            ['size_label' => '6"',     'pcs_per_bundle' => 10],
            ['size_label' => '8"',     'pcs_per_bundle' => 7],
        ];

        $sizeModels = [];
        foreach ($sizes as $s) {
            $sizeModels[$s['size_label']] = PipeSize::firstOrCreate(
                ['size_label' => $s['size_label']],
                ['pcs_per_bundle' => $s['pcs_per_bundle']]
            );
        }

        // 4. Seed Pipe Types (Grade) — G-A dan G-B
        $types = [
            ['code' => 'G-A', 'name' => 'Grade A'],
            ['code' => 'G-B', 'name' => 'Grade B'],
        ];

        $typeModels = [];
        foreach ($types as $t) {
            $typeModels[$t['code']] = PipeType::firstOrCreate(['code' => $t['code']], $t);
        }

        // 5. Seed Pipe Classes
        $classes = [
            ['code' => 'SCH40', 'name' => 'SCH 40'],
            ['code' => 'L',     'name' => 'L'],
            ['code' => 'M',     'name' => 'M'],
            ['code' => 'BSA',   'name' => 'BSA'],
            ['code' => 'MED',   'name' => 'MED'],
        ];
        foreach ($classes as $cl) {
            PipeClass::firstOrCreate(['code' => $cl['code']], $cl);
        }

        // 6. Seed Pipe Weights (Grade A & B per bundle in KG)
        $weights = [
            // size_label => [G-A, G-B] weight per bundle
            '1/2"'   => ['G-A' => 1100.00, 'G-B' => 1391.00],
            '3/4"'   => ['G-A' => 1150.00, 'G-B' => 1402.70],
            '1"'     => ['G-A' => 1200.00, 'G-B' => 1500.00],
            '1 1/4"' => ['G-A' => 1300.00, 'G-B' => 1437.80],
            '1 1/2"' => ['G-A' => 1100.00, 'G-B' => 1128.50],
            '2"'     => ['G-A' => 1200.00, 'G-B' => 1391.42],
            '2 1/2"' => ['G-A' => 1100.00, 'G-B' => 1200.00],
            '3"'     => ['G-A' => 1150.00, 'G-B' => 1250.00],
            '4"'     => ['G-A' => 1100.00, 'G-B' => 1180.00],
            '5"'     => ['G-A' => 1100.00, 'G-B' => 1220.00],
            '6"'     => ['G-A' => 1050.00, 'G-B' => 1150.00],
            '8"'     => ['G-A' => 1100.00, 'G-B' => 1250.00],
        ];

        foreach ($weights as $sizeLabel => $typeWeights) {
            if (isset($sizeModels[$sizeLabel])) {
                $sizeObj = $sizeModels[$sizeLabel];
                foreach ($typeWeights as $typeCode => $wKg) {
                    if (isset($typeModels[$typeCode])) {
                        PipeWeight::firstOrCreate(
                            ['pipe_size_id' => $sizeObj->id, 'pipe_type_id' => $typeModels[$typeCode]->id],
                            ['weight_per_bundle' => $wKg]
                        );
                    }
                }
            }
        }
    }
}
