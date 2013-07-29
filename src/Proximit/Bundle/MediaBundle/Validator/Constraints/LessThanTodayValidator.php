<?php
namespace Proximit\Bundle\MediaBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class LessThanTodayValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ($value->format('Y-m-d H:i:s') > date('Y-m-d H:i:s')) {
            $this->context->addViolation($constraint->message, array('%datetime%' => $value->format('d-m-Y')));
        }
        /*if (null === $value) {
            return;
        }
 
        if (!($value instanceof \DateTime)) {
            $this->context->addViolation($constraint->invalidMessage, array(
                '{{ value }}' => $value->format('d-m-Y'),
            ));
 
            return;
        }
 
        if (null !== $constraint->max && $value > $constraint->max) {
            $this->context->addViolation($constraint->maxMessage, array(
                '{{ value }}' => $value->format('d-m-Y'),
                '{{ limit }}' => $this->formatDate($constraint->max),
            ));
        }
 
        if (null !== $constraint->min && $value < $constraint->min) {
            $this->context->addViolation($constraint->minMessage, array(
                '{{ value }}' => $value->format('d-m-Y'),
                '{{ limit }}' => $this->formatDate($constraint->min),
            ));
        }
    }
 
    protected function formatDate($date)
    {
        $formatter = new \IntlDateFormatter(
            'fr_FR',
            \IntlDateFormatter::SHORT,
            \IntlDateFormatter::NONE,
            date_default_timezone_get(),
            \IntlDateFormatter::GREGORIAN
        );
 
        return $this->processDate($formatter, $date);
    }
 
    /**
     * @param  \IntlDateFormatter $formatter
     * @param  \Datetime          $date
     * @return string
     */
    /*protected function processDate(\IntlDateFormatter $formatter, \Datetime $date)
    {
        //var_dump($formatter, $date, $formatter->format((int) $date->format('U'))); exit;
        return $formatter->format((int) $date->format('U'));
        //return $date;
    }*/
    }
}
?>
