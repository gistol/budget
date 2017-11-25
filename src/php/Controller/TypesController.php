<?php
namespace App\Controller;

use App\Entity\Type;
use App\Type\TypeType;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TypesController extends BaseController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $items = $this->getDoctrine()->getRepository(Type::class)->findAll();

        return $this->handleData($items);
    }

    public function postAction(Request $request)
    {
        $form = $this->createForm(TypeType::class);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $item = $form->getData();

            $dm = $this->getDoctrine()->getManager();
            $dm->persist($item);
            $dm->flush($item);

            return $this->handleData($item, Response::HTTP_CREATED);
        }

        return $this->handleData($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }

    public function patchAction(Type $type, Request $request)
    {
        $form = $this->createForm(TypeType::class, $type);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($type);
            $dm->flush($type);

            return $this->handleData($type, Response::HTTP_OK);
        }

        return $this->handleData($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }
}
