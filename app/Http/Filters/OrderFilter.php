<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;


class OrderFilter extends AbstractFilter {

    public const OWNER  = 'owner';
    public const ABOUT  = 'about';
    public const STATUS = 'status';

    /**
     * @return array[]
     */
    protected function getCallbacks(): array
    {
        return [
            self::OWNER  => [$this, 'owner'],
            self::ABOUT  => [$this, 'about'],
            self::STATUS => [$this, 'status'],
        ];
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function owner(Builder $builder, $value): void
    {
        $builder->where('owner_id', $value);
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function about(Builder $builder, $value): void
    {
        $builder->where('about', 'like', '%' . $value . '%');
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
