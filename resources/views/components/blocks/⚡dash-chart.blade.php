<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<x-atoms.card class="isolate max-sm:order-last sm-col-span-full flex flex-col">
    <div x-data="apexChart({
        series: [
            { name: 'Closed', data: [50, 80, 10, 5, 10, 100, 70, 50, 70, 80, 110, 120] },
            { name: 'Lose', data: [80, 40, 105, 20, 25, 80, 35, 40, 45, 50, 55, 60] }
        ],
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    
    })"></div>
</x-atoms.card>