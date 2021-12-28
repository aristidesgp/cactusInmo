<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white py-8 container" >               
        <div class="w-full mx-auto relative grid grid-cols-5 gap-3">
                <select wire:model="selectedStatus" class="bottom-0 block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione el estado</option>
                    <option value="For Sale">For Sale</option>
                    <option value="Sold">Sold</option>
                    <option value="Under Offer">Under Offer</option>
                    <option value="Option Owner S">Option owners S</option>
                    <option value="option owners R">Option owners r</option>            
                </select>
                <button
                    type="button"              
                    class="border col-end-5 border-green-500 text-green-500 rounded-md px-4 py-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline"
                    wire:click="sincro()"
                    >
                    Sincronizar Propiedades
                    </button>                
                <input 
                wire:model="search" 
                type="text"
                class="border-2 col-end-6 border-gray-300 bg-white h-10 px-5 pr-8 rounded-lg text-sm focus:outline-none"
                placeholder="Buscar por Nombre"
                >                
        </div>        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            @foreach ($properties as $property)
            <div class="p-2" >
                <div class="bg-white @if ($property->purposeStatus=='For Sale')bg-red-200 @endif overflow-hidden hover:bg-green-100 border border-gray-200 p-3">
                    <div  class="m-2 text-justify text-sm">                          
                        <h2 class="font-bold text-lg h-2 mb-8">Nombre: {{$property->name}} </h2>
                        <p class="text-xs">
                        Id: {{$property->id}}
                        </p> 
                        <p class="text-xs">
                        Estado:{{$property->purposeStatus}}
                        </p>              
                    </div>
                    <div class="flex flex-nowrap space-x-2 mx-auto">
                        <button wire:click="goToTasks({{$property}})" class="p-2 pl-3 pr-3 bg-blue-500 text-gray-100 text-base rounded-lg focus:border-4 border-blue-300">Recordatorios</button>
                        <button wire:click="edit({{$property->id}})" class="p-2 pl-3 pr-3 bg-gray-500 text-gray-100 text-base rounded-lg focus:border-4 border-gray-300">Editar</button>
                        @if ($modal)
                           @include('livewire.modal')                            
                        @endif
                        <button wire:click="destroy({{$property}})" class="p-2 pl-3 pr-3 bg-yellow-500 text-gray-100 text-base rounded-lg focus:border-4 border-yellow-300">Eliminar</button>                                          
                    </div>
                </div>                
            </div>                       
            @endforeach            
        </div>
        <div class="mt-4 ">
            {{ $properties->links() }}        
        </div>              
</div>
