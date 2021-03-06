<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\barteko2CuboidType;
use barteko2\Tools\Cuboid;
use Symfony\Component\HttpFoundation\Request;
class barteko2CuboidController extends Controller
{
    /**
     * @Route("/barteko2/cuboid/show/form", name="barteko2_cuboid_show_form")
     */
    public function showFormAction()
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        return $this->render(
            'AppBundle:barteko2Cuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/barteko2/cuboid/calc", name="barteko2_cuboid_licz")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $cuboid = new Cuboid();
        $form = $this->createCreateForm($cuboid);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:barteko2Cuboid:wynik.html.twig',
                array('wynik' => $cuboid->cuboid())
            );
        }
        return $this->render(
            'AppBundle:barteko2Cuboid:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Cuboid $cuboid The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cuboid $cuboid)
    {
        $form = $this->createForm(new barteko2CuboidType(), $cuboid, array(
            'action' => $this->generateUrl('barteko2_cuboid_licz'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}