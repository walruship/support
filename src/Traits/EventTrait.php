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

namespace Walruship\Support\Traits;

use Illuminate\Contracts\Events\Dispatcher;

trait EventTrait
{
    /**
     * The event dispatcher instance.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $dispatcher;

    /**
     * The event dispatcher status.
     *
     * @var bool
     */
    protected $dispatcherStatus = true;

    /**
     * Returns the event dispatcher.
     *
     * @return \Illuminate\Contracts\Events\Dispatcher
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * Sets the event dispatcher instance.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
     *
     * @return $this
     */
    public function setDispatcher(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        return $this;
    }

    /**
     * Returns the event dispatcher status.
     *
     * @return bool
     */
    public function getDispatcherStatus()
    {
        return $this->dispatcherStatus;
    }

    /**
     * Sets the event dispatcher status.
     *
     * @param bool $status
     *
     * @return $this
     */
    public function setDispatcherStatus($status)
    {
        $this->dispatcherStatus = (bool) $status;

        return $this;
    }

    /**
     * Enables the event dispatcher.
     *
     * @return $this
     */
    public function enableDispatcher()
    {
        return $this->setDispatcherStatus(true);
    }

    /**
     * Disables the event dispatcher.
     *
     * @return $this
     */
    public function disableDispatcher()
    {
        return $this->setDispatcherStatus(false);
    }

    /**
     * Fires an event.
     *
     * @param string $event
     * @param mixed  $payload
     * @param bool   $halt
     *
     * @return mixed
     */
    protected function fireEvent($event, $payload = [], $halt = false)
    {
        $dispatcher = $this->dispatcher;

        $status = $this->dispatcherStatus;

        if (! $dispatcher || $status === false) {
            return 0;
        }

        $method = $halt ? 'until' : 'dispatch';

        return $dispatcher->{$method}($event, $payload);
    }
}
