<?php


namespace App\QueryFilter;


class CircuitSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('name','like','%'.$q.'%');
        }

        return $builder;
    }
}
