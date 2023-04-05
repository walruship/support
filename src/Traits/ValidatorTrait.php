<?php
/*
 * Walruship Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the 3-clause BSD license that is
 * available through the world-wide-web at this URL:
 * https://walruship.com/LICENSE.txt
 *
 * @author          Walruship Co., Ltd
 * @copyright       Copyright (c) 2023 Walruship
 * @link            https://walruship.com/LICENSE.txt
 */

namespace Walruship\Support\Traits;

use Walruship\Support\Validator;

trait ValidatorTrait
{
    /**
     * The Validator instance.
     *
     * @var \Walruship\Support\Validator
     */
    protected $validator;

    /**
     * Returns the Validator instance.
     *
     * @return \Walruship\Support\Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Sets the Validator instance.
     *
     * @param \Walruship\Support\Validator $validator
     *
     * @return $this
     */
    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;

        return $this;
    }
}
