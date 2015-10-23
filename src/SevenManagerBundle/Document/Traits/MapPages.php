<?php
    /**
     * User: lseverino
     * Date: 14/10/15
     * Time: 10:16
     */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    trait MapPages
    {
        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Node", strategy="hard")
         */
        protected $mapNode;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Page", strategy="hard")
         */
        protected $mapPage;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Post", strategy="hard")
         */
        protected $mapPost;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Article", strategy="hard")
         */
        protected $mapArticle;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Gallery", strategy="hard")
         */
        protected $mapGallery;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Form", strategy="hard")
         */
        protected $mapForm;

        /**
         * @return mixed
         */
        public function getMapNode()
        {
            return $this->mapNode;
        }

        /**
         * @param $mapNode
         *
         * @return $this
         */
        public function setMapNode($mapNode)
        {
            $this->mapNode = $mapNode;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapPage()
        {
            return $this->mapPage;
        }

        /**
         * @param $mapPage
         *
         * @return $this
         */
        public function setMapPage($mapPage)
        {
            $this->mapPage = $mapPage;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapPost()
        {
            return $this->mapPost;
        }

        /**
         * @param $mapPost
         *
         * @return $this
         */
        public function setMapPost($mapPost)
        {
            $this->mapPost = $mapPost;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapArticle()
        {
            return $this->mapArticle;
        }

        /**
         * @param $mapArticle
         *
         * @return $this
         */
        public function setMapArticle($mapArticle)
        {
            $this->mapArticle = $mapArticle;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapGallery()
        {
            return $this->mapGallery;
        }

        /**
         * @param $mapGallery
         *
         * @return $this
         */
        public function setMapGallery($mapGallery)
        {
            $this->mapGallery = $mapGallery;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapForm()
        {
            return $this->mapForm;
        }

        /**
         * @param $mapForm
         *
         * @return $this
         */
        public function setMapForm($mapForm)
        {
            $this->mapForm = $mapForm;

            return $this;
        }

    }