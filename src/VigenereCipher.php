<?php

namespace Vigenere;

class VigenereCipher
{

    /**
     * Characters from key parsed to raw ascii codes
     */
    private array $keyValues;

    /**
     * Set of accepted characters to be encrypted
     */
    private array $alphabet;

    /**
     * Transformation to apply to text before encryption
     */
    private $transform;

    public function __construct(string $key, string $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', callable $transform = null)
    {
        $this->alphabet = str_split($alphabet);
        $this->transform = $transform ?? fn ($v) => $v;
        $this->keyValues = $this->buildRawCodesArray($key);
    }

    /**
     * Encrypt the given text using the defined key
     */
    public function encrypt(string $originalText)
    {
        $textValues = $this->buildRawCodesArray($originalText); // Characters from text parsed to raw ascii codes

        $encrypted = ''; // Resulting encrypted value

        foreach ($textValues as $val) {
            $encrypted .= match (gettype($val)) {
                'string' => $val, // If should not be encrypted (not in the alphabet)
                'integer' => chr(($this->buildRawEncryptedCode($val, $this->keyValues, strlen($encrypted)) % $this->getAlphabetLength()) + $this->getFirstCode()), // Encrypt value
            };
        }

        return $encrypted;
    }

    /**
     * Build array of text parsed to raw ascii codes  
     * 
     * If any of the values is not in the alphabet, no transformation applied
     */
    protected function buildRawCodesArray(string $text)
    {
        $text = ($this->transform)($text);

        return array_map(fn ($c) => in_array($c, $this->alphabet) ? (ord($c) - $this->getFirstCode()) : $c, str_split($text));
    }

    /**
     * Generate a raw encrypted code from the given ascii code, keys and count  
     * 
     * The raw code means it is with the codes beginning from zero
     */
    private function buildRawEncryptedCode(int $code, array $keys, int $count)
    {
        return $code + $keys[$count % count($keys)];
    }

    /**
     * Calculate the length from the defined alphabet
     */
    private function getAlphabetLength()
    {
        return count($this->alphabet);
    }

    /**
     * Get the ascii code from the first alphabet
     */
    protected function getFirstCode()
    {
        return ord($this->alphabet[0]);
    }
}
