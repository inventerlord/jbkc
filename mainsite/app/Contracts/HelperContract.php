<?php

namespace App\Contracts;

class HelperContract
{
    public static function setEnv($key, $value)
    {
        $path = base_path('.env');

        if (preg_match('/\s/', $value)) {
            $value = "\"$value\"";
        }

        if (is_bool(env($key))) {
            $old = env($key) ? 'true' : 'false';
        } elseif (env($key) === null) {
            $old = 'null';
        } else {
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=" . $old,
                "$key=" . $value,
                file_get_contents($path)
            ));
        }
    }
}
