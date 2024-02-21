<?php

namespace App\Enums\Products;

enum Status : string{

    case available = 'available';
    case unavailable = 'unavailable';

    public function text()
    {
        return match($this){
            self::available => 'Активно',
            self::unavailable => 'Не активно'
        };
    }

    public static function select(): array
    {
        return [
            'available' => 'Активно',
            'unavailable' => 'Не активно'
        ];
    }
}
