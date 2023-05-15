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

use Illuminate\Support\Arr;
use Illuminate\Validation\Factory;
use Walruship\Support\Contracts\ValidatorInterface;

abstract class Validator implements ValidatorInterface
{
    /**
     * The registered scenario.
     *
     * @var array
     */
    protected $scenario = [];

    /**
     * The registered bindings.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * The validation rules.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * The validation messages.
     *
     * @var array
     */
    protected $messages = [];

    /**
     * The validation customAttributes.
     *
     * @var array
     */
    protected $customAttributes = [];

    /**
     * Flag that indicates if we should bypass the validation.
     *
     * @var bool
     */
    protected $bypass = false;

    /**
     * The validator factory.
     *
     * @var \Illuminate\Validation\Factory
     */
    protected $factory;

    /**
     * Create a new Validator factory instance.
     *
     * @param \Illuminate\Validation\Factory $factory
     *
     * @return void
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @inheritdoc
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @inheritdoc
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @inheritdoc
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCustomAttributes()
    {
        return $this->customAttributes;
    }

    /**
     * @inheritdoc
     */
    public function setCustomAttributes($customAttributes)
    {
        $this->customAttributes = $customAttributes;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBindings()
    {
        return $this->bindings;
    }

    /**
     * @inheritdoc
     */
    public function on($scenario, $arguments = [])
    {
        return $this->onScenario($scenario, $arguments);
    }

    /**
     * @inheritdoc
     */
    public function onScenario($scenario, $arguments = [])
    {
        $method = 'on'.ucfirst($scenario);

        $this->scenario = [
            'on'        => method_exists($this, $method) ? $method : null,
            'arguments' => $arguments,
        ];

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function bind($bindings)
    {
        return $this->registerBindings($bindings);
    }

    /**
     * @inheritdoc
     */
    public function registerBindings($bindings)
    {
        $this->bindings = array_merge($this->bindings, $bindings);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function validate($data)
    {
        return $this->executeValidation($data);
    }

    /**
     * @inheritdoc
     */
    public function bypass($status = true)
    {
        $this->bypass = (bool) $status;

        return $this;
    }

    /**
     * Executes the data validation against the service rules.
     *
     * @param array $data
     *
     * @return \Illuminate\Support\MessageBag
     */
    protected function executeValidation($data)
    {
        if ($method = Arr::get($this->scenario, 'on')) {
            call_user_func_array([$this, $method], $this->scenario['arguments']);
        }

        $rules = $this->getBoundRules();

        $messages = $this->getMessages();

        $customAttributes = $this->getCustomAttributes();

        $validator = $this->factory->make($data, $rules, $messages, $customAttributes);

        return $validator->errors();
    }

    /**
     * Returns the rules already bound.
     *
     * @return array
     */
    protected function getBoundRules()
    {
        if ($this->bypass === true) {
            return [];
        }

        $rules = $this->getRules();

        foreach ($rules as $key => $value) {
            if ($binding = Arr::get($this->bindings, $key)) {
                $rules[$key] = str_replace('{'.$key.'}', $binding, $value);
            }
        }

        return $rules;
    }
}
