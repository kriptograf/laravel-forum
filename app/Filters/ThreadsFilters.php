<?php
/**
 * Created by PhpStorm.
 * User: foreach
 * Date: 11.11.18
 * Time: 15:34
 */

namespace App\Filters;

use Illuminate\Http\Request;

class ThreadsFilters extends Filters
{
    protected $filters = ['by', 'popular'];

    /**
     * Фильтр по имени пользователя
     * @param string $username
     * @return mixed
     */
    protected function by($username)
    {
        //получить экземпляр пользовтеля по имени
        $user = \App\User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    protected function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }
}