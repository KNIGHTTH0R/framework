<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/03/2016
 * Time: 17:35.
 */

namespace App\Classes\Repositories;

use App\Model\Setting;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class SettingsRepository.
 */
class SettingsRepository extends BaseRepository
{
    /**
     * @var Setting|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $string
     * @return Setting
     */
    public function firstKey(string $string)
    {
        return $this->model->where('key', $string)->first();
    }
}
