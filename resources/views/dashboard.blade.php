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
                    <a href="/geneerar-facturas" type="button">Generar Facturas Pendientes</a>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($resp))
        <div class="py-12">
            <form action="/add_compra" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6  text-gray-900 dark:text-gray-100 text-center">
                           {{$resp}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ( $facturas_e as $factura)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <a href="/ver-factura/{{$factura->id}}" type="button">Factura #{{$factura->id}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
</x-app-layout>
