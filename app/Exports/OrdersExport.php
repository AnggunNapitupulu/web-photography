<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class OrdersExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        // set size of column
        return [
            'ID',
            'Service Name',
            'Order By',
            'Order Date',
        ];
    }

    public function collection()
    {
        $order = Order::all();
        $order->transform(function ($order) {
            $order->service = $order->service->service;
            $order->user = $order->user->name;
            return $order;
        });
        $orderNew = $order->map(function ($order) {
            return [
                $order->id,
                $order->service,
                $order->user,
                $order->service_date,
            ];
        });
        return $orderNew;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                // set row 1 as bold
                $event->sheet->getDelegate()->getStyle('A1:D1')->getFont()->setBold(true);
            },
        ];
    }
}