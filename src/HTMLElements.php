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
    
    public static function a($attributes = '', $content = '')
    {
        $defaults = array('name' => ((!is_array($attributes)) ? $attributes : ''), 'href' => '#');
        if (is_array($attributes) AND isset($attributes['content'])) {
            $content = $attributes['content'];
            unset($attributes['content']); // content is not an attribute
        }
        return "<a " . self::arrayToAttributes(array_merge($defaults, $attributes)) . ">" . $content . "</a>";
    }

    public static function span($attributes = '', $content = '')
    {
        if (is_array($attributes) AND isset($attributes['content'])) {
            $content = $attributes['content'];
            unset($attributes['content']); // content is not an attribute
        }
        return "<span " . self::arrayToAttributes($attributes) . ">" . $content . "</span>";
    }
}
