<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 23/03/2016
 * Time: 21:46.
 */

namespace App\Classes\Repositories;

use App\Model\Update;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class MigrationRepository.
 */
class UpdateRepository extends BaseRepository
{
    /**
     * @var Update|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Update $model
     */
    public function __construct(Update $model)
    {
        $this->model = $model;
    }
}
