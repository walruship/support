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
 * @link            https://walruship.com/LICENSE.txt
 */

namespace Walruship\Support\Handlers;

use Illuminate\Contracts\Container\Container;

class EventHandler
{
    /**
     * The container instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $app;

    /**
     * Dispatch after all db transactions are committed.
     *
     * @var bool|null
     */
    public $afterCommit;

    /**
     * Constructor.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     *
     * @return void
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Dynamically retrieve objects from the container.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->app[$key];
    }
}
