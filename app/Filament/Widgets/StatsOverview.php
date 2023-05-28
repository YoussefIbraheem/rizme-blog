<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Number Of Posts', count(Post::all()) ),
            Card::make('Number Of Users',    count(User::all())),
            Card::make('Number Of Comments', count(Comment::all())),
            Card::make('Number Of Messages', count(Message::all())),
        ];
    }
}
