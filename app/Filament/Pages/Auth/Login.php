<?php

declare(strict_types=1);

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BasePage;

final class Login extends BasePage
{
    public function mount(): void
    {
        if (app()->isLocal()) {
            $this->form->fill([
                'email' => 'admin@filament.com',
                'password' => '12345678',
                'remember' => true,
            ]);
        }
    }
}
