<?php
    /**
     * User: lseverino
     * Date: 21/10/15
     * Time: 15:40
     */

    namespace SevenManagerBundle\Admin\Traits;

    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Show\ShowMapper;
    use SevenManagerBundle\Document\Pages\Homepage;

    /**
     * Class DefaultAdmin
     *
     * @package SevenManagerBundle\Admin\Traits
     */
    trait DefaultAdmin
    {

        // Fix Bundles without suffix Bundle
        // protected $baseRouteName = 'seven_manager_homepage';
        // protected $baseRoutePattern = 'homepage';
        public function supportsPreviewMode()
        {
            parent::supportsPreviewMode();
            return $this->supportsPreviewMode = true;
        }

        /**
         * @param ShowMapper $showMapper
         */
        public function configureShowFields(ShowMapper $showMapper)
        {
            parent::configureShowFields($showMapper);
            $showMapper
                ->add('id')
                ->add('title')
                ->add('name')
                ->add('subtitle')
                ->add('content')
                ->add('Boolean one', 'boolean');

        }

        /**
         * @param ListMapper $listMapper
         */
        protected function configureListFields(ListMapper $listMapper)
        {
            parent::configureListFields($listMapper);
            $listMapper
                ->addIdentifier('title', 'text')
                ->addIdentifier('name', 'text')
                ->addIdentifier('id', 'text')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'show'   => array(),
                        'edit'   => array(),
                        'delete' => array(),
                    )
                ));
        }

        /**
         * @param DatagridMapper $datagridMapper
         */
        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            parent::configureDatagridFilters($datagridMapper);
            $datagridMapper
                ->add('title', 'doctrine_phpcr_string')
                ->add('subtitle', 'doctrine_phpcr_string')
                ->add('content', 'doctrine_phpcr_string')
                ->add('name', 'doctrine_phpcr_nodename');
        }

        /**
         * {@inheritdoc}
         */
        public function preUpdate($children)
        {
            foreach ($children->getChildren() as $child) {
                if (!$this->modelManager->getNormalizedIdentifier($child)) {

                    $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';
                    $child->setName($this->generateName($fatherPrefix));
                }
            }
        }

        /**
         * @param $document
         *
         * @return $this
         */
        public function postUpdate($document)
        {
            return $this;
        }

        /**
         * @param mixed $document
         *
         * @return $this
         */
        public function prePersist($document)
        {
            if (!empty($this->prePersist)) {
                $parent = $this->getModelManager()->find(null, $this->prePersist);
                $document->setParentDocument($parent);
            }

            return $this;
        }

        /**
         * @param $document
         *
         * @return $this
         */
        public function postPersist($document)
        {
            return $this;
        }

        /**
         * @param $document
         *
         * @return $this
         */
        public function preRemove($document)
        {
            return $this;
        }

        /**
         * @param $document
         *
         * @return $this
         */
        public function postRemove($document)
        {
            return $this;
        }

        /**
         * @param $fatherPrefix
         *
         * @return string
         */
        private function generateName($fatherPrefix)
        {
            return $fatherPrefix . '_child_' . time();
        }

        /**
         * @return array
         */
        public function getExportFormats()
        {
            return array(/**'json', 'xml', 'csv', 'xls'**/);
        }

    }