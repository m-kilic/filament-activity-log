<?php

namespace Noxo\FilamentActivityLog\Services;

use Illuminate\Database\Eloquent\Model;
use Noxo\FilamentActivityLog\Loggers\Logger;
use Noxo\FilamentActivityLog\Loggers\Loggers;
use UnitEnum;

final class Helper
{
    public static function resolveEnum(string $enum, ?string $name): ?UnitEnum
    {
        foreach ($enum::cases() as $unit) {
            if (strtolower($name) === strtolower($unit->name)) {
                return $unit;
            }
        }

        return null;
    }

    /**
     * @return class-string<Logger>
     */
    public static function resolveLogger(string | Model $record, bool $force = false): ?string
    {
        $name = is_string($record) ? $record : get_class($record);

        return Loggers::getLoggerByModel($name, $force);
    }
}
