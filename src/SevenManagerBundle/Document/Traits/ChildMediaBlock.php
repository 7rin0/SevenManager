<?php
    /**
     * User: lseverino
     * Date: 15/10/15
     * Time: 16:39
     */

    namespace SevenManagerBundle\Document\Traits;

    use Sonata\BlockBundle\Model\BlockInterface;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ODM\PHPCR\ChildrenCollection;

    /**
     * Class ChildMediaBlock
     *
     * @package SevenManagerBundle\Document\Blocks
     */
    trait ChildMediaBlock
    {

        /**
         * @PHPCR\Children(cascade="all")
         */
        protected $children;

        /**
         * @param null $name
         */
        public function __construct($name = null)
        {
            $this->setName($name);
            $this->children = new ArrayCollection();
        }

        /**
         * Get children
         *
         * @return ArrayCollection|ChildrenCollection
         */
        public function getChildren()
        {
            return $this->children;
        }

        /**
         * Set children
         *
         * @param ChildrenCollection $children
         *
         * @return ChildrenCollection
         */
        public function setChildren(ChildrenCollection $children)
        {
            return $this->children = $children;
        }

        /**
         * Add a child to this container
         *
         * @param BlockInterface $child
         * @param string         $key the collection index name to use in the
         *                              child collection. if not set, the child
         *                              will simply be appended at the end.
         *
         * @return boolean Always true
         */
        public function addChild(BlockInterface $child, $key = null)
        {
            if ($key != null) {

                $this->children->set($key, $child);

                return true;
            }

            return $this->children->add($child);
        }

        /**
         * Alias to addChild to make the form layer happy.
         *
         * @param BlockInterface $children
         *
         * @return boolean
         */
        public function addChildren(BlockInterface $children)
        {
            return $this->addChild($children);
        }

        /**
         * Remove a child from this container.
         *
         * @param  BlockInterface $child
         *
         * @return $this
         */
        public function removeChild($child)
        {
            $this->children->removeElement($child);

            return $this;
        }

        /**
         * {@inheritdoc}
         */
        public function hasChildren()
        {
            return count($this->children) > 0;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return 'seven_manager.page.homepage';
        }

    }
