<?php
if (!function_exists('implode')) {
    /**
     * Join array elements with a string
     *
     * @param string $glue
     * @param array $pieces
     * @return string
     */
    function implode(string $glue, array $pieces): string
    {
        return \implode($glue, $pieces);
    }
}
