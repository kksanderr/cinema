<?php

class Validate
{
    private $passed = false,
            $errors = [],
            $db = null;


    public function __construct() {
        $this->db = Database::connect();
    }

    public function check($source, $items = []) {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $ruleValue) {
                $value = trim($source[$item]);
                
                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                }
                else if ($rule === 'email' && !strpos($value, '@')) {
                    $this->addError("{$item} is not a valid.");
                }
                else if (!empty($value)) {
                    switch($rule) {
                        case 'min':
                            if (strlen($value) < $ruleValue) {
                                $this->addError("{$item} must be a minimum of {$ruleValue} characters");
                            }
                        break;

                        case 'max':
                            if (strlen($value) > $ruleValue) {
                                $this->addError("{$item} must be a maximum of {$ruleValue} characters");
                            }
                        break;

                        case 'matches':
                            if ($value != $source[$ruleValue]) {
                                $this->addError("{$ruleValue} must match {$item}");
                            }
                        break;

                        case 'unique':
                            $check = $this->db->find($ruleValue, $item, $value);

                            if ($check->count()) {
                                $this->addError("{$item} already exists");
                            }
                        break;
                       
                    }
                }
            }
        }

        if (empty($this->errors)) {
            $this->passed = true;
        }

        return $this;
    }

    private function addError($error) {
        $this->errors[] = $error;
    }

    public function errors() {
        return $this->errors;
    }

    public function passed() {
        return $this->passed;
    }
}
