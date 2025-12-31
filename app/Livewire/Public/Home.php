<?php

namespace App\Livewire\Public;

use App\Models\Category;
use App\Models\Equipment;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.public.home', [
            'categories' => Category::query()->where('is_active', true)->orderBy('sort')->get(),
            'featured' => Equipment::query()->where('is_published', true)->latest()->take(8)->get(),
        ]);
    }
}
