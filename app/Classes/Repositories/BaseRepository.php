<?php
/**
 * Created by PhpStorm.
 * User: Marky
 * Date: 04/01/2018
 * Time: 00:13.
 */

namespace App\Classes\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @var Builder|Collection
     */
    protected $model;

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param int $integer
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function whereID(int $integer)
    {
        return $this->model->where('id', $integer)->first();
    }
}
