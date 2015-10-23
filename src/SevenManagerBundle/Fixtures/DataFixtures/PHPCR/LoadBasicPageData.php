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
    use SevenManagerBundle\Fixtures\Document\SimplePage;

    /**
     * Class LoadPageData
     *
     * @package SevenManagerBundle\DataFixtures\PHPCR
     */
    class LoadBasicPageData implements FixtureInterface, OrderedFixtureInterface
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

            // Parent Document
            $simpleCmsRoot = $documentManager->find(null, '/seven-manager/fixtures/pages');

            // Child Document - create a new Page object
            $simplePage = new SimplePage();
            $simplePage->setName('simple-fixtures'); // the name of the node
            $simplePage->setLabel('Seven Manager Page - Loaded by fixtures');
            $simplePage->setTitle('Seven Manager Page - Loaded by fixtures');
            $simplePage->setContent('I have added this page myself!');

            // Mapping Parent and Child Documents - get root document (/cms/pages)
            $simplePage->setParentDocument($simpleCmsRoot); // set the parent to the root

            // Persist and flush
            $documentManager->persist($simplePage); // add the Page in the queue
            $documentManager->flush(); // add the Page to PHPCR
        }
    }