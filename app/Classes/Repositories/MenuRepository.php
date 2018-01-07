<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 13/03/2016
 * Time: 19:52.
 */

namespace App\Classes\Repositories;

use App\Model\Menu;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class MenuRepository.
 *
 * @method Menu withTrashed
 */
class MenuRepository extends BaseRepository
{
    /**
     * @var Menu|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Menu $model
     */
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    /**
     * Frontend requires that a organised list of menus is returned.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function organisedMenuList()
    {
        return $this->model->whereNull('parent_id')->where('status', true)->with('page')->orderBy('order', 'asc')->get();
    }

    /**
     * Top level menus, without any further parents.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function whereTopLevel()
    {
        return $this->model->whereNull('parent_id')->orderBy('order', 'asc')->get();
    }

    public function whereTopLevelEditable()
    {
        return $this->model->where('lock', false)->whereNull('parent_id')->orderBy('order', 'asc')->get();
    }

    /**
     * Where the menu belongs to a another menu.
     *
     * @param int $integer
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function whereParent(int $integer)
    {
        return ($integer == 1) ? $this->whereTopLevel() : $this->model->where('parent_id', $integer)->orderBy('order', 'asc')->get();
    }

    public function allParentsWithChildren()
    {
        return $this->model->whereNull('parent_id')->with('page', 'children')->orderBy('order', 'asc')->get();
    }
}
