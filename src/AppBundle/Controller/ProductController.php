<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     * @Template()
     * @return array
     */
    public function indexAction()
    {

        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();

        return ['products' => $products];
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     *
     * @param $id
     * @return array
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        return ['product' => $product];
    }
}