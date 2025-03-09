<?php

namespace Blaspsoft\Blasp\Normalizers;

use Blaspsoft\Blasp\Abstracts\StringNormalizer;

class FrenchStringNormalizer extends StringNormalizer
{

    public function normalize(string $string): string
    {
        return $this->replaceSpecialChars($string);
    }

    /**
     * @param string $string
     * @return string
     */
    private function replaceSpecialChars(string $string): string
    {
        $substitution = config('blasp.substitutions');
        foreach ($substitution as $replacementWithSlashes => $chars) {
            $replacement = trim($replacementWithSlashes, '/');
            $pattern = '/\b[' . implode('', array_map('preg_quote', $chars)) . ']\b/u';
            $string = preg_replace($pattern, $replacement, $string);
        }
        return $string;
    }
}