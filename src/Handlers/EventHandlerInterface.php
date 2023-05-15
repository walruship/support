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

use Illuminate\Contracts\Events\Dispatcher;

interface EventHandlerInterface
{
    /**
     * Registers the event listeners using the given dispatcher instance.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
     *
     * @return void
     */
    public function subscribe(Dispatcher $dispatcher);
}
