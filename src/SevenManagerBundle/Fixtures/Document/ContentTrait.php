<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Fixtures\Document;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    trait ContentTrait
    {
        /**
         * @PHPCR\Id()
         */
        protected $id;

        /**
         * @PHPCR\ParentDocument()
         */
        protected $parent;

        /**
         * @PHPCR\Nodename()
         */
        protected $title;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $content;

        protected $routes;

        public function getId()
        {
            return $this->id;
        }

        public function getParentDocument()
        {
            return $this->parent;
        }

        public function setParentDocument($parent)
        {
            $this->parent = $parent;

            return $this;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function setContent($content)
        {
            $this->content = $content;

            return $this;
        }

        public function getRoutes()
        {
            return $this->routes;
        }
    }