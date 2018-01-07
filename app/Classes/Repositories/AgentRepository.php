<?php
/**
 * Created by PhpStorm.
 * User: Marky
 * Date: 05/09/2017
 * Time: 09:31.
 */

namespace App\Classes\Repositories;

use App\Model\Agent;
use Illuminate\Database\Eloquent\Builder;
use Doctrine\Common\Collections\Collection;

/**
 * Class AgentRepository.
 */
class AgentRepository extends BaseRepository
{
    /**
     * @var Agent|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Agent $model
     */
    public function __construct(Agent $model)
    {
        $this->model = $model;
    }
}
