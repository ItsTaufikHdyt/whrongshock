<?php

namespace App\Filament\UserPanel\Pages;

use Filament\Pages\Page;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user-panel.pages.user-dashboard';
    protected static ?string $title = 'Dashboard Saya';
    protected static ?string $navigationGroup = 'User Area';
    protected static ?int $navigationSort = 0;
}
