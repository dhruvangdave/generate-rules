<?php

namespace Dhruvang\GenerateRules;

class GenerateRules
{
    use AuthorizesRequests;

    /**
     * Get the default JavaScript variables for Telescope.
     *
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'path' => 'generate-rules',
            'timezone' => config('app.timezone'),
        ];
    }
}
