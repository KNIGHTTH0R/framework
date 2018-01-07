<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/10/2016
 * Time: 20:14.
 */

namespace App\Classes\Repositories;

use App\Model\Account;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class AccountRepository.
 */
class AccountRepository extends BaseRepository
{
    /**
     * @var Account|Builder|Collection
     */
    protected $model;

    /**
     * PageRepository constructor.
     *
     * @param Account $model
     */
    public function __construct(Account $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $string
     * @return array|\stdClass|Account
     */
    public function whereEmail(string $string) : Account
    {
        return $this->model->where('email', $string)->first();
    }
}
