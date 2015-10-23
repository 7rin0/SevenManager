<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Admin\Pages;

    use Sonata\AdminBundle\Form\FormMapper;
    use Sonata\AdminBundle\Admin\Admin;
    use SevenManagerBundle\Document\Pages\Homepage;
    use SevenManagerBundle\Admin\Traits\DefaultAdmin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Show\ShowMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Symfony\Component\Form\FormBuilder;

    /**
     * Class HomepageAdmin
     *
     * @package SevenManagerBundle\Admin\Pages
     */
    class HomepageAdmin extends Admin
    {
        protected $prePersist = '/seven-manager/homepage';

        use DefaultAdmin;

        /**
         * @param FormMapper $formMapper
         */
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->tab('seven_manager.admin.pages.homepage.title')
                    ->with('Required', array(
                        'class'       => 'col-md-6',
                        'box_class'   => 'box box-solid box-danger',
                        'description' => 'Required Content',
                    ))
                        ->add('title', 'text')
                        ->add('name', 'text', array('required' => true))
                        ->add('content', 'textarea', array('required' => true))
                    ->end()
                ->with('Optional', array(
                    'class'       => 'col-md-6',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Optional Content',
                ))
                ->add('subtitle', 'text', array('required' => false))
                ->add('image', 'cmf_media_image', array('required' => false))
                ->end()
                ->end()
                ->tab('Body')
                    ->with('Body')
                        ->add('body', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                        ->add('richText1', 'sonata_formatter_type', array(
                            'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                            'format_field'   => 'contentFormatter',
                            'source_field'   => 'rawContent',
                            'source_field_options'      => array(
                                'attr' => array('class' => 'span10', 'rows' => 20)
                            ),
                            'listener'       => true,
                            'target_field'   => 'richText1',
                            'required' => false
                        ))
                    ->end()
                ->end()
                ->tab('Child')
                    ->with('Child')
                        ->add(
                            'blockChild',
                            'sonata_type_admin',
                            array(
                                'required'     => true,
                                'by_reference' => true,
                                'btn_catalogue' => true,
                            ),
                            array(
                                'edit'       => 'inline',
                                'inline'     => 'table',
                                'multiple'   => false,
                                'sortable'   => 'position',
                                'admin_code' => 'seven_manager.admin.blocks.slideone',
                            )
                        )
                    ->end()
                ->end()
                ->tab('Slideshow')
                    ->with('Slideshow')
                        ->add(
                            'mapSlideshow',
                            'sonata_type_model',
                            array(
                                'label' => 'Use/Create a slideshow',
                                'required' => false,
                            )
                        )
                    ->end()
                ->end()
                ->tab('Pages')
                ->with('Relate Pages', array(
                    'class'       => 'col-md-12',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Relate an existing content',
                ))
                ->add('mapNode', 'sonata_type_model', array('label' => 'Related Node', 'required' => false, 'multiple' => true,))
                ->add('mapPage', 'sonata_type_model', array('label' => 'Related Page', 'required' => false, 'multiple' => false,))
                ->add('mapPost', 'sonata_type_model', array('label' => 'Related Post', 'required' => false, 'multiple' => true,))
                ->add('mapArticle', 'sonata_type_model', array('label' => 'Related Article', 'required' => false, 'multiple' => false,))
                ->add('mapGallery', 'sonata_type_model', array('label' => 'Related Gallery', 'required' => false, 'multiple' => true,))
                ->add('mapForm', 'sonata_type_model', array('label' => 'Related Form', 'required' => false, 'multiple' => false,))
                ->end()
                ->end()
                ->tab('Blocks')
                ->with('Relate Blocks', array(
                    'class'       => 'col-md-12',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Relate an existing content',
                ))
                ->add('mapContainer', 'sonata_type_model', array('label' => 'Related Container Block', 'required' => false,))
                ->add('mapReference', 'sonata_type_model', array('label' => 'Related Reference Block', 'required' => false,))
                ->add('mapAction', 'sonata_type_model', array('label' => 'Related Action Block', 'required' => false,))
                ->add('mapSlideshow', 'sonata_type_model', array('label' => 'Related Slideshow Block', 'required' => false,))
                ->add('mapImage', 'sonata_type_model', array('label' => 'Related Image Block', 'required' => false,))
                ->end()
                ->end()
                ->tab('Auto-complete')
                ->with('Auto-complete')
                ->add(
                    'mapSimple',
                    'sonata_type_model_autocomplete',
                    array(
                        'property' => 'title',
                        'model_manager' => $this->modelManager,
                        'required' => false,
                    )
                )
                ->end()
                ->end()
                ->setHelps(array(
                    'title'    => 'seven_manager.admin.fields.title.helper',
                    'subtitle' => 'seven_manager.admin.fields.subtitle.helper',
                    'name'     => 'seven_manager.admin.fields.name.helper',
                    'content'  => 'seven_manager.admin.fields.content.helper',
                    'image'    => 'seven_manager.admin.fields.image.helper',
                ));

        }

        /**
         * @param mixed $object
         * Add Title Label to breadcrumb
         *
         * @return mixed|string
         */
        public function toString($object)
        {
            return $object instanceof Homepage && $object->getTitle() ?
                $object->getTitle() : $this->trans('link_add', array(), 'SonataAdminBundle');
        }
    }