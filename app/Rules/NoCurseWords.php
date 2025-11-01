<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoCurseWords implements Rule
{
protected array $badWords = [];

public function __construct()
{
//Load the list of curse words (currently empty)
$this->badWords = file(storage_path('app/bad_words.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

public function passes($attribute, $value)
{
foreach ($this->badWords as $word) {
if (stripos($value, $word) !== false) {
return false;
}
}
return true;
}

public function message()
{
return 'The :attribute contains inappropriate language.';
}
}
