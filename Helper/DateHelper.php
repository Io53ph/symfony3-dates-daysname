<?php

namespace Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Helper;

use Symfony\Component\Translation\TranslatorInterface;

class DateHelper
{
    private $translator;

    /**
     * Constructor
     *
     * @param TranslatorInterface $translator translator object
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Alias for getDaysNameByDateAndLocale without setting the locale
     *
     * @param \Datetime $date   Date we working with
     * @return string           The day's name
     */
    public function getDaysNameByDate(\Datetime $date)
    {
        return $this->getDaysNameByDateAndLocale($date);
    }

    /**
     * Returns with the day's name
     *
     * @param \Datetime $date   Date we working with
     * @param string $locale    The selected locale
     * @return string           The day's name
     */
    public function getDaysNameByDateAndLocale(\Datetime $date, $locale = null)
    {
        $dayNumber = $date->format('N');
        $id = "day." . $dayNumber;

        return $this->translator->transChoice($id, null, array(), 'names', $locale);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string           The extension name
     */
    public function getName()
    {
        return 'axidepuydatesdaysnamebundle.daysname.date_helper';
    }
}
