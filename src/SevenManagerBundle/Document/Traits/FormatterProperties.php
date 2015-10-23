<?php
    /**
     * User: lseverino
     * Date: 23/10/15
     * Time: 23:33
     */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class FormaterProperties
     *
     * @package SevenManagerBundle\Document\Traits
     */
    trait FormatterProperties
    {

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $rawContent;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $richText1;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $contentFormatter;

        /**
         * @return mixed
         */
        public function getRawContent()
        {
            return $this->rawContent;
        }

        /**
         * @param mixed $rawContent
         */
        public function setRawContent($rawContent)
        {
            $this->rawContent = $rawContent;
        }

        /**
         * @return mixed
         */
        public function getContentFormatter()
        {
            return $this->contentFormatter;
        }

        /**
         * @param mixed $contentFormatter
         */
        public function setContentFormatter($contentFormatter)
        {
            $this->contentFormatter = $contentFormatter;
        }

        /**
         * @return mixed
         */
        public function getRichText1()
        {
            return $this->richText1;
        }

        /**
         * @param mixed $richText1
         */
        public function setRichText1($richText1)
        {
            $this->richText1 = $richText1;
        }



    }
