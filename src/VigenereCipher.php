<?php

namespace Vigenere;

class VigenereCipher
{
    private array $alphabet;
    private $transform;

    public function __construct(string $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', callable $transform = null)
    {
        $this->alphabet = str_split($alphabet);
        $this->transform = $transform ?? fn ($v) => $v;
    }

    public function encrypt(string $originalText, string $key)
    {
        $keyValues = $this->buildRawCodesArray($key);
        $textValues = $this->buildRawCodesArray($originalText);

        $encrypted = '';

        foreach ($textValues as $val) {
            $encrypted .= chr(($this->buildRawEncryptedCode($val, $keyValues, strlen($encrypted)) % $this->getAlphabetLength()) + $this->getFirstCode());
        }

        return $encrypted;
    }

    protected function buildRawCodesArray(string $text)
    {
        $text = ($this->transform)($text);

        $filteredArray = array_filter(str_split($text), fn ($c) => in_array($c, $this->alphabet));

        return array_map(fn ($c) => ord($c) - $this->getFirstCode(), $filteredArray);
    }

    private function buildRawEncryptedCode(int $code, array $keys, int $count)
    {
        return $code + $keys[$count % count($keys)];
    }

    private function getAlphabetLength()
    {
        return count($this->alphabet);
    }

    protected function getFirstCode()
    {
        return ord($this->alphabet[0]);
    }
}
