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
    use SevenManagerBundle\Fixtures\Document\SimplePost;

    /**
     * Class LoadPostData
     *
     * @package SevenManagerBundle\PostsBundle\DataFixtures\PHPCR
     */
    class LoadSimplePostData implements FixtureInterface, OrderedFixtureInterface
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
            $simpleCmsRoot = $documentManager->find(null, '/seven-manager/fixtures/posts');

            // Child Document - create a new Post object
            $simplePost = new SimplePost();
            $simplePost->setTitle('Seven Manager Post - Loaded by fixtures');
            $simplePost->setContent('I have added this Post myself!');

            // Mapping Parent and Child Documents - get root document (/cms/Posts)
            $simplePost->setParentDocument($simpleCmsRoot); // set the parent to the root

            // Persist and flush
            $documentManager->persist($simplePost); // add the Post in the queue
            $documentManager->flush(); // add the Post to PHPCR
        }
    }