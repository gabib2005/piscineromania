<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        Role::firstOrCreate(['name' => 'admin',  'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);

        // Admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@piscineromania.ro'],
            [
                'name'     => 'Administrator',
                'password' => bcrypt('admin123!'),
            ]
        );
        $admin->assignRole('admin');

        // Categories — run CategoryMenuSeeder
        $this->call(CategoryMenuSeeder::class);

        /*
        // OLD categories from Aquashop.hu catalog — commented out, replaced by CategoryMenuSeeder
        $categories = [
            ['name' => 'Piscine',                  'icon' => '🏊', 'sort_order' => 1],
            ['name' => 'Pompe recirculare',         'icon' => '⚙️',  'sort_order' => 2],
            ['name' => 'Filtre si filtrare',        'icon' => '🔧', 'sort_order' => 3],
            ['name' => 'Chimicale si tratamente',   'icon' => '🧪', 'sort_order' => 4],
            ['name' => 'Incalzire apa',             'icon' => '🌡️', 'sort_order' => 5],
            ['name' => 'Iluminat si accesorii',     'icon' => '💡', 'sort_order' => 6],
            ['name' => 'Scari si platforme',        'icon' => '🪜', 'sort_order' => 7],
            ['name' => 'Curatare si aspiratoare',   'icon' => '🧹', 'sort_order' => 8],
            ['name' => 'Folie si etansare',         'icon' => '🎨', 'sort_order' => 9],
            ['name' => 'Automatizare si control',   'icon' => '🤖', 'sort_order' => 10],
            ['name' => 'Saune si spa',              'icon' => '🧖', 'sort_order' => 11],
            ['name' => 'Furtunuri si racorduri',    'icon' => '🔗', 'sort_order' => 12],
            ['name' => 'Pompe submersibile',        'icon' => '💧', 'sort_order' => 13],
            ['name' => 'Hidromasaj si jacuzzi',     'icon' => '🫧', 'sort_order' => 14],
            ['name' => 'Pompe de caldura',          'icon' => '♨️', 'sort_order' => 15],
            ['name' => 'Acoperitori si prelate',    'icon' => '🛡️', 'sort_order' => 16],
            ['name' => 'Robinete si vane',          'icon' => '🚰', 'sort_order' => 17],
            ['name' => 'Masurare si testare',       'icon' => '📊', 'sort_order' => 18],
            ['name' => 'Diverse',                   'icon' => '📦', 'sort_order' => 19],
        ];
        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['name' => $cat['name']],
                [
                    'slug'       => \Illuminate\Support\Str::slug($cat['name']),
                    'icon'       => $cat['icon'],
                    'sort_order' => $cat['sort_order'],
                    'is_active'  => true,
                ]
            );
        }
        */

        $this->command->info('Seeded: 2 roluri, 1 admin');
        $this->command->info('Admin login: admin@piscineromania.ro / admin123!');
    }
}
