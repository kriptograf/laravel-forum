<?php
/**
 * Created by PhpStorm.
 * User: foreach
 * Date: 11.11.18
 * Time: 19:04
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract  class Filters
{
    /**
     * @var Request
     */
    protected $request, $builder;

    protected $filters = [];

    /**
     * Filters constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Применить фильтр к построителю запросов
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        /**
         * Применить фильтры
         */
        foreach ($this->getFilters() as $filter => $value) {
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }

        }

        return $this->builder;

    }

    public function getFilters()
    {
        return $this->request->only($this->filters);
    }

    /**
     * @param $filter
     * @return bool
     */
    protected function hasFilter($filter): bool
    {
        return method_exists($this, $filter) && $this->request->has($filter);
    }
}