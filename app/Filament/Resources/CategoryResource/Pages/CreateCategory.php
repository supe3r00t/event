<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $slug = trim((string)($data['slug'] ?? ''));
        $base = $slug !== '' ? $slug : 'category';

        $i = 2;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i;
            $i++;
        }

        $data['slug'] = $slug;

        return $data;
    }
}
