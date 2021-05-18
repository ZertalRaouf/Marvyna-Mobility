<?php


namespace App\QueryFilter;


class RoadmapSearch extends Filter
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
