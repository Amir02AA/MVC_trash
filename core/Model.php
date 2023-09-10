<?php

namespace core;

abstract class Model
{
    const Required_Rule = 'required';
    const Min_Rule = 'min';
    const Max_Rule = 'max';
    const Match_Rule = 'match';

    public function loadData(array $data)
    {
        foreach ($data as $property => $value) {
            if (property_exists($this,$property)){
                $this->{$property} = $value;
            }
        }
    }
    public function validate()
    {
        $errors = [];
        foreach ($this->rules() as $attribute => $rules) {

            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::Required_Rule && !$value) {
                    $errors[$attribute][] = 'Can not be empty';
                }
                if ($ruleName == self::Min_Rule && strlen($value) < $rule['min']) {
                    $errors[$attribute][] = 'minimum length exceeded';
                }
                if ($ruleName == self::Max_Rule && strlen($value) > $rule['max']) {
                    $errors[$attribute][] = 'maximum length exceeded';
                }

                if ($ruleName == self::Match_Rule && $value == $this->{$rule['match']}) {

                }
            }

        }
        return (empty($errors)) ? false : $errors;
    }

    abstract public function rules();
}