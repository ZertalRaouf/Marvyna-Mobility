<?php


namespace App\QueryFilter;


class ClientSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('first_name','like','%'.$q.'%')
                ->orWhere('last_name','like','%'.$q.'%');
        }

        return $builder;
    }
}
