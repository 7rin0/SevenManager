<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 12:02
     */

    namespace SevenManagerBundle\Document\Containers;

    use SevenManagerBundle\Document\Traits\ChildMediaBlock;
    use SevenManagerBundle\Document\Traits\SharedContainerProperties;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class Slideshow
     * @PHPCR\Document(referenceable=true)
     *
     * @package SevenManagerBundle\Document\Containers
     */
    class Slideshow implements RouteReferrersReadInterface
    {

        // Shared properties
        use SharedContainerProperties;
        use ChildMediaBlock;

        // Custom Properties

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $subtitle;

        /**
         * @return mixed
         */
        public function getSubtitle()
        {
            return $this->subtitle;
        }

        /**
         * @param $subtitle
         *
         * @return $this
         */
        public function setSubtitle($subtitle)
        {
            $this->subtitle = $subtitle;

            return $this;
        }

    }