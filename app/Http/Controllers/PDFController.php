<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $orders = Order::get();

        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'orders' => $orders
        ];

        $pdf = Pdf::loadView('site.pages.orderPdf', $data);
        return $pdf->download('order-lists.pdf');
    }
    public function downloadPdf(){
        $data = ['title' => 'Your PDF Title'];
        $pdf = SnappyPdf::loadView('site.pages.snappy_orderPdf', $data);
        return $pdf->download('Order.pdf');
    }
}
