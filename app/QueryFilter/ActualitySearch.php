<?php


namespace App\QueryFilter;


class ActualitySearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('title','like','%'.$q.'%');
        }

        return $builder;
    }
}
