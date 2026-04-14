<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // ── Top-level categories ──────────────────────────────────────────
        $piscine = Category::create([
            'name'       => 'Piscine',
            'slug'       => 'piscine',
            'icon'       => '🏊',
            'sort_order' => 1,
            'type'       => 'shop',
            'is_active'  => true,
        ]);

        $cazi = Category::create([
            'name'       => 'Cazi hidromasaj',
            'slug'       => 'cazi-hidromasaj',
            'icon'       => '🛁',
            'sort_order' => 2,
            'type'       => 'shop',
            'is_active'  => true,
        ]);

        Category::create([
            'name'       => 'Hamam & Bai de abur',
            'slug'       => 'hamam-bai-de-abur',
            'icon'       => '♨️',
            'sort_order' => 3,
            'type'       => 'shop',
            'is_active'  => true,
        ]);

        $acoperire = Category::create([
            'name'       => 'Acoperire',
            'slug'       => 'acoperire',
            'icon'       => '🛡️',
            'sort_order' => 4,
            'type'       => 'shop',
            'is_active'  => true,
        ]);

        $spa = Category::create([
            'name'       => 'SPA & Wellness',
            'slug'       => 'spa-wellness',
            'icon'       => '🧖',
            'sort_order' => 5,
            'type'       => 'page',
            'is_active'  => true,
        ]);

        // ── Sub Piscine — group: concepte ─────────────────────────────────
        $piscineSubs = [
            ['name' => 'Piscine cu skimmer',             'slug' => 'piscine-cu-skimmer',              'sort_order' => 1],
            ['name' => 'Piscine infinity',               'slug' => 'piscine-infinity',                'sort_order' => 2],
            ['name' => 'Piscine cu rigola perimetrala',  'slug' => 'piscine-cu-rigola-perimetrala',   'sort_order' => 3],
            ['name' => 'Piscina interioara',             'slug' => 'piscina-interioara',              'sort_order' => 4],
            ['name' => 'Aqua fitness',                   'slug' => 'aqua-fitness',                    'sort_order' => 5],
            ['name' => 'Piscine inox',                   'slug' => 'piscine-inox',                    'sort_order' => 6],
            ['name' => 'Piscine cu pereti din sticla',   'slug' => 'piscine-cu-pereti-din-sticla',    'sort_order' => 7],
        ];
        foreach ($piscineSubs as $sub) {
            Category::create(array_merge($sub, [
                'parent_id' => $piscine->id,
                'group'     => 'concepte',
                'type'      => 'shop',
                'is_active' => true,
            ]));
        }

        // ── Sub Piscine — group: tendinte ─────────────────────────────────
        $piscineTendinte = [
            ['name' => 'Filtrare',       'slug' => 'filtrare-piscine',  'sort_order' => 10],
            ['name' => 'Incalzire',      'slug' => 'incalzire-piscine', 'sort_order' => 11],
            ['name' => 'Tratament apa',  'slug' => 'tratament-apa',     'sort_order' => 12],
            ['name' => 'Iluminare',      'slug' => 'iluminare-piscine', 'sort_order' => 13],
            ['name' => 'Jocuri acvatice','slug' => 'jocuri-acvatice',   'sort_order' => 14],
        ];
        foreach ($piscineTendinte as $sub) {
            Category::create(array_merge($sub, [
                'parent_id' => $piscine->id,
                'group'     => 'tendinte',
                'type'      => 'shop',
                'is_active' => true,
            ]));
        }

        // ── Sub Cazi hidromasaj ───────────────────────────────────────────
        $caziSubs = [
            ['name' => 'SPA portabil',  'slug' => 'spa-portabil',  'sort_order' => 1],
            ['name' => 'SPA incorporat','slug' => 'spa-incorporat', 'sort_order' => 2],
            ['name' => 'SPA public',    'slug' => 'spa-public',    'sort_order' => 3],
        ];
        foreach ($caziSubs as $sub) {
            Category::create(array_merge($sub, [
                'parent_id' => $cazi->id,
                'type'      => 'shop',
                'is_active' => true,
            ]));
        }

        // ── Sub Acoperire ─────────────────────────────────────────────────
        $acoperireSubs = [
            ['name' => 'Prelata izotermica',     'slug' => 'prelata-izotermica',     'sort_order' => 1],
            ['name' => 'Prelata securitate',     'slug' => 'prelata-securitate',     'sort_order' => 2],
            ['name' => 'Acoperire retractabila', 'slug' => 'acoperire-retractabila', 'sort_order' => 3],
        ];
        foreach ($acoperireSubs as $sub) {
            Category::create(array_merge($sub, [
                'parent_id' => $acoperire->id,
                'type'      => 'shop',
                'is_active' => true,
            ]));
        }

        // ── Sub SPA & Wellness ────────────────────────────────────────────
        $spaSubs = [
            ['name' => 'Hamam',              'slug' => 'hamam-wellness',    'sort_order' => 1],
            ['name' => 'Dusuri emotionale',  'slug' => 'dusuri-emotionale', 'sort_order' => 2],
            ['name' => 'Dusuri Vichy',       'slug' => 'dusuri-vichy',      'sort_order' => 3],
            ['name' => 'Fotolii relaxare',   'slug' => 'fotolii-relaxare',  'sort_order' => 4],
        ];
        foreach ($spaSubs as $sub) {
            Category::create(array_merge($sub, [
                'parent_id' => $spa->id,
                'type'      => 'page',
                'is_active' => true,
            ]));
        }

        $this->command->info('CategoryMenuSeeder: 5 categorii top-level + subcategorii create.');
    }
}
