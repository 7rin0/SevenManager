<?php
    /**
     * User: lseverino
     * Date: 22/10/15
     * Time: 00:50
     */

    namespace SevenManagerBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class DefaultController
     *
     * @package SevenManagerBundle\Controller
     */
    class DefaultController extends Controller
    {

        /**
         * @Route("{lang}/seven-manager", name="seven_manager_homepage")
         * @Route("{lang}/seven-manager/")
         *
         * @Template("SevenManagerBundle:Default:index.html.twig")
         */
        public function indexAction()
        {
            // Get Station manager
            $stationManager = $this->get('seven_manager.station_manager');

            // Get Homepage
            $homepage = $stationManager->getOneDocumentBy(
                array(
                    'document' => 'Pages\Homepage',
                    'property' => 'name',
                    'value'    => 'homepage',
                    'dump'     => false,
                )
            );

            // If Homepage is defined
            if ($homepage) {

                // Selected slideshow
                $slideshowName = $homepage->getMapSlideshow();

                // If Slideshow is selected
                if ($slideshowName) {

                    // Get Slideshow
                    $slideshow = $stationManager->getOneDocumentBy(
                        array(
                            'document' => 'Containers\\' . $stationManager->getClassName($slideshowName),
                            'property' => 'name',
                            'value'    => $slideshowName->getName(),
                            'dump'     => false,
                        )
                    );

                    // Get Slideshow Images
                    $children = $this->get('doctrine_phpcr')->getManager()->getChildren($slideshow);

                    // Dev Slideshow
                    foreach ($children as $imageBlock) {

                        // Get Slideshow
                        $slideTypeOne = $stationManager->getOneDocumentBy(
                            array(
                                'document' => 'Blocks\\' . $stationManager->getClassName($imageBlock),
                                'property' => 'name',
                                'value'    => $imageBlock->getName(),
                                'dump'     => true,
                            )
                        );

                    }

                }

            }

            //cmf_media_display_url

            return array('slider' => $children);

        }

    }
