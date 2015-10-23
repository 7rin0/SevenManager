<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Initializer;

    use Doctrine\Bundle\PHPCRBundle\Initializer\InitializerInterface;
    use PHPCR\Util\NodeHelper;
    use Doctrine\Bundle\PHPCRBundle\ManagerRegistry;
    use SevenManagerBundle\Document\Pages\Homepage;

    /**
     * Class SevenManagerBundleInitializer
     *
     * @package SevenManagerBundle\Initializer
     */
    class SevenManagerBundleInitializer implements InitializerInterface
    {
        private $basePath;

        /**
         * @param string $basePath
         */
        public function __construct($basePath = '/seven-manager')
        {
            $this->basePath = $basePath;
        }

        /**
         * @param ManagerRegistry $registry
         */
        public function init(ManagerRegistry $registry)
        {
            $documentManager = $registry->getManager();
            if ($documentManager->find(null, $this->basePath)) {
                return;
            }

            $homepage = new Homepage();
            $homepage->setName($this->basePath);
            $documentManager->persist($homepage);
            $documentManager->flush();

            $session = $registry->getConnection();

            // Create Fixtures
            NodeHelper::createPath($session, $this->basePath . '/fixtures/routes');

            $session->save();
        }

        /**
         * @return string
         */
        public function getName()
        {
            return 'Seven Manager Class Initializer';
        }
    }
