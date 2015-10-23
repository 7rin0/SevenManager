<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 22/10/15
 * Time: 11:11
 */

namespace SevenManagerBundle\Manager;

use Doctrine\ODM\PHPCR\DocumentManager;

/**
 * Class StationManager
 * @package SevenManagerBundle\Manager
 */
class StationManager extends DocumentManager
{

    protected $documentManager;

    public function __construct()
    {
        global $kernel;
        $this->documentManager = $kernel->getContainer()->get( 'doctrine_phpcr' )->getManager();
    }

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function getOneDocumentBy(array $options)
    {

        // Default options
        $options['dump']     = empty($options['dump']) ? false : $options['dump'];
        $options['property'] = empty($options['property']) ? 'name' : $options['property'];

        // Get Document Repository
        $getRepository = $this->documentManager->getRepository('SevenManagerBundle:' . $options['document']);

        // Example array('id' => '/seven-manager/homepage/index')
        $getDocument = $getRepository->findOneBy(array($options['property'] => $options['value']));

        // Dump if true
        if ($options['dump'] === true) {
            dump($getDocument);
        }

        return $getDocument;
    }

    /**
     * @param $class
     *
     * @return array
     */
    public function getClassName($class)
    {
        $className = explode('\\', get_class($class));

        return end($className);
    }

}