<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 05/03/2016
 * Time: 17:16.
 */

namespace App\Classes\Repositories;

use App\Model\Plugin;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PluginRepository.
 */
class PluginRepository
{
    /**
     * The model for eloquent access.
     *
     * @var Builder
     */
    private $model;

    /**
     * AccountRepository constructor.
     *
     * @param Plugin $model
     */
    public function __construct(Plugin $model)
    {
        $this->model = $model;
    }

    public function all() : Collection
    {
        return $this->model->get();
    }

    /**
     * @return mixed
     */
    public function allWhereActive() : Collection
    {
        return $this->model->where('enabled', true)->get();
    }

    /**
     * @return mixed
     */
    public function allWhereViewable() : Collection
    {
        return $this->model->where('enabled', true)->whereNull('hidden')->get();
    }

    /**
     * @return mixed
     */
    public function allWhereDisabled() : Collection
    {
        return $this->model->where('enabled', false)->get();
    }

    /**
     * Return the model based on the input name.
     *
     * @param $plugin_name
     * @return Plugin|array|\stdClass
     */
    public function whereName($plugin_name)
    {
        return $this->model->where('name', $plugin_name)->first();
    }
}
