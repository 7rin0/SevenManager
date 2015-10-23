<?php
    /**
     * User: lseverino
     * Date: 11/10/15
     * Time: 23:16
     */

    namespace SevenManagerBundle\Fixtures\DataFixtures\PHPCR;

    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use Doctrine\ODM\PHPCR\DocumentManager;
    use PHPCR\Util\NodeHelper;
    use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;

    /**
     * Class LoadCmsData
     *
     * @package SevenManagerBundle\DataFixtures\PHPCR
     */
    class LoadCmsData implements FixtureInterface
    {

        /**
         * @param ObjectManager $objectManager
         */
        public function load(ObjectManager $objectManager)
        {
            if (!$objectManager instanceof DocumentManager) {
                $class = get_class($objectManager);
                throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
            }

            $session = $objectManager->getPhpcrSession();
            NodeHelper::createPath($session, '/seven-manager/fixtures/simple');
            $parent = $objectManager->find(null, '/seven-manager/fixtures/simple');

            $pageOne = new Page();
            $pageOne->setTitle('Seven Manager - Page one');
            $pageOne->setLabel('Seven Manager - Page one');
            $pageOne->setBody('Another example of creating a new page, by Symfony CMF');
            $pageOne->setPosition($parent, 'page-one');
            $objectManager->persist($pageOne);

            $pageTwo = new Page();
            $pageTwo->setTitle('Seven Manager - Page two');
            $pageTwo->setLabel('Seven Manager - Page two');
            $pageTwo->setBody('Another example of creating a new page, by Symfony CMF');
            $pageTwo->setPosition($parent, 'page-two');
            $objectManager->persist($pageTwo);

            $pageThree = new Page();
            $pageThree->setTitle('Seven Manager - Page three');
            $pageThree->setLabel('Seven Manager - Page three');
            $pageThree->setBody('Another example of creating a new page, by Symfony CMF');
            $pageThree->setPosition($parent, 'page-three');
            $objectManager->persist($pageThree);

            $objectManager->flush();
        }

    }