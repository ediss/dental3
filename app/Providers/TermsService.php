<?php

namespace App\Providers;

use App\Models\Term;


class TermsService
{

    public static function getTerms() {
        return Term::all();

    }
}
