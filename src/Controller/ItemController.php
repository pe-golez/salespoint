<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Item;

class ItemController extends AbstractController
{
    /**
     * @Route("/item", name="item")
     */
    public function index()
    {
        $item1 = new Item();
        $item1->setItemNumber('10120');
        $item1->setDescription('pen');
        $item1->setUnitPrice(12.00);

        return $this->render('item/index.html.twig', [
            'item'  => $item1
        ]);
    }

    /**
     * @Route("/items", name="list_items")
     */
    public function listItems()
    {
        $item1 = new Item();
        $item1->setItemNumber('10120');
        $item1->setDescription('pen');
        $item1->setUnitPrice(12.00);

        $item2 = new Item();
        $item2->setItemNumber('101334');
        $item2->setDescription('pen 2');
        $item2->setUnitPrice(12.50);

        $item3 = new Item();
        $item3->setItemNumber('324234');
        $item3->setDescription('expensive pen');
        $item3->setUnitPrice(82.00);

        $item4 = new Item();
        $item4->setItemNumber('123123');
        $item4->setDescription('pen apple');
        $item4->setUnitPrice(13.75);


        $items = [$item1, $item2, $item3, $item4];
        return $this->render('item/list.html.twig', [
            'items' => $items
        ]);
    }
}
