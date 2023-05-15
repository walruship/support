<?php
/*
 * Walruship Co.,Ltd
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the 3-clause BSD license that is
 * available through the world-wide-web at this URL:
 * https://walruship.com/LICENSE.txt
 *
 * @author          Walruship Co.,Ltd
 * @copyright       Copyright (c) 2023 Walruship
 * @link            https://walruship.com
 */

namespace Walruship\Support;

use Illuminate\Support\ServiceProvider;

abstract class AppServiceProvider extends ServiceProvider
{
    /**
     * The alias pattern.
     *
     * @var string
     */
    protected $aliasPattern = '{class}Interface';

    /**
     * @param string $abstract
     * @param mixed  $concrete
     * @param bool   $shared
     * @param mixed  $alias
     *
     * @return void
     */
    protected function bindIf($abstract, $concrete = null, $shared = true, $alias = null)
    {
        if (! $this->app->bound($abstract)) {
            $concrete = $concrete ?: $abstract;

            $this->app->bind($abstract, $concrete, $shared);
        }

        $this->alias($abstract, $this->prepareAlias($alias, $concrete));
    }

    /**
     * Alias a type to a shorter name.
     *
     * @param string $abstract
     * @param string $alias
     *
     * @return void
     */
    protected function alias($abstract, $alias)
    {
        if ($alias) {
            $this->app->alias($abstract, $alias);
        }
    }

    /**
     * Prepares the alias.
     *
     * @param string $alias
     * @param mixed  $concrete
     *
     * @return mixed
     */
    protected function prepareAlias($alias, $concrete)
    {
        if (! $alias && $alias !== false && ! $concrete instanceof \Closure) {
            $alias = str_replace('{class}', $concrete, $this->aliasPattern);
        }

        return $alias;
    }
}
