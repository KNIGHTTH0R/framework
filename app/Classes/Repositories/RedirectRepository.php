<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 28/07/2016
 * Time: 20:37.
 */

namespace App\Classes\Repositories;

use App\Model\Redirect;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RedirectRepository.
 */
class RedirectRepository extends BaseRepository
{
    /**
     * @var Redirect|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Redirect $model
     */
    public function __construct(Redirect $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|void|static[]
     */
    public function withRelationship()
    {
        return $this->model->whereHas('fromPage')->whereHas('toPage')->get();
    }
}
