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
 * @link            https://walruship.com
 */

namespace Walruship\Support\Contracts;

use Walruship\Support\Validator;

interface ValidatorInterface
{
    /**
     * Returns the validation rules.
     *
     * @return array
     */
    public function getRules();

    /**
     * Sets the validation rules.
     *
     * @param array $rules
     *
     * @return $this
     */
    public function setRules($rules);

    /**
     * Returns the validation messages.
     *
     * @return array
     */
    public function getMessages();

    /**
     * Sets the validation messages.
     *
     * @param array $messages
     *
     * @return $this
     */
    public function setMessages($messages);

    /**
     * Returns the validation custom attributes.
     *
     * @return array
     */
    public function getCustomAttributes();

    /**
     * Sets the validation custom attributes.
     *
     * @param array $customAttributes
     *
     * @return $this
     */
    public function setCustomAttributes($customAttributes);

    /**
     * Returns the validation bindings.
     *
     * @return array
     */
    public function getBindings();

    /**
     * Create a scope scenario.
     *
     * @param string $scenario
     * @param array  $arguments
     *
     * @return Validator
     */
    public function on($scenario, $arguments = []);

    /**
     * Create a scope scenario.
     *
     * @param string $scenario
     * @param array  $arguments
     *
     * @return $this
     */
    public function onScenario($scenario, $arguments = []);

    /**
     * Register bindings to the scenario.
     *
     * @param array $bindings
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function bind($bindings);

    /**
     * Register the bindings.
     *
     * @param array $bindings
     *
     * @return $this
     */
    public function registerBindings($bindings);

    /**
     * Execute validation service.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate($data);

    /**
     * Sets if we should bypass the validation or not.
     *
     * @param bool $status
     *
     * @return $this
     */
    public function byPass($status = true);
}
