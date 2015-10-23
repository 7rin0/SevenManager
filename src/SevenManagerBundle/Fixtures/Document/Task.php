<?php
    /**
     * User: lseverino
     * Date: 12/10/15
     * Time: 23:09
     */

    namespace SevenManagerBundle\Fixtures\Document;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class Task
     * @PHPCR\Document()
     *
     * @package SevenManagerBundle\Document
     */
    class Task
    {
        /**
         * @PHPCR\Id()
         */
        protected $id;

        /**
         * @PHPCR\String()
         */
        protected $description;

        /**
         * @PHPCR\Boolean()
         */
        protected $done = false;

        /**
         * @PHPCR\ParentDocument()
         */
        protected $parentDocument;

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
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param $description
         *
         * @return $this
         */
        public function setDescription($description)
        {
            $this->description = $description;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getDone()
        {
            return $this->done;
        }

        /**
         * @param $done
         *
         * @return $this
         */
        public function setDone($done)
        {
            $this->done = $done;

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
         * @param $parentDocument
         *
         * @return $this
         */
        public function setParentDocument($parentDocument)
        {
            $this->parentDocument = $parentDocument;

            return $this;
        }


    }