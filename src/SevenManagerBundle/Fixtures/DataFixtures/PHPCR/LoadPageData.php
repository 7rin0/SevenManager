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
    use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;

    /**
     * Class LoadPageData
     *
     * @package SevenManagerBundle\DataFixtures\PHPCR
     */
    class LoadPageData implements FixtureInterface, OrderedFixtureInterface
    {

        /**
         * @return int
         */
        public function getOrder()
        {
            return 10;
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

            $page = new Page(); // create a new Page object (document)
            $page->setName('new-page'); // the name of the node
            $page->setLabel('Fixture loaded by PHP');
            $page->setTitle('Fixture loaded by PHP');
            $page->setBody('I have added this page myself!');

            $simpleCmsRoot = $documentManager->find(null, '/seven-manager/fixtures');
            $page->setParentDocument($simpleCmsRoot); // set the parent to the root
            $documentManager->persist($page); // add the Page in the queue
            $documentManager->flush(); // add the Page to PHPCR
        }
    }