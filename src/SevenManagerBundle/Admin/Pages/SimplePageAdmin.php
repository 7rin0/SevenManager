<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Admin\Pages;

    use SevenManagerBundle\BasicCmsBundle\Document\SimplePage;
    use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Form\FormMapper;

    /**
     * Class SimplePageAdmin
     *
     * @package SevenManagerBundle\Admin\Pages
     */
    class SimplePageAdmin extends Admin
    {
        /**
         * @param ListMapper $listMapper
         */
        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('title', 'text');
        }

        /**
         * @param FormMapper $formMapper
         */
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with('form.group_general')
                ->add('title', 'text')
                ->add('content', 'textarea')
                ->end();
        }

        /**
         * @param mixed $document
         */
        public function prePersist($document)
        {
            $parent = $this->getModelManager()->find(null, '/cms/pages');
            $document->setParentDocument($parent);
        }

        /**
         * @param DatagridMapper $datagridMapper
         */
        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('title', 'doctrine_phpcr_string');
        }

        /**
         * @return array
         */
        public function getExportFormats()
        {
            return array();
        }

        /**
         * @param mixed $object
         * Add Title Label to breadcrumb
         *
         * @return mixed|string
         */
        public function toString($object)
        {
            return $object instanceof SimplePage && $object->getTitle()
                ? $object->getTitle()
                : $this->trans('link_add', array(), 'SonataAdminBundle');
        }
    }