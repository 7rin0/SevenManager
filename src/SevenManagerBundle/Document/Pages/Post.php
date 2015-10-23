<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Document\Pages;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
    use SevenManagerBundle\Document\Traits\SharedParentProperties;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Post implements
        RouteReferrersReadInterface,
        TranslatableInterface
    {
        use SharedParentProperties;

        /**
         * @PHPCR\String(type="string", nullable=true)
         */
        protected $label;

        /**
         * @PHPCR\String(type="string", nullable=true)
         */
        protected $subtitle;

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param $label
         *
         * @return $this
         */
        public function setLabel($label)
        {
            $this->label = $label;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getSubtitle()
        {
            return $this->label;
        }

        /**
         * @param $subtitle
         *
         * @return $this
         */
        public function setSubtitle($subtitle)
        {
            $this->label = $subtitle;

            return $this;
        }

    }