<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Admin\Pages;

    use SevenManagerBundle\Admin\SimplePageAdmin;
    use SevenManagerBundle\BasicCmsBundle\Document\SimplePost;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Form\FormMapper;

    /**
     * Class SimplePostAdmin
     *
     * @package SevenManagerBundle\Admin\Pages
     */
    class SimplePostAdmin extends SimplePageAdmin
    {
        /**
         * @param FormMapper $formMapper
         */
        protected function configureFormFields(FormMapper $formMapper)
        {
            parent::configureFormFields($formMapper);

            $formMapper
                ->with('form.group_general')
                ->add('date', 'date')
                ->end();
        }

        /**
         * @param mixed $object
         * Add Title Label to breadcrumb
         *
         * @return mixed|string
         */
        public function toString($object)
        {
            return $object instanceof SimplePost && $object->getTitle()
                ? $object->getTitle()
                : $this->trans('link_add', array(), 'SonataAdminBundle');
        }
    }