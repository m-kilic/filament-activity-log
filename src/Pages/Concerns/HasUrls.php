<?php

namespace Noxo\FilamentActivityLog\Pages\Concerns;

use Illuminate\Database\Eloquent\Model;

trait UrlHandling
{
    /**
     * Get the URL for the "causer" model.
     *
     * @param Model $causer
     * @return string
     */
    public function getCauserUrl(Model $causer)
    {
        return parent::getUrl([
            'causer' => get_class($causer) . ':' . $causer->id,
        ]);
    }

    /**
     * Get the URL for the "subject" model.
     *
     * @param Model $subject
     * @return string
     */
    public function getSubjectUrl(Model $subject)
    {
        return parent::getUrl([
            'subject_type' => get_class($subject),
            'subject_id' => $subject->id,
        ]);
    }
}
