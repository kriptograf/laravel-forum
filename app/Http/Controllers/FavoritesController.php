<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Сохранить запись в понравившиеся
     * @param Reply $reply
     * @return mixed
     */
    public function store(Reply $reply)
    {
        $reply->favorite();
        return back();
    }
}
