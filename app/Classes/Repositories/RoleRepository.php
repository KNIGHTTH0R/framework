<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/10/2016
 * Time: 20:18.
 */

namespace App\Classes\Repositories;

use App\Model\Role;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
{
    /**
     * @var Role|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection|\Illuminate\Support\Collection
     */
    public function whereRolesGreaterOrEqualToMyAccount()
    {
        return $this->model->where('id', '>=', account()->role->id)->get();
    }
}
