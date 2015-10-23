<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 10:31
     */

    namespace SevenManagerBundle\Admin\Containers;

    use SevenManagerBundle\Admin\Traits\DefaultAdmin;
    use SevenManagerBundle\Document\Containers\Slideshow;
    use Sonata\AdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Show\ShowMapper;
    use Sonata\AdminBundle\Form\FormMapper;

    /**
     * Class SlideshowAdmin
     *
     * @package SevenManagerBundle\Admin\Containers
     */
    class SlideshowAdmin extends Admin
    {

        protected $slideTypeOne;
        protected $prePersist = '/seven-manager/slideshow';

        use DefaultAdmin;

        /**
         * @return mixed
         */
        public function getSlideTypeOne()
        {
            return $this->slideTypeOne;
        }

        /**
         * @param mixed $slideTypeOne
         *
         * @return SlideshowAdmin
         */
        public function setSlideTypeOne($slideTypeOne)
        {
            $this->slideTypeOne = $slideTypeOne;

            return $this;
        }

        /**
         * @param FormMapper $formMapper
         */
        protected function configureFormFields(FormMapper $formMapper)
        {

            // Define Admin fields
            $formMapper
                ->tab('General')
                ->with('Required', array(
                    'class'       => 'col-md-6',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Required',
                ))
                ->add('title', 'text')
                ->add('name', 'text', array('required' => true))
                ->end()
                ->with('Optional', array(
                    'class'       => 'col-md-6',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Optional',
                ))
                ->add('subtitle', 'text', array('required' => false))
                ->add('content', 'textarea', array('required' => false))
                ->end()
                ->end()
                ->tab('Images')
                ->with('Images')
                ->add(
                    'children',
                    'sonata_type_collection',
                    array(
                        'required'     => true,
                        'by_reference' => false,
                        'type_options' => array('delete' => true)
                        //'btn_catalogue' => true,
                    ),
                    array(
                        'label'      => 'images',
                        'edit'       => 'inline',
                        'inline'     => 'table',
                        'multiple'   => false,
                        'sortable'   => 'position',
                        'admin_code' => $this->slideTypeOne,
                    )
                )
                ->end()
                ->end()
                ->setHelps(array());

        }

        /**
         * @param mixed $object
         *
         * @return string
         */
        public function toString($object)
        {
            return $object instanceof Slideshow && $object->getTitle() ?
                $object->getTitle() : $this->trans('link_add', array(), 'SonataAdminBundle');
        }

    }