<?php
namespace App\Core;

class Form
{
    /* form code */
    private $formCode = "";

    /**
     * form create
     * @return string
     */
    public function create(): string
    {
        return $this->formCode;
    }

    /**
     * form validate
     * @param array|null $form
     * @param array|null $fields
     * @return boolean
     */
    public static function validate(array $form = null, array $fields = null): bool
    {
        self::checkerArray($form, $fields);

        foreach ($fields as $field)
        {
            if (!isset($form[$field]) || empty($form[$field]))
            {
                return false;
            }
        }
        return true;
    }

    /**
     * form validate email
     * @param array $form
     * @param array $emails
     * @return boolean
     */
    public static function validateEmail(array $form = null, array $emails = null): bool
    {
        self::checkerArray($form, $emails);

        foreach ($emails as $email)
        {
            if (!filter_var($form[$email], FILTER_VALIDATE_EMAIL))
            {
                return false;
            }
        }
        return true;
    }

    /**
     * validate password
     * @param array $form
     * @param array $passwords
     * @return boolean
     */
    public static function validatePassword(array $form, array $passwords): bool
    {
        self::checkerArray($form, $passwords);

        foreach ($passwords as $password)
        {
            // at least 5 characters, at least 1 numeric character, at least 1 lowercase letter,
            // at least 1 uppercase letter, at least 1 special character.
            $passwordPattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?([^\w\s]|[_])).{5,}$/";
            if (!preg_match($passwordPattern, $form[$password]))
            {
                return false;
            }
        }
        return true;
    }

    public function startForm(string $method = 'post', string $action = '#', array $attributes = []): self
    {
        $this->formCode .= "<form action='$action' method='$method'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes).'>' : '>';
        return $this;
    }

    public function endForm(): self
    {
        $this->formCode .= '</form>';
        return $this;
    }

    public function startDiv(array $attributes = []): self
    {
        $this->formCode .= '<div';
        $this->formCode .= $attributes ? $this->addAttributes($attributes).'>' : '>';
        return $this;
    }

    public function endDiv(): self
    {
        $this->formCode .= '</div>';
        return $this;
    }

    public function addInput(string $type, string $name, array $attributes = []): self
    {
        $this->formCode .= "<input type='$type' name='$name'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes).'>' : '>';
        return $this;
    }

    public function addLabelFor(string $for, string $text, array $attributes = []): self
    {
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
        $this->formCode .= ">$text</label>";
        return $this;
    }

    public function addTextarea(string $name, string $value = '', array $attributes = []): self
    {
        $this->formCode .= "<textarea name='$name'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
        $this->formCode .= ">$value</textarea>";
        return $this;
    }

    public function addSelect(string $name, array $options, array $attributes = []):self
    {
        $this->formCode .= "<select name='$name'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes).'>' : '>';

        foreach ($options as $value => $text)
        {
            $this->formCode .= "<option value=\"$value\">$text</option>";
        }

        $this->formCode .= '</select>';
        return $this;
    }

    public function addButton(string $text, array $attributes = []): self
    {
        $this->formCode .= '<button ';
        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
        $this->formCode .= ">$text</button>";
        return $this;
    }

    private function addAttributes(array $attributes): string
    {
        $string = '';
        $shorts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        foreach ($attributes as $attribute => $value)
        {
            if (in_array($attribute, $shorts) && $value == true)
            {
                $string .= " $attribute";
            }
            
            else
            {
                $string .= " $attribute=\"$value\"";
            }
        }
        return $string;
    }

    /**
     * checker array
     * @param $form
     * @param $fields
     * @return boolean
     */
    private static function checkerArray($form, $fields): bool
    {
        if (!is_array($form) || !is_array($fields)) { return false; }
        return true;
    }
}