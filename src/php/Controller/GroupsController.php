<?php
namespace App\Controller;

use App\Entity\Group;
use App\Type\GroupType;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupsController extends BaseController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $items = $this->getDoctrine()->getRepository(Group::class)->findAll();

        return $this->handleData($items);
    }

    public function postAction(Request $request)
    {
        $form = $this->createForm(GroupType::class);
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

    public function patchAction(Group $type, Request $request)
    {
        $form = $this->createForm(GroupType::class, $type);
        $form->submit($request->request->all(), false);

        if ($form->isValid()) {
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($type);
            $dm->flush($type);

            return $this->handleData($type, Response::HTTP_OK);
        }

        return $this->handleData($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }

    public function deleteAction(Group $type)
    {
        $dm = $this->getDoctrine()->getManager();
        $dm->remove($type);
        $dm->flush($type);

        return $this->handleData(null, Response::HTTP_NO_CONTENT);
    }
}
