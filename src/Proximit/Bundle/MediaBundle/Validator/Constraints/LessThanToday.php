<?php
namespace Proximit\Bundle\MediaBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class LessThanToday extends Constraint
{
    public $message = 'La date "%datetime%" doit être inférieure à la date du jour.';
}
?>
