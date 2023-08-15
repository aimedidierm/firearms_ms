<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueEmailAcrossTables implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = DB::table('users')->where('email', $value)->count();
        $count += DB::table('admins')->where('email', $value)->count();
        $count += DB::table('applicants')->where('email', $value)->count();
        $count += DB::table('directors')->where('email', $value)->count();
        $count += DB::table('registers')->where('email', $value)->count();
        $count += DB::table('psychiatrics')->where('email', $value)->count();

        if ($count > 0) {
            $fail("The $attribute has already been taken.");
        }
    }
}
