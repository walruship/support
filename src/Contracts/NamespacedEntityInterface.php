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

namespace Walruship\Support\Contracts;

interface NamespacedEntityInterface
{
    /**
     * Returns the entity namespace.
     *
     * @return string
     */
    public static function getEntityNamespace();

    /**
     * Sets the entity namespace.
     *
     * @param string $namespace
     *
     * @return void
     */
    public static function setEntityNamespace($namespace);
}
