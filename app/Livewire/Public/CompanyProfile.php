<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public-flux')]
class CompanyProfile extends Component
{
    public array $profile = [];

    public function mount(): void
    {
        // حط بياناتك هنا مؤقتًا (وبعدين ننقلها لملف/DB)
        $this->profile = [
            'name' => 'آمر سبعة لحلول الأعمال',
            'tagline' => 'خدمات تأسيس الشركات والتشغيل والدعم القانوني',
            'email' => 'info@amr-7.sa',
            'phone' => '0538381925',
            'cr' => '7041008108',
            'address' => 'الرياض - المملكة العربية السعودية',
            'services' => [
                'تأسيس شركات وتعديلات عقود',
                'دعم الموارد البشرية والتشغيل',
                'حلول تقنية وأنظمة',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.public.company-profile');
    }
}
