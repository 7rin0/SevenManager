<?php
    /**
     * User: lseverino
     * Date: 12/10/15
     * Time: 22:54
     */

    namespace SevenManagerBundle\Fixtures\DataFixtures\PHPCR;

    use Doctrine\ODM\PHPCR\DocumentManager;
    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use SevenManagerBundle\Fixtures\Document\SimplePage;
    use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;
    use PHPCR\Util\NodeHelper;

    /**
     * Class LoadDefaultRoutingData
     *
     * @package SevenManagerBundle\DataFixtures\PHPCR
     */
    class LoadDefaultRoutingData implements FixtureInterface
    {
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
            NodeHelper::createPath($session, '/seven-manager/fixtures/routes');

            $route = new Route();
            $route->setParentDocument($documentManager->find(null, '/seven-manager/fixtures/routes'));
            $route->setName('my-route');

            // link a content to the route
            $content = new SimplePage();
            $content->setParentDocument($documentManager->find(null, '/seven-manager/fixtures/pages'));
            $content->setName('simple-page-loaded');
            $content->setTitle('My Content');
            $content->setContent('Some Content');
            $route->setContent($content);

            $documentManager->persist($content);
            $documentManager->persist($route);

            $documentManager->flush();
        }
    }