<?php
/**
 * Created by PhpStorm.
 * User: Delus
 * Date: 20/02/2023
 * Time: 11:00
 */

namespace app\models;

class InfoForm
{
    public static function begin()
    {
        echo sprintf('<div class="info">');
        return new InfoForm();
    }

    public static function end()
    {
        echo '</div>';
    }

    public function field()
    {
        return;
    }
}