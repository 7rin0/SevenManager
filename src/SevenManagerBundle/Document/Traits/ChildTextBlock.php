<?php
    /**
     * User: lseverino
     * Date: 15/10/15
     * Time: 16:39
     */

    namespace SevenManagerBundle\Document\Traits;

    use Sonata\BlockBundle\Model\BlockInterface;
    use Doctrine\ODM\PHPCR\ChildrenCollection;

    /**
     * Class childTextBlock
     *
     * @package SevenManagerBundle\Document\Blocks
     */
    trait childTextBlock
    {

        /**
         * @PHPCR\Children(cascade="all")
         */
        protected $textChildren;

        /**
         * Get children
         *
         * @return ArrayCollection|ChildrenCollection
         */
        public function getTextChildren()
        {
            return $this->textChildren;
        }

        /**
         * Set children
         *
         * @param ChildrenCollection $textChildren
         *
         * @return ChildrenCollection
         */
        public function setTextChildren(ChildrenCollection $textChildren)
        {
            return $this->textChildren = $textChildren;
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

                $this->textChildren->set($key, $child);

                return true;
            }

            return $this->textChildren->add($child);
        }

        /**
         * Alias to addChild to make the form layer happy.
         *
         * @param BlockInterface $textChildren
         *
         * @return boolean
         */
        public function addTextChildren(BlockInterface $textChildren)
        {
            return $this->addChild($textChildren);
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
            $this->textChildren->removeElement($child);

            return $this;
        }

        /**
         * {@inheritdoc}
         */
        public function hasTextChildren()
        {
            return count($this->textChildren) > 0;
        }


    }