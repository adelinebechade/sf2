<?php
namespace Proximit\Bundle\MediaBundle\Services;

class MediaService 
{
    protected $em;
    protected $template;
    
    public function __construct($em, $template)
    {
        $this->em = $em;
        $this->template = $template;
    }
    
    public function test()
    {
        return 'Le service est bien appelé';
    }

    public function listeDvd($id)
    {
        $rep = $this->em->getRepository('ProximitMediaBundle:Dvd');
        
        return $rep->getDvdByRea($id);
                
    }
} 
?>
