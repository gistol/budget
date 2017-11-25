<?php
namespace App\Controller;

use App\Entity\Item;
use App\Type\ItemType;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemsController extends BaseController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $items = $this->getDoctrine()->getRepository(Item::class)->findAll();

        return $this->handleData($items);
    }

    public function postAction(Request $request)
    {
        $form = $this->createForm(ItemType::class);
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
}
