<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;


class CategoryFilter extends AbstractFilter {

    public const PARENT = 'parent';
    public const TITLE  = 'title';
    public const STATUS = 'status';

    /**
     * @return array[]
     */
    protected function getCallbacks(): array
    {
        return [
            self::PARENT => [$this, 'parent'],
            self::TITLE  => [$this, 'title'],
            self::STATUS => [$this, 'status'],
        ];
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function parent(Builder $builder, $value): void
    {
        $builder->where('parent_id', $value);
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', '%' . $value . '%');
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function status(Builder $builder, $value): void
    {
        $builder->where('status', $value);
    }

}
