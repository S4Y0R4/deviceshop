<?php
namespace App\GraphQL\Queries;

use App\Models\Brand;

class BrandResolver
{
    public function resolveProductsField($root, array $args)
    {
        return $root->products;
    }
}
