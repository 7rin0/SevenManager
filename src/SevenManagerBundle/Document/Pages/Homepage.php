<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Document\Pages;

    use SevenManagerBundle\Document\Traits\MapPages;
    use SevenManagerBundle\Document\Traits\MapBlocks;
    use SevenManagerBundle\Document\Traits\ChildMediaBlock;
    use SevenManagerBundle\Document\Traits\SharedParentProperties;
    use Symfony\Cmf\Bundle\MediaBundle\ImageInterface;
    use Symfony\Component\HttpFoundation\File\UploadedFile;
    use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Homepage implements RouteReferrersReadInterface, TranslatableInterface
    {
        /**
         * Traits
         */
        use MapPages;
        use MapBlocks;
        use ChildMediaBlock;
        use SharedParentProperties;


        /*************************** TESTE **************************/

        /**
         * @PHPCR\Child(cascade="persist")
         */
        protected $blockChild;

        /**
         * @return mixed
         */
        public function getBlockChild()
        {
            return $this->blockChild;
        }

        /**
         * @param mixed $blockChild
         * @return Homepage
         */
        public function setBlockChild($blockChild)
        {
            $this->blockChild = $blockChild;
            return $this;
        }

        /*************************** TESTE **************************/

        /**
         * @PHPCR\Child(cascade="persist")
         * @var Image
         */
        protected $image;

        /**
         * @PHPCR\String(type="string", nullable=true, translated=true)
         */
        protected $label;

        /**
         * @PHPCR\String(type="string", nullable=true, translated=true)
         */
        protected $subtitle;

        /**
         * @return mixed
         */
        public function getLabel()
        {
            return $this->label;
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

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param null $image
         *
         * @return $this
         */
        public function setImage($image = null)
        {
            if (!$image) {
                return $this;
            }

            if (!$image instanceof ImageInterface && !$image instanceof UploadedFile) {
                $type = is_object($image) ? get_class($image) : gettype($image);

                throw new \InvalidArgumentException(sprintf(
                    'Image is not a valid type, "%s" given.',
                    $type
                ));
            }

            if ($this->image) {
                // existing image, only update content
                $this->image->copyContentFromFile($image);
            } elseif ($image instanceof ImageInterface) {
                $image->setName('image'); // ensure document has right name
                $this->image = $image;
            } else {
                $this->image = new Image();
                $this->image->copyContentFromFile($image);
            }

            return $this;
        }

    }