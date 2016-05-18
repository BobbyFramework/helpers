<?php

namespace BobbyFramework\Helpers;

class HTMLElements {

    public static function arrayToAttributes(array $attributes)
    {
        //Build a list of single attributes first
        $attributeList = [];
        foreach ($attributes as $key => $value) {
            // If the value is not false add the attribute. This allows attributes to not be shown.
            if ($value !== false) {
                if (is_string($key)) {
                    $attributeList[] = htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
                } else {
                    $attributeList[] = $value;
                }
            }
        }
        return implode(' ', $attributeList);
    }
}
