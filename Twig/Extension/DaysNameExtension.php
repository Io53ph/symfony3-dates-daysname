<?php

namespace Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Twig\Extension;

use Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Helper\DateHelper;

/**
 * The extension class.
 */
class DaysNameExtension extends \Twig_Extension
{
    private $helper;

    /**
     * Constructor
     *
     * @param dateHelper        $dateHelper dateHelper object
     */
    public function __construct(DateHelper $dateHelper)
    {
        $this->helper = $dateHelper;
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
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                    'days_name',
                    array($this, 'daysName'),
                    array('is_safe' => array('html'))
                ),
        );
    }

    /**
     * Returns with the day's name
     *
     * @param \Datetime $date   THe date we extract
     * @param var $locale       Desired locale
     * @return string           The day's name
     */
    public function daysName(\Datetime $date, $locale = null)
    {
        return $this->helper->getDaysNameByDateAndLocale($date, $locale);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string           The extension name
     */
    public function getName()
    {
        return 'axidepuydatesdaysnamebundle.daysname.twig_extension';
    }
}
