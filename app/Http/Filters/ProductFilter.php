<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;


class ProductFilter extends AbstractFilter {

    public const CATEGORY = 'category';
    public const TITLE    = 'title';
    public const STATUS   = 'status';

    /**
     * @return array[]
     */
    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::TITLE    => [$this, 'title'],
            self::STATUS   => [$this, 'status'],
        ];
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function category(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
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
