<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 14:02
     */

    namespace SevenManagerBundle\Document\Blocks;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
    use Symfony\Cmf\Bundle\MediaBundle\ImageInterface;
    use Symfony\Component\HttpFoundation\File\UploadedFile;
    use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;


    /**
     * Class SlideTypeOne
     * @PHPCR\Document(referenceable=true)
     *
     * @package SevenManagerBundle\Document\Blocks
     */
    class SlideTypeOne extends AbstractBlock
    {

        // Shared properties

        // Custom Properties

        /**
         * @PHPCR\String(nullable=true)
         * @var string
         */
        protected $label;

        /**
         * @PHPCR\String(nullable=true)
         * @var string
         */
        protected $title;

        /**
         * @PHPCR\Child(cascade="persist")
         * @var Image
         */
        protected $image;

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

        /**
         * @return mixed
         */
        public function getLabel()
        {
            return $this->label;
        }

        /**
         * @param mixed $label
         *
         * @return SlideTypeOne
         */
        public function setLabel($label)
        {
            $this->label = $label;

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
         * @param mixed $title
         *
         * @return SlideTypeOne
         */
        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return 'restructure.block.imagem';
        }

    }