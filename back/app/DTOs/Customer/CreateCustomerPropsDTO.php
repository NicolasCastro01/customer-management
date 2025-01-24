<?php

namespace App\DTOs\Customer;

class CreateCustomerPropsDTO
{
    public function __construct(
        public string $name,
        public string $birth_date,
        public string $phone,
        public string $rg,
        public string $cpf
    ) {}
}
