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
            [
                'name' => 'Journal Club',
                'episodes' => [
                    ['name' => 'Outcomes at 3 years posttransplant in imlifidase-desensitized kidney transplant patients', 'speaker' => 'Mathanaporn Kehaloon, M.D.', 'date' => 'Dec 7 2021', 'slug' => '211207-outcomes-at-3-years-posttransplant-in-imlifidase-desensitized-kt-mathanaporn'],
                    ['name' => 'High dose coupled plsma filtration and absorption in septic shock patients. Results of the COMPACT-2: a multicentre, adaptive, randomised clinical trial', 'speaker' => 'Sumawadee Boonyasurak, M.D.', 'date' => 'Nov 30 2021', 'slug' => '211130-high-dose-coupled-plsma-filtration-sumawadee'],
                    ['name' => 'Chlorthalidone for Hypertension in Advanced Chronic Kidney Disease', 'speaker' => 'Dechathorn Russameekulthana, M.D.', 'date' => 'Nov 23 2021', 'slug' => '211123-chlorhalidone-for-hypertension-in-advanced-ckd-dechathorn'],
                    ['name' => 'Becell depletion with obinutuzumab for the treatment of proliferative lupus nephritis: a randomized, double-blind, placebo-controlled trail', 'speaker' => 'Mathanaporn Kehaloon, M.D.', 'date' => 'Nov 9 2021', 'slug' => '211109-b-cell-depletion-with-obinutuzumab-mathanaporn'],
                    ['name' => 'AQP1 Promoter Variant, Water Transport, and Outcomes in Peritoneal Dialysis', 'speaker' => 'Anuyoot Tuntipumiamorn, M.D.', 'date' => 'Oct 26 2021', 'slug' => '211026-apq1-promoter-variant-water-transport-and-outcome-in-pd-anuyut'],
                    ['name' => 'A Randomized Trial of Albumin Infusions in Hospitalized Patients with Cirrhosis', 'speaker' => 'Salinthip Tiaochoktrakul, M.D.', 'date' => 'Oct 12 2021', 'slug' => '211012-a-randomized-trial-of-albumin-infusions-salinthip'],
                ],
            ],
            [
                'name' => 'Lecture',
                'episodes' => [
                    ['name' => 'Acute Kidney Injury', 'speaker' => 'Kornchanok Vareesangthip, M.D., Assistant Professor', 'date' => '2022', 'slug' => 'aki-2022-kornchanok'],
                    ['name' => 'Hyperkalemia', 'speaker' => 'Nalinee Premasathian, M.D.', 'date' => '2022', 'slug' => 'hyperkalemia-2022-nalinee'],
                    ['name' => 'Important point in acid-base disorders', 'speaker' => 'Chairat Shayakul, M.D., Professor', 'date' => '2022', 'slug' => 'Important-point-in-acid-base-disorders-2022 -chairat'],
                    ['name' => 'Nephrolithiasis for internist', 'speaker' => 'Suchai Sritippayawan, M.D.', 'date' => '2022', 'slug' => 'nephrolithiasis-for-internist-2022-suchai'],
                    ['name' => 'PD Orientation', 'speaker' => 'Thatsaphan Srithongkul, M.D.', 'date' => '2022', 'slug' => 'pd-orientation-2022-thatsapan'],
                ],
            ],
            [
                'name' => 'Topic Review',
                'episodes' => [
                    ['name' => 'ANCA-Associated Vasculitis (AAV)', 'speaker' => 'Thidarat Luxsananun, M.D.', 'date' => 'Dec 17 2021', 'slug' => '211217-anca-associated-vasculitis'],
                    ['name' => 'MCD and FSGS', 'speaker' => 'Salinthip Tiaochoktrakul, M.D.', 'date' => 'Dec 3 2021', 'slug' => '211203-mcd-and-fsgs-salinthip'],
                    ['name' => 'MPGN', 'speaker' => 'David Jiravijitkul, M.D.', 'date' => 'Nov 5 2021', 'slug' => '211105-mpgn-david'],
                    ['name' => 'Combination of Albumin and loop diuretic for treatment edema in Nephrotic syndrome', 'speaker' => 'Yanarin Thunsiribuddhichai, M.D.', 'date' => 'Oct 29 2021', 'slug' => '211029-combination-of-albumin-and-loop-diuretic-yanarin'],
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
                '211207-outcomes-at-3-years-posttransplant-in-imlifidase-desensitized-kt-mathanaporn',
                '211130-high-dose-coupled-plsma-filtration-sumawadee',
                '211123-chlorhalidone-for-hypertension-in-advanced-ckd-dechathorn',
                '211109-b-cell-depletion-with-obinutuzumab-mathanaporn',
                '211026-apq1-promoter-variant-water-transport-and-outcome-in-pd-anuyut',
                '211012-a-randomized-trial-of-albumin-infusions-salinthip',
            ],
            'lecture' => [
                'aki-2022-kornchanok',
                'hyperkalemia-2022-nalinee',
                'Important-point-in-acid-base-disorders-2022 -chairat',
                'nephrolithiasis-for-internist-2022-suchai',
                'pd-orientation-2022-thatsapan',
            ],
            'topic-review' => [
                '211217-anca-associated-vasculitis',
                '211203-mcd-and-fsgs-salinthip',
                '211105-mpgn-david',
                '211029-combination-of-albumin-and-loop-diuretic-yanarin',
            ],
        ];

        $asset = 'https://temp-nephron-videos.s3.ap-southeast-1.amazonaws.com/demo/';
        $serie = '';
        if (in_array($slug, $slugs['journal-club'])) {
            $asset .= "journal-club/{$slug}.mp4";
            $serie = 'Journal Club';
        } elseif (in_array($slug, $slugs['lecture'])) {
            $asset .= "lecture/{$slug}.mp4";
            $serie = 'Lecture';
        } elseif (in_array($slug, $slugs['topic-review'])) {
            $asset .= "topic-review/{$slug}.mp4";
            $serie = 'Topic Review';
        } else {
            abort(404);
        }

        $serieIndex = $this->series->search(fn ($s) => $s['name'] === $serie);
        $serie = $this->series[$serieIndex];
        $episodes = collect($serie['episodes']);
        $episodeIndex = $episodes->search(fn ($e) => $e['slug'] === $slug);

        return Inertia::render('KidneyClub/Show', ['asset' => $asset, 'episode' => $episodes[$episodeIndex]]);
    }
}
