<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
            <br>
            <a href="/crear-producto" type="button">Crear Producto</a>  
        </h2>
    </x-slot>

    @if (!empty($productos))
        @foreach ($productos as $p)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">       
                            <a href="/editar-producto/{{$p->id}}" type="button">{{$p->nombre}}</a>           
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif  
    
    
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
