<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InvoiceHeaderRepository;

class InvoiceController extends AbstractController
{

    public function __construct(InvoiceHeaderRepository $invoiceHeaderRepository)
    {
        $this->invoiceHeaderRepository = $invoiceHeaderRepository;
    }

    /**
     * @Route("/invoice/{invoiceId}", name="invoice")
     */
    public function showInvoice($invoiceId)
    {
        $invoice = $this->invoiceHeaderRepository->find($invoiceId);
        // var_dump($invoice->getInvoiceDetails());
        // die();

        return $this->render('invoice/index.html.twig', [
            'invoice' => $invoice
        ]);
    }
}
