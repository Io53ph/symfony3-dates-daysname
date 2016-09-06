<?php
namespace Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Twig\Extension;

/**
 * The extension class.
 */
class DaysNameExtension extends \Twig_Extension
{
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
    public function daysName(\Datetime $date)
    {
        $days = array(1 => "Hétfő", 2 => "Kedd", 3 => "Szerda", 4 => "Csütörtök", 5 => "Péntek", 6 => "Szombat", 7 => "Vasárnap");

        return $days[$date->format("N")];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'axidepuy_daysname_extension';
    }
}
