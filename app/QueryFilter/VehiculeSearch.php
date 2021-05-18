<?php


namespace App\QueryFilter;


class VehiculeSearch extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            return $builder->where('code','like','%'.$q.'%')
                ->orWhere('matriculation','like','%'.$q.'%');
        }

        return $builder;
    }
}
