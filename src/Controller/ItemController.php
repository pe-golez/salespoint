<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Item;
use App\Repository\ItemRepository;

class ItemController extends AbstractController
{

    public function __construct(ItemRepository $ir)
    {
        $this->itemRepository = $ir;
    }

    /**
     * @Route("/item/{id}", name="item")
     */
    public function showItem($id)
    {
        $item = $this->itemRepository->findOneBy([
            'id'    => $id
        ]);

        if ($item == null) {
            die("Item not found");
        }

        return $this->render('item/index.html.twig', [
            'item'  => $item
        ]);
    }

    /**
     * @Route("/items", name="list_items")
     */
    public function listItems()
    {
        // $items = $this->itemRepository->findBy([
        //     'unitPrice' => 235,
        //     'description'   => 'Mojitos Gold'
        // ]);
        $items = $this->itemRepository->findAll();

        return $this->render('item/list.html.twig', [
            'items' => $items
        ]);
    }
}
