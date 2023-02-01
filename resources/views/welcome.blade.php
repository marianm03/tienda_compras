<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <form action="/add_compra" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6  text-gray-900 dark:text-gray-100 text-center">
                        @foreach ( $productos as $producto)
                            <label for="">{{$producto->nombre}} - {{$producto->precio}}</label>
                            <input type="checkbox" name="producto[]" value="{{$producto->id}}" > <br>
                        @endforeach
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <button class="btn btn-primary" type="submit">Realizar compra</button>
                    </div>
                </div>
            </div>
        </form>
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
</x-app-layout>
