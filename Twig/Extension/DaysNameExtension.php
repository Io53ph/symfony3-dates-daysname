<?php

namespace Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Twig\Extension;

use Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Helper\DateHelper;

/**
 * The extension class.
 */
class DaysNameExtension extends \Twig_Extension
{
    private $dateHelper;

    /**
     * Constructor
     *
     * @param DateHelper $dateHelper dateHelper object
     */
    public function __construct(DateHelper $dateHelper)
    {
        $this->dateHelper = $dateHelper;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('days_name', array($this, 'daysName')),
        );
    }

    /**
     * Returns with the day's name
     *
     * @param \Datetime $date
     * @return string The day's name
     */
    public function daysName(\Datetime $date, $locale = null)
    {
        return $this->dateHelper->getDaysNameByDateAndLocale($date, $locale);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'axidepuydatesdaysnamebundle.daysname.twig_extension';
    }
}
