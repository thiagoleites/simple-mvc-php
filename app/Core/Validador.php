<?php

namespace App\Core;

class Validator
{
    protected array $data = [];
    protected array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function make(array $data): self
    {
        return new self($data);
    }

    public function required(string $field, string $message = null): self
    {
        if (empty(trim($this->data[$field] ?? ''))) {
            $this->errors[$field] = $message ?? "O campo {$field} é obrigatório.";
        }

        return $this;
    }

    public function email(string $field, string $message = null): self
    {
        $value = $this->data[$field] ?? '';

        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message ?? "Informe um e-mail válido.";
        }

        return $this;
    }

    public function min(string $field, int $min, string $message = null): self
    {
        $value = $this->data[$field] ?? '';

        if (!empty($value) && mb_strlen($value) < $min) {
            $this->errors[$field] = $message ?? "O campo {$field} precisa ter pelo menos {$min} caracteres.";
        }

        return $this;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}