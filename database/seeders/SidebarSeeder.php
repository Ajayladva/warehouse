<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class SidebarSeeder extends Seeder
{
    public function run(): void
    {
        // Menu Items
        $menus = [
            ['label' => 'Dashboard',  'route_name' => 'page.dashboard',      'icon' => 'ti-home',        'sort_order' => 1],
            ['label' => 'Projects',   'route_name' => 'page.project',  'icon' => 'ti-folder',      'sort_order' => 2],
        ];

        foreach ($menus as $menu) {
            MenuItem::create($menu);
        }


    }
}