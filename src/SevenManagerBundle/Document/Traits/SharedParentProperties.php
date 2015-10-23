<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 10:33
     */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class SharedParentProperties
     *
     * @package SevenManagerBundle\Document\Traits
     */
    trait SharedParentProperties
    {
        use FormatterProperties;

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
         * @PHPCR\Nodename()
         */
        protected $name;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $content;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $body;

        /**
         * @var string
         * @PHPCR\Locale()
         */
        protected $locale;

        /**
         * {@inheritDoc}
         */
        public function getLocale()
        {
            return $this->locale;
        }

        /**
         * {@inheritDoc}
         */
        public function setLocale($locale)
        {
            $this->locale = $locale;

            return $this;
        }

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
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param $body
         *
         * @return $this
         */
        public function setBody($body)
        {
            $this->body = $body;
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
