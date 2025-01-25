<?php

namespace App\Support\Serializers;

use App\Entities\Customer;
use App\Models\Customer as CustomerModel;

class CustomerSerializer
{
    public static function parse(Customer $customer): array
    {
        return [
            CustomerModel::ID => $customer->getIdentifier(),
            CustomerModel::NAME => $customer->getName(),
            CustomerModel::BIRTH_DATE => $customer->getBirthDate(),
            CustomerModel::RG => $customer->getRG(),
            CustomerModel::CPF => $customer->getCPF(),
            CustomerModel::PHONE => $customer->getPhone(),
        ];
    }
}
