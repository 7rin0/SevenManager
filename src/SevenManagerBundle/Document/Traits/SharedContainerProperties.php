<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 12:33
     */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class SharedContainerProperties
     *
     * @package SevenManagerBundle\Document\Traits
     */
    trait SharedContainerProperties
    {
        /**
         * @PHPCR\Referrers(
         *     referringDocument="Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route",
         *     referencedBy="content"
         * )
         */
        protected $routes;

        /**
         * @PHPCR\Id()
         */
        protected $id;

        /**
         * @PHPCR\ParentDocument()
         */
        protected $parentDocument;

        /**
         * @PHPCR\String()
         */
        protected $title;

        /**
         * @PHPCR\String()
         */
        protected $name;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $content;

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param $title
         *
         * @return $this
         */
        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param $name
         *
         * @return $this
         */
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param $content
         *
         * @return $this
         */
        public function setContent($content)
        {
            $this->content = $content;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param $id
         *
         * @return $this
         */
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getRoutes()
        {
            return $this->routes;
        }

        /**
         * @param $routes
         *
         * @return $this
         */
        public function setRoutes($routes)
        {
            $this->routes = $routes;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getParentDocument()
        {
            return $this->parentDocument;
        }

        /**
         * @param mixed $parentDocument
         *
         * @return SharedParentProperties
         */
        public function setParentDocument($parentDocument)
        {
            $this->parentDocument = $parentDocument;

            return $this;
        }

        /**
         * @return mixed
         */
        public function __toString()
        {
            return $this->getTitle();
        }

    }
