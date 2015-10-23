<?php
    /**
     * User: lseverino
     * Date: 10/10/15
     * Time: 16:53
     */

    namespace SevenManagerBundle\Fixtures\DataFixtures\PHPCR;

    use Doctrine\Common\Persistence\ObjectManager;
    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\ODM\PHPCR\DocumentManager;
    use PHPCR\Util\NodeHelper;
    use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;

    /**
     * Class LoadPageData
     *
     * @package SevenManagerBundle\DataFixtures\PHPCR
     */
    class LoadRoutingData implements FixtureInterface, OrderedFixtureInterface
    {

        /**
         * @return int
         */
        public function getOrder()
        {
            return 20;
        }

        /**
         * @param ObjectManager $documentManager
         */
        public function load(ObjectManager $documentManager)
        {
            if (!$documentManager instanceof DocumentManager) {
                $class = get_class($documentManager);
                throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
            }

            $session = $documentManager->getPhpcrSession();
            NodeHelper::createPath($session, '/seven-manager/fixtures/create/routes');
            $routesRoot = $documentManager->find(null, '/seven-manager/fixtures/create/routes');

            $route = new Route();
            // set $routesRoot as the parent and 'new-route' as the node name,
            // this is equal to:
            // $route->setName('new-route');
            // $route->setParentDocument($routesRoot);
            $route->setPosition($routesRoot, 'new-route');

            $page = $documentManager->find(null, '/seven-manager/fixtures/new-page');
            $route->setContent($page);

            $documentManager->persist($route); // put $route in the queue
            $documentManager->flush(); // save it
        }
    }