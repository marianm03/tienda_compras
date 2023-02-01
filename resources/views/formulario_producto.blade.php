<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos - Crear') }}
            
            <a href="/crear-producto" type="button">Crear Producto</a>  
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-center">       
                    <form action="/save_producto" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-center">
                                    <label for="">Nombre</label>
                                   <input type="text" name="nombre" required value="{{@$productos->nombre}}">
                                    <label for="">Precio</label>
                                   <input type="text" name="precio" required value="{{@$productos->precio}}">
                                    <label for="">Impuesto</label>
                                   <input type="text" name="impuesto" required value="{{@$productos->impuesto}}">
                                   <input type="hidden" name="id" value="{{@$productos->id}}">
                                </div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    @if (!empty($productos->id))
                                        <br><a href="/eliminar-producto/{{$productos->id}}" type="button">Eliminar</a>  
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
