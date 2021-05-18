<?php


namespace App\QueryFilter;


class EstablishmentSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('name','like','%'.$q.'%')
                    ->orWhere('phone','like','%'.$q.'%');
        }

        return $builder;
    }
}
