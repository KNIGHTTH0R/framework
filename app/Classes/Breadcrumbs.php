<?php
/**
 * Created by PhpStorm.
 * User: Marky
 * Date: 04/01/2018
 * Time: 01:28.
 */

namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class Breadcrumbs.
 */
class Breadcrumbs
{
    /**
     * A collection of crumbs.
     *
     * @var Collection
     */
    protected $collection;

    /**
     * Breadcrumbs constructor.
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param string $title
     * @param string $path
     * @return bool
     */
    public function addCrumb(string $title, string $path)
    {
        $crumb = new \stdClass();
        $crumb->title = $this->filter($title);
        $crumb->path = url($path);

        $this->collection->push($crumb);

        return true;
    }

    /**
     * @param string $title
     * @return string
     */
    public function filter(string $title)
    {
        return ucwords(str_replace(['_', '-'], [' ', ' '], $title));
    }

    /**
     * @return Collection
     */
    public function crumbs()
    {
        return $this->collection;
    }

    /**
     * @param string $name
     * @param int $position
     * @return bool
     */
    public function contain(string $name, int $position)
    {
        if ($this->collection->has($position) == false) {
            return false;
        }

        return $this->collection->get($position)->title == $this->filter($name);
    }

    /**
     * @param int $integer
     * @return bool
     */
    public function hasCount(int $integer)
    {
        return $this->collection->count() == $integer;
    }

    /**
     * @param int $count
     * @return $this
     */
    public function limit(int $count)
    {
        $collection = new Collection;

        for ($i = 0; $i < $count; $i++) {
            if ($this->collection->has($i)) {
                $collection->push($this->collection->get($i));
            }
        }

        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Breadcrumbs
     */
    public static function fromCurrentRoute()
    {
        /** @var Breadcrumbs $instance */
        $instance = app(self::class);

        /** @var array $routes */
        $routes = explode('/', app(Request::class)->getRequestUri());

        $urlPath = url(array_pull($routes, 0));

        // Add the home array.
        $instance->addCrumb('Home', $urlPath);

        foreach ($routes as $route) {
            $urlPath = $urlPath.'/'.$route;

            $instance->addCrumb($route, $urlPath);
        }

        return $instance;
    }
}
