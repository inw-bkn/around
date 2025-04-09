<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class KidneyClubController extends Controller
{
    protected $series;

    public function __construct()
    {
        $this->series = collect([
            // [
            //     'name' => 'Journal Club',
            //     'episodes' => [
            //         ['name' => 'Outcomes at 3 years posttransplant in imlifidase-desensitized kidney transplant patients', 'speaker' => 'Mathanaporn Kehaloon, M.D.', 'date' => 'Dec 7 2021', 'slug' => '211207-outcomes-at-3-years-posttransplant-in-imlifidase-desensitized-kt-mathanaporn'],
            //         ['name' => 'High dose coupled plsma filtration and absorption in septic shock patients. Results of the COMPACT-2: a multicentre, adaptive, randomised clinical trial', 'speaker' => 'Sumawadee Boonyasurak, M.D.', 'date' => 'Nov 30 2021', 'slug' => '211130-high-dose-coupled-plsma-filtration-sumawadee'],
            //         ['name' => 'Chlorthalidone for Hypertension in Advanced Chronic Kidney Disease', 'speaker' => 'Dechathorn Russameekulthana, M.D.', 'date' => 'Nov 23 2021', 'slug' => '211123-chlorhalidone-for-hypertension-in-advanced-ckd-dechathorn'],
            //         ['name' => 'Becell depletion with obinutuzumab for the treatment of proliferative lupus nephritis: a randomized, double-blind, placebo-controlled trail', 'speaker' => 'Mathanaporn Kehaloon, M.D.', 'date' => 'Nov 9 2021', 'slug' => '211109-b-cell-depletion-with-obinutuzumab-mathanaporn'],
            //         ['name' => 'AQP1 Promoter Variant, Water Transport, and Outcomes in Peritoneal Dialysis', 'speaker' => 'Anuyoot Tuntipumiamorn, M.D.', 'date' => 'Oct 26 2021', 'slug' => '211026-apq1-promoter-variant-water-transport-and-outcome-in-pd-anuyut'],
            //         ['name' => 'A Randomized Trial of Albumin Infusions in Hospitalized Patients with Cirrhosis', 'speaker' => 'Salinthip Tiaochoktrakul, M.D.', 'date' => 'Oct 12 2021', 'slug' => '211012-a-randomized-trial-of-albumin-infusions-salinthip'],
            //     ],
            // ],
            [
                'name' => 'Lecture',
                'episodes' => [
                    ['name' => 'Acute Kidney Injury', 'speaker' => 'Kornchanok Vareesangthip, M.D., Assistant Professor', 'date' => '2022', 'slug' => 'aki-2022-kornchanok'],
                    ['name' => 'Chronic Kidney Disease', 'speaker' => 'Attapong Vongwiwatana, M.D., Associate Professor', 'date' => '2022', 'slug' => 'ckd-2022-attapong'],
                    ['name' => 'Hyperkalemia', 'speaker' => 'Nalinee Premasathian, M.D.', 'date' => '2022', 'slug' => 'hyperkalemia-2022-nalinee'],
                    ['name' => 'Important point in acid-base disorders', 'speaker' => 'Chairat Shayakul, M.D., Professor', 'date' => '2022', 'slug' => 'important-point-in-acid-base-disorders-2022-chairat'],
                    ['name' => 'Metabolic Alkalosis', 'speaker' => 'Thawee Chanchairujira, M.D., Associate Professor', 'date' => '2022', 'slug' => 'metabolic-alkadosis-2022-tawee'],
                    ['name' => 'Nephrolithiasis for internist', 'speaker' => 'Suchai Sritippayawan, M.D.', 'date' => '2022', 'slug' => 'nephrolithiasis-for-internist-2022-suchai'],
                    ['name' => 'Peritoneal Dialysis Orientation', 'speaker' => 'Thatsaphan Srithongkul, M.D.', 'date' => '2022', 'slug' => 'pd-orientation-2022-thatsapan'],
                    ['name' => 'Rational Drug Use for Nephrologist', 'speaker' => 'Chairat Shayakul, M.D., Professor', 'date' => '2025', 'slug' => 'rational-drug-use-for-nephrologist-2025-chairat'],
                ],
            ],
            // [
            //     'name' => 'Topic Review',
            //     'episodes' => [
            //         ['name' => 'ANCA-Associated Vasculitis (AAV)', 'speaker' => 'Thidarat Luxsananun, M.D.', 'date' => 'Dec 17 2021', 'slug' => '211217-anca-associated-vasculitis'],
            //         ['name' => 'MCD and FSGS', 'speaker' => 'Salinthip Tiaochoktrakul, M.D.', 'date' => 'Dec 3 2021', 'slug' => '211203-mcd-and-fsgs-salinthip'],
            //         ['name' => 'MPGN', 'speaker' => 'David Jiravijitkul, M.D.', 'date' => 'Nov 5 2021', 'slug' => '211105-mpgn-david'],
            //         ['name' => 'Combination of Albumin and loop diuretic for treatment edema in Nephrotic syndrome', 'speaker' => 'Yanarin Thunsiribuddhichai, M.D.', 'date' => 'Oct 29 2021', 'slug' => '211029-combination-of-albumin-and-loop-diuretic-yanarin'],
            //     ],
            // ],
            [
                'name' => 'บรรยายอบรมระยะสั้น 4 เดือน',
                'episodes' => [
                    ['name' => 'หัวข้อที่ 1', 'speaker' => 'รศ.นพ.สุรศักดิ์ กันตชูเวสศิริ', 'date' => 'Oct 1 2021', 'slug' => '1. ศ.1 ต.ค.64 รศ.นพ.สุรศักดิ์ กันตชูเวสศิริ-1'],
                    ['name' => 'หัวข้อที่ 2', 'speaker' => 'นพ.คณิน ธรรมาวรานุคุปต์', 'date' => 'Oct 1 2021', 'slug' => '2. ศ.1 ต.ค.64 นพ.คณิน ธรรมาวรานุคุปต์-1', 'attach' => '4mo-training/2. เอกสารประกอบ ศ.1 ต.ค.64 นพ.คณิน ธรรมาวรานุคุปต์.pdf'],
                    ['name' => 'หัวข้อที่ 3', 'speaker' => 'รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์', 'date' => 'Oct 5 2021', 'slug' => '3. อ.5 ต.ค.64 รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์-1'],
                    ['name' => 'หัวข้อที่ 4', 'speaker' => 'ผศ.นพ.วันจักร พงษ์สิทธิศักดิ์', 'date' => 'Oct 8 2021', 'slug' => '4. ศ.8 ต.ค.64 ผศ.นพ.วันจักร พงษ์สิทธิศักดิ์-1'],
                    ['name' => 'หัวข้อที่ 5', 'speaker' => 'รศ.นพ.ณัฐชัย ศรีสวัสดิ์', 'date' => 'Oct 12 2021', 'slug' => '5. อ.12 ต.ค.64 รศ.นพ.ณัฐชัย ศรีสวัสดิ์-1'],
                    ['name' => 'หัวข้อที่ 6', 'speaker' => 'พญ.นฤตยา วโรทัย', 'date' => 'Oct 12 2021', 'slug' => '6. อ.12 ต.ค.64 พญ.นฤตยา วโรทัย-1'],
                    ['name' => 'หัวข้อที่ 7', 'speaker' => 'ผศ.พญ.ไกรวิพร เกียรติสุนทร', 'date' => 'Oct 15 2021', 'slug' => '7. ศ.15 ต.ค.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร-1', 'attach' => '4mo-training/7. เอกสารประกอบ ศ.15 ต.ค.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร.pdf'],
                    ['name' => 'หัวข้อที่ 8', 'speaker' => 'พล.อ.ท.กลศร ภัคโชตานนท์', 'date' => 'Oct 12 2021', 'slug' => '8. อ.19 ต.ค.64 พล.อ.ท.กลศร ภัคโชตานนท์-1'],
                    ['name' => 'หัวข้อที่ 9', 'speaker' => 'รศ.พญ.ธนันดา ตระการวนิช', 'date' => 'Oct 22 2021', 'slug' => '9. ศ.22 ต.ค.64 รศ.พญ.ธนันดา ตระการวนิช-1'],
                    ['name' => 'หัวข้อที่ 10', 'speaker' => 'ผศ.นพ.สุรเชษฐ์ วงษ์นิ่ม', 'date' => 'Oct 22 2021', 'slug' => '10. ศ.22 ต.ค.64 ผศ.นพ.สุรเชษฐ์ วงษ์นิ่ม-1'],
                    ['name' => 'หัวข้อที่ 11', 'speaker' => 'นพ.กำธร ลีลามะลิ', 'date' => 'Oct 26 2021', 'slug' => '11. อ.26 ต.ค.64 นพ.กำธร ลีลามะลิ-1'],
                    ['name' => 'หัวข้อที่ 12 (1)', 'speaker' => 'น.อ.พงศธร คชเสนี', 'date' => 'Oct 29 2021', 'slug' => '12. ศ.29 ต.ค.64 น.อ.พงศธร คชเสนี (1)', 'attach' => '4mo-training/12. เอกสารประกอบ ศ.29 ต.ค.64 น.อ.พงศธร คชเสนี.pdf'],
                    ['name' => 'หัวข้อที่ 12 (2)', 'speaker' => 'น.อ.พงศธร คชเสนี', 'date' => 'Oct 29 2021', 'slug' => '12. ศ.29 ต.ค.64 น.อ.พงศธร คชเสนี (2)', 'attach' => '4mo-training/12. เอกสารประกอบ ศ.29 ต.ค.64 น.อ.พงศธร คชเสนี.pdf'],
                    ['name' => 'หัวข้อที่ 13', 'speaker' => 'รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์', 'date' => 'Nov 2 2021', 'slug' => '13. อ.2 พ.ย.64 รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์'],
                    ['name' => 'หัวข้อที่ 14', 'speaker' => 'ผศ.พญ.ไกรวิพร เกียรติสุนทร', 'date' => 'Nov 5 2021', 'slug' => '14. ศ.5 พ.ย.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร-1'],
                    ['name' => 'หัวข้อที่ 15', 'speaker' => 'ผศ.พญ.ไกรวิพร เกียรติสุนทร', 'date' => 'Nov 5 2021', 'slug' => '15. ศ.5 พ.ย.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร-1'],
                    ['name' => 'หัวข้อที่ 16', 'speaker' => 'ศ.นพ.ขจร ตีรณธนากุล', 'date' => 'Nov 9 2021', 'slug' => '16. อ.9 พ.ย.64 ศ.นพ.ขจร ตีรณธนากุล', 'attach' => '4mo-training/16. อ.9 พ.ย.64 เอกสารประกอบ ศ.นพ.ขจร ตีรณธนากุล.pdf'],
                    ['name' => 'หัวข้อที่ 17', 'speaker' => 'รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์', 'date' => 'Nov 12 2021', 'slug' => '17. ศ.12 พ.ย.64 รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์'],
                    ['name' => 'หัวข้อที่ 18', 'speaker' => 'ผศ.พญ.วราคณา พิชัยวงศ์', 'date' => 'Nov 16 2021', 'slug' => '18. อ.16 พ.ย.64 ผศ.พญ.วราคณา พิชัยวงศ์'],
                    ['name' => 'หัวข้อที่ 19', 'speaker' => 'ศ.นพ.ขจร ตีรณธนากุล', 'date' => 'Nov 19 2021', 'slug' => '19. ศ.19 พ.ย.64 ศ.นพ.ขจร ตีรณธนากุล', 'attach' => '4mo-training/19. เอกสารประกอบ ศ.19 พ.ย.64 ศ.นพ.ขจร ตีรณธนากุล.pdf'],
                    ['name' => 'หัวข้อที่ 20 (1)', 'speaker' => 'รศ.นพ.ทวี ชาญชัยรุจิรา', 'date' => 'Nov 23 2021', 'slug' => '20. อ.23 พ.ย.64 รศ.นพ.ทวี ชาญชัยรุจิรา (1)', 'attach' => '4mo-training/20. เอกสารประกอบ อ.23 พ.ย.64 รศ.นพ.ทวี ชาญชัยรุจิรา.pdf'],
                    ['name' => 'หัวข้อที่ 20 (2)', 'speaker' => 'รศ.นพ.ทวี ชาญชัยรุจิรา', 'date' => 'Nov 23 2021', 'slug' => '20. อ.23 พ.ย.64 รศ.นพ.ทวี ชาญชัยรุจิรา (2)', 'attach' => '4mo-training/20. เอกสารประกอบ อ.23 พ.ย.64 รศ.นพ.ทวี ชาญชัยรุจิรา.pdf'],
                    ['name' => 'หัวข้อที่ 21', 'speaker' => 'พล.ต.ต.ธนิต จิรนันท์ธวัช', 'date' => 'Nov 26 2021', 'slug' => '21. ศ.26 พ.ย.64 พล.ต.ต.ธนิต จิรนันท์ธวัช'],
                    ['name' => 'หัวข้อที่ 22', 'speaker' => 'เพราพิลาศ ศรีสุวรรณ', 'date' => 'Nov 30 2021', 'slug' => '22. อ.30 พ.ย.64 พญ.เพราพิลาศ ศรีสุวรรณ'],
                    ['name' => 'หัวข้อที่ 23', 'speaker' => 'พ.อ.(พิเศษ).นพ.อุปถัมภ์ ศุภสินธุ์', 'date' => 'Dec 3 2021', 'slug' => '23. อ.3 ธ.ค.64 พ.อ.(พิเศษ).นพ.อุปถัมภ์ ศุภสินธุ์'],
                    ['name' => 'หัวข้อที่ 24', 'speaker' => 'พ.ท.ศ.นพ.บัญชา สถิรพจน์', 'date' => 'Dec 3 2021', 'slug' => '24. อ.3 ธ.ค.64 พ.ท.ศ.นพ.บัญชา สถิรพจน์', 'attach' => '4mo-training/24. เอกสารประกอบ ศ.3 ธ.ค.64 พ.ท.ศ.นพ.บัญชา สถิระพจน์.pdf'],
                    ['name' => 'หัวข้อที่ 25', 'speaker' => 'รศ.นพ.โอภาส ไตรตานนท์', 'date' => 'Dec 7 2021', 'slug' => '25. อ.7 ธ.ค.64 รศ.นพ.โอภาส ไตรตานนท์', 'attach' => '4mo-training/25. เอกสารประกอบ อ.7 ธ.ค.64 รศ.นพ.โอภาส ไตรตานนท์.pdf'],
                    ['name' => 'หัวข้อที่ 26', 'speaker' => 'น.ท.อนันต์ เชื้อสุวรรณ', 'date' => 'Dec 7 2021', 'slug' => '26. อ.7 ธ.ค.64 น.ท.อนันต์ เชื้อสุวรรณ'],
                    ['name' => 'หัวข้อที่ 27', 'speaker' => 'นพ.วุฒิเดช โอภาศเจริญสุข', 'date' => 'Dec 14 2021', 'slug' => '27. อ.14 ธ.ค.64 นพ.วุฒิเดช โอภาศเจริญสุข', 'attach' => '4mo-training/27. เอกสารประกอบ อ.14 ธ.ค.64 นพ.วุฒิเดช โอภาศเจริญสุข.pdf'],
                    ['name' => 'หัวข้อที่ 28', 'speaker' => 'นพ.วุฒิเดช โอภาศเจริญสุข', 'date' => 'Dec 14 2021', 'slug' => '28. อ.14 ธ.ค.64 นพ.วุฒิเดช โอภาศเจริญสุข', 'attach' => '4mo-training/28. เอกสารประกอบ อ.14 ธ.ค.64 นพ.วุฒิเดช โอภาศเจริญสุข.pdf'],
                    ['name' => 'หัวข้อที่ 29 (1)', 'speaker' => 'ผศ.พญ.กรชนก วารีเเสงทิพย์', 'date' => 'Dec 17 2021', 'slug' => '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (1)-1'],
                    ['name' => 'หัวข้อที่ 29 (2)', 'speaker' => 'ผศ.พญ.กรชนก วารีเเสงทิพย์', 'date' => 'Dec 17 2021', 'slug' => '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (2)-1'],
                    ['name' => 'หัวข้อที่ 29 (3)', 'speaker' => 'ผศ.พญ.กรชนก วารีเเสงทิพย์', 'date' => 'Dec 17 2021', 'slug' => '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (3)-1'],
                    ['name' => 'หัวข้อที่ 29 (4)', 'speaker' => 'ผศ.พญ.กรชนก วารีเเสงทิพย์', 'date' => 'Dec 17 2021', 'slug' => '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (4)-1'],
                    ['name' => 'หัวข้อที่ 30', 'speaker' => 'ผศ.พญ.อุษณีย์ บุญศรีรัตน์', 'date' => 'Dec 21 2021', 'slug' => '30. อ.21 ธ.ค.64 ผศ.พญ.อุษณีย์ บุญศรีรัตน์'],
                    ['name' => 'หัวข้อที่ 31', 'speaker' => 'ผศ.พญ.เนาวนิตย์ นาทา', 'date' => 'Dec 24 2021', 'slug' => '31. ศ.24 ธ.ค.64 พ.ท.หญิง ผศ.พญ.เนาวนิตย์ นาทา-1', 'attach' => '4mo-training/31. เอกสารประกอบ ศ.24 ธ.ค.64 พ.ท.หญิง ผศ.พญ.เนาวนิตย์ นาทา.pdf'],
                    ['name' => 'หัวข้อที่ 32', 'speaker' => 'รศ.พญ.ศิริรัตน์ อนุตระกูลชัย', 'date' => 'Dec 28 2021', 'slug' => '32. อ.28 ธ.ค.64 รศ.พญ.ศิริรัตน์ อนุตระกูลชัย-1'],
                    ['name' => 'หัวข้อที่ 33', 'speaker' => 'นพ.ธานี เอี่ยมศรีตระกูล', 'date' => 'Jan 4 2022', 'slug' => '33. อ.4 ม.ค.65 นพ.ธานี เอี่ยมศรีตระกูล'],
                    ['name' => 'หัวข้อที่ 34', 'speaker' => 'ผศ.พญ.ปีณิดา สกุลรัตนศักดิ์', 'date' => 'Jan 4 2022', 'slug' => '34. อ.4 ม.ค.65 พญ.ปีณิดา สกุลรัตนศักดิ์'],
                    ['name' => 'หัวข้อที่ 35', 'speaker' => 'ศ.นพ.เถลิงศักดิ์ กาญจนบุษย์', 'date' => 'Jan 7 2022', 'slug' => '35. ศ.7 ม.ค.65 ศ.นพ.เถลิงศักดิ์ กาญจนบุษย์'],
                    ['name' => 'หัวข้อที่ 36 (1)', 'speaker' => 'ผศ.(พิเศษ) นพ.วทัญญู พาราพิบูลย์', 'date' => 'Jan 11 2022', 'slug' => '36. อ.11 ม.ค.65 ผศ.(พิเศษ) นพ.วทัญญู พาราพิบูลย์ (1)'],
                    ['name' => 'หัวข้อที่ 36 (2)', 'speaker' => 'ผศ.(พิเศษ) นพ.วทัญญู พาราพิบูลย์', 'date' => 'Jan 11 2022', 'slug' => '36. อ.11 ม.ค.65 ผศ.(พิเศษ) นพ.วทัญญู พาราพิบูลย์ (2)'],
                    ['name' => 'หัวข้อที่ 37', 'speaker' => 'รศ.พญ.สิริภา ช้างศิริกุลชัย', 'date' => 'Jan 14 2022', 'slug' => '37. ศ.14 ม.ค.65 รศ.พญ.สิริภา ช้างศิริกุลชัย', 'attach' => '4mo-training/37. เอกสารประกอบ ศ.14 ม.ค.65 รศ.พญ.สิริภา ช้างศิริกุลชัย.pdf'],
                    ['name' => 'หัวข้อที่ 38 (1)', 'speaker' => 'รศ.นพ.ชลธิป พงศ์สกุล', 'date' => 'Jan 18 2022', 'slug' => '38. อ.18 ม.ค.65 รศ.นพ.ชลธิป พงศ์สกุล (1)-1'],
                    ['name' => 'หัวข้อที่ 38 (2)', 'speaker' => 'รศ.นพ.ชลธิป พงศ์สกุล', 'date' => 'Jan 18 2022', 'slug' => '38. อ.18 ม.ค.65 รศ.นพ.ชลธิป พงศ์สกุล (2)-1'],
                    // ['name' => 'หัวข้อที่', 'speaker' => 'xxx', 'date' => 'xxx', 'slug' => 'xxx'],
                  ],
            ],
        ]);
    }

    public function index()
    {
        Request::session()->flash('page-title', 'Kidney Club');
        Request::session()->flash('main-menu-links', [
            ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
            ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
            ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
            ['icon' => 'graduation-cap', 'label' => 'Kidney club', 'route' => 'kidney-club', 'can' => true],
            // ['icon' => 'graduation-cap', 'label' => 'Club Nephro', 'route' => 'procedures', 'can' => true],
            // ['icon' => 'box', 'label' => 'Code Drive', 'route' => 'procedures', 'can' => true],
        ]);

        return Inertia::render('KidneyClub/Index', ['series' => $this->series]);
    }

    public function show($slug)
    {
        Request::session()->flash('page-title', 'Kidney Club');
        Request::session()->flash('main-menu-links', [
            ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
            ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
            ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
            ['icon' => 'graduation-cap', 'label' => 'Kidney club', 'route' => 'kidney-club', 'can' => true],
            // ['icon' => 'graduation-cap', 'label' => 'Club Nephro', 'route' => 'procedures', 'can' => true],
            // ['icon' => 'box', 'label' => 'Code Drive', 'route' => 'procedures', 'can' => true],
        ]);

        $slugs = [
            'journal-club' => [
                // '211207-outcomes-at-3-years-posttransplant-in-imlifidase-desensitized-kt-mathanaporn',
                // '211130-high-dose-coupled-plsma-filtration-sumawadee',
                // '211123-chlorhalidone-for-hypertension-in-advanced-ckd-dechathorn',
                // '211109-b-cell-depletion-with-obinutuzumab-mathanaporn',
                // '211026-apq1-promoter-variant-water-transport-and-outcome-in-pd-anuyut',
                // '211012-a-randomized-trial-of-albumin-infusions-salinthip',
            ],
            'lecture' => [
                'aki-2022-kornchanok',
                'ckd-2022-attapong',
                'hyperkalemia-2022-nalinee',
                'important-point-in-acid-base-disorders-2022-chairat',
                'metabolic-alkadosis-2022-tawee',
                'nephrolithiasis-for-internist-2022-suchai',
                'pd-orientation-2022-thatsapan',
                'rational-drug-use-for-nephrologist-2025-chairat',
            ],
            'topic-review' => [
                // '211217-anca-associated-vasculitis',
                // '211203-mcd-and-fsgs-salinthip',
                // '211105-mpgn-david',
                // '211029-combination-of-albumin-and-loop-diuretic-yanarin',
            ],
            '4mo-training' => [
                '1. ศ.1 ต.ค.64 รศ.นพ.สุรศักดิ์ กันตชูเวสศิริ-1',
                '2. ศ.1 ต.ค.64 นพ.คณิน ธรรมาวรานุคุปต์-1',
                '3. อ.5 ต.ค.64 รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์-1',
                '4. ศ.8 ต.ค.64 ผศ.นพ.วันจักร พงษ์สิทธิศักดิ์-1',
                '5. อ.12 ต.ค.64 รศ.นพ.ณัฐชัย ศรีสวัสดิ์-1',
                '6. อ.12 ต.ค.64 พญ.นฤตยา วโรทัย-1',
                '7. ศ.15 ต.ค.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร-1',
                '8. อ.19 ต.ค.64 พล.อ.ท.กลศร ภัคโชตานนท์-1',
                '9. ศ.22 ต.ค.64 รศ.พญ.ธนันดา ตระการวนิช-1',
                '10. ศ.22 ต.ค.64 ผศ.นพ.สุรเชษฐ์ วงษ์นิ่ม-1',
                '11. อ.26 ต.ค.64 นพ.กำธร ลีลามะลิ-1',
                '12. ศ.29 ต.ค.64 น.อ.พงศธร คชเสนี (1)',
                '12. ศ.29 ต.ค.64 น.อ.พงศธร คชเสนี (2)',
                '13. อ.2 พ.ย.64 รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์',
                '14. ศ.5 พ.ย.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร-1',
                '15. ศ.5 พ.ย.64 ผศ.พญ.ไกรวิพร เกียรติสุนทร-1',
                '16. อ.9 พ.ย.64 ศ.นพ.ขจร ตีรณธนากุล',
                '17. ศ.12 พ.ย.64 รศ.ดร.พญ.ปวีณา สุสัณฐิตพงษ์',
                '18. อ.16 พ.ย.64 ผศ.พญ.วราคณา พิชัยวงศ์',
                '19. ศ.19 พ.ย.64 ศ.นพ.ขจร ตีรณธนากุล',
                '20. อ.23 พ.ย.64 รศ.นพ.ทวี ชาญชัยรุจิรา (1)',
                '20. อ.23 พ.ย.64 รศ.นพ.ทวี ชาญชัยรุจิรา (2)',
                '21. ศ.26 พ.ย.64 พล.ต.ต.ธนิต จิรนันท์ธวัช',
                '22. อ.30 พ.ย.64 พญ.เพราพิลาศ ศรีสุวรรณ',
                '23. อ.3 ธ.ค.64 พ.อ.(พิเศษ).นพ.อุปถัมภ์ ศุภสินธุ์',
                '24. อ.3 ธ.ค.64 พ.ท.ศ.นพ.บัญชา สถิรพจน์',
                '25. อ.7 ธ.ค.64 รศ.นพ.โอภาส ไตรตานนท์',
                '26. อ.7 ธ.ค.64 น.ท.อนันต์ เชื้อสุวรรณ',
                '27. อ.14 ธ.ค.64 นพ.วุฒิเดช โอภาศเจริญสุข',
                '28. อ.14 ธ.ค.64 นพ.วุฒิเดช โอภาศเจริญสุข',
                '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (1)-1',
                '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (2)-1',
                '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (3)-1',
                '29. ศ.17 ธ.ค.64 พญ.กรชนก วารีเเสงทิพย์ (4)-1',
                '30. อ.21 ธ.ค.64 ผศ.พญ.อุษณีย์ บุญศรีรัตน์',
                '31. ศ.24 ธ.ค.64 พ.ท.หญิง ผศ.พญ.เนาวนิตย์ นาทา-1',
                '32. อ.28 ธ.ค.64 รศ.พญ.ศิริรัตน์ อนุตระกูลชัย-1',
                '33. อ.4 ม.ค.65 นพ.ธานี เอี่ยมศรีตระกูล',
                '34. อ.4 ม.ค.65 พญ.ปีณิดา สกุลรัตนศักดิ์',
                '35. ศ.7 ม.ค.65 ศ.นพ.เถลิงศักดิ์ กาญจนบุษย์',
                '36. อ.11 ม.ค.65 ผศ.(พิเศษ) นพ.วทัญญู พาราพิบูลย์ (1)',
                '36. อ.11 ม.ค.65 ผศ.(พิเศษ) นพ.วทัญญู พาราพิบูลย์ (2)',
                '37. ศ.14 ม.ค.65 รศ.พญ.สิริภา ช้างศิริกุลชัย',
                '38. อ.18 ม.ค.65 รศ.นพ.ชลธิป พงศ์สกุล (1)-1',
                '38. อ.18 ม.ค.65 รศ.นพ.ชลธิป พงศ์สกุล (2)-1',
            ],
        ];

        // $asset = 'https://temp-nephron-videos.s3.ap-southeast-1.amazonaws.com/demo/';
        $baseUrl = 'https://demo-nephlix.s3.ap-southeast-1.amazonaws.com/test/';
        $asset = $baseUrl;
        $serie = '';
        $attach = '';
        if (in_array($slug, $slugs['journal-club'])) {
            $asset .= "journal-club/{$slug}.mp4";
            $serie = 'Journal Club';
        } elseif (in_array($slug, $slugs['lecture'])) {
            $asset .= "lecture/{$slug}.mp4";
            $serie = 'Lecture';
        } elseif (in_array($slug, $slugs['topic-review'])) {
            $asset .= "topic-review/{$slug}.mp4";
            $serie = 'Topic Review';
        } elseif (in_array($slug, $slugs['4mo-training'])) {
            $asset .= "4mo-training/{$slug}.mp4";
            $serie = 'บรรยายอบรมระยะสั้น 4 เดือน';
        } else {
            abort(404);
        }

        $serieIndex = $this->series->search(fn ($s) => $s['name'] === $serie);
        $serie = $this->series[$serieIndex];
        $episodes = collect($serie['episodes']);
        $episodeIndex = $episodes->search(fn ($e) => $e['slug'] === $slug);

        return Inertia::render('KidneyClub/Show', ['asset' => $asset, 'episode' => $episodes[$episodeIndex], 'baseUrl' => $baseUrl]);
    }
}
