<?php

namespace App\Livewire\Public;
use App\Models\Category;
use App\Models\Equipment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.public')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.public.home', [
            'categories' => Category::query()
                ->where('is_active', true)
                ->orderBy('sort')
                ->get(),

            'featured' => Equipment::query()
                ->where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get(),
        ]);
    }
}
