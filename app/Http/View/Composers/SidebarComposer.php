<?php
namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'menuItems'  => MenuItem::active()->get(),
            // 'categories' => Category::active()->withCount('projects')->get(),
            // 'projects'   => Auth::check()
            //                     ? Project::active()
            //                              ->where('user_id', Auth::id())
            //                              ->with('category')
            //                              ->get()
            //                     : collect(),
            'authUser'   => Auth::user(),
        ]);
    }
}