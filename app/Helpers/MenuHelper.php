<?php

namespace App\Helpers;

use App\Helpers\ThemeUI;

class MenuHelper
{
    public static function current()
    {
        return ThemeUI::findMenuByRoute(
            request()->route()?->getName()
        );
    }

    public static function meta()
    {
        return ThemeUI::getMetaFromRoute(
            request()->route()?->getName()
        );
    }
}
