<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <?php  $id = 0?>
                    @foreach ( $factura as $factura )
                        {{$factura->nombre}} - Precio: {{$factura->precio}} - Impuesto: {{$factura->impuesto}}% <br>
                        <?php  $id = $factura->id?>
                    @endforeach
                    Monto total impuesto: {{$factura['total_impuesto']}} <br>
                    Monto total factura: {{$factura['total_factura']}}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
