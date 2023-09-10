<?php


include_once "../vendor/autoload.php";

class Validate
{
    const Required_Rule = 'required';
    const Min_Rule = 'min';
    const Max_Rule = 'max';

    private $username = 'user 2';
    private $password = 'asdfsdafdfad';
    private $email = 'email@emadfsd';
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
            }

        }
        return (empty($errors)) ? false : $errors;
    }

    public function rules()
    {
        return [
            'username' => [self::Required_Rule],
            'password' => [self::Required_Rule, [self::Min_Rule, 'min' => 5]],
            'email' => [self::Required_Rule, [self::Min_Rule, 'min' => 5], [self::Max_Rule, 'max' => 20]]
        ];
    }
}

$errors = (new Validate())->validate();


