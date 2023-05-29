<?php

namespace App\Filament\Widgets;

use App\Models\Category;
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
        return [ //display the number of each row in a table
            Card::make('Number Of Categories', count(Category::all()) ), 
            Card::make('Number Of Posts', count(Post::all()) ),
            Card::make('Number Of Users',    count(User::all())),
            Card::make('Number Of Comments', count(Comment::all())),
            Card::make('Number Of Messages', count(Message::all())),
        ];
    }
}
