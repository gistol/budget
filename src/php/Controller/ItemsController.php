<?php
namespace App\Controller;

use App\Repository\ItemRepository;
use App\Type\ItemType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemsController extends BaseController implements ClassResourceInterface
{
    /**
     * @Rest\Get("/items")
     * @Rest\QueryParam(name="offset", requirements="\d+", default="0")
     * @Rest\QueryParam(name="limit", requirements="\d+", default="10")
     */
    public function cgetAction(ParamFetcher $paramFetcher, ItemRepository $repository)
    {
        $offset = $paramFetcher->get('offset');
        $limit = $paramFetcher->get('limit');

        $items = $repository->get($offset, $limit);

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
