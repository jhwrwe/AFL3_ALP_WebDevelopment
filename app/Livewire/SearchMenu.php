<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Http\Request;

class SearchMenu extends Component
{
    public $search;

    public function search(Request $request)
    {
        $query = $request->input('search');
        $menus = Menu::where('name', 'like', "%$query%")
                     ->orWhere('description', 'like', "%$query%")
                     ->get();

        return view('view_menu', ['projects' => $menus]);
    }

    public function updatedSearch()
    {
        $this->emit('searchFocus');
    }
}
