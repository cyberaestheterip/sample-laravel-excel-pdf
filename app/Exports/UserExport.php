<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class UserExport implements FromCollection, WithHeadings, WithEvents
{
    use RegistersEventListeners;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'This',
            'Is',
            'A',
            'Heading',
            'Where',
            'Everything',
            'Is',
            'Nothing',
            'And',
            'Nothing',
            'Is',
            'Everything',
            'After',
            'Which',
            'It',
            'Will',
            'Overflow',
            'When',
            'Landscape',
        ];
    }

    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()
            ->getPageSetup()
            ->setFitToWidth(1)
            ->setFitToHeight(0)
//            ->setFitToPage(1)
            ->setOrientation('landscape');
    }
}
