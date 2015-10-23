<?php
    /**
     * User: lseverino
     * Date: 14/10/15
     * Time: 10:16
     */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    trait MapBlocks
    {

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\SimpleBlock", strategy="hard")
         */
        protected $mapSimple;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ContainerBlock", strategy="hard")
         */
        protected $mapContainer;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ReferenceBlock", strategy="hard")
         */
        protected $mapReference;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ActionBlock", strategy="hard")
         */
        protected $mapAction;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Containers\Slideshow", strategy="hard")
         */
        protected $mapSlideshow;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ImagineBlock", strategy="hard")
         */
        protected $mapImage;

        /**
         * @return mixed
         */
        public function getMapImage()
        {
            return $this->mapImage;
        }

        /**
         * @param $mapImage
         *
         * @return $this
         */
        public function setMapImage($mapImage)
        {
            $this->mapImage = $mapImage;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapSimple()
        {
            return $this->mapSimple;
        }

        /**
         * @param $mapSimple
         *
         * @return $this
         */
        public function setMapSimple($mapSimple)
        {
            $this->mapSimple = $mapSimple;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapContainer()
        {
            return $this->mapContainer;
        }

        /**
         * @param $mapContainer
         *
         * @return $this
         */
        public function setMapContainer($mapContainer)
        {
            $this->mapContainer = $mapContainer;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapReference()
        {
            return $this->mapReference;
        }

        /**
         * @param $mapReference
         *
         * @return $this
         */
        public function setMapReference($mapReference)
        {
            $this->mapReference = $mapReference;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapAction()
        {
            return $this->mapAction;
        }

        /**
         * @param $mapAction
         *
         * @return $this
         */
        public function setMapAction($mapAction)
        {
            $this->mapAction = $mapAction;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapSlideshow()
        {
            return $this->mapSlideshow;
        }

        /**
         * @param $mapSlideshow
         *
         * @return $this
         */
        public function setMapSlideshow($mapSlideshow)
        {
            $this->mapSlideshow = $mapSlideshow;

            return $this;
        }

    }