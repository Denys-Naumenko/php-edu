<?php

namespace App;

class Validator
{
    protected $data;
    protected $rules;
    protected $errors = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
        $this->validate();
    }

    protected function validate()
    {
        foreach ($this->rules as $field => $rule) {
            $rules = explode('|', $rule);
            foreach ($rules as $rule) {
                $this->applyRule($field, $rule);
            }
        }
    }

    protected function applyRule($field, $rule)
    {
        if ($rule === 'required' && empty($this->data[$field])) {
            $this->errors[$field][] = 'Поле є обов\'язковим';
        }
        if ($rule === 'numeric' && !is_numeric($this->data[$field])) {
            $this->errors[$field][] = 'Поле повинно бути числом';
        }
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
