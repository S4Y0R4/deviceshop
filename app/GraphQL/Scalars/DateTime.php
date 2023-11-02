<?php declare(strict_types=1);

namespace App\GraphQL\Scalars;

use GraphQL\Language\AST\Node;
use GraphQL\Type\Definition\ScalarType;

/** Read more about scalars here: https://webonyx.github.io/graphql-php/type-definitions/scalars. */
final class DateTime extends ScalarType
{
    /** Serializes an internal value to include in a response. */
    public function serialize($value)
    {
        // Вы можете использовать Carbon или DateTime для работы с датой и временем
        return $value->format('Y-m-d H:i:s');  // или другой желаемый формат
    }
    

    /** Parses an externally provided value (query variable) to use as an input. */
    public function parseValue($value)
    {
        return new \DateTime($value); // или Carbon::parse($value) если вы используете Carbon
    }
    
    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * Should throw an exception with a client friendly message on invalid value nodes, @see \GraphQL\Error\ClientAware.
     *
     * @param  \GraphQL\Language\AST\ValueNode&\GraphQL\Language\AST\Node  $valueNode
     * @param  array<string, mixed>|null  $variables
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
        return new \DateTime($valueNode->value);
    }
    
}
