<div class="overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0 inset-0 flex bg-gray-700 bg-opacity-25">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">      
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button" wire:click.prevent="cerrarModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8"> 
                <h3 class="text-xl font-medium text-gray-900 dark:text-white text-center" >Id: {{$id_propiedad}}</h3>               
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                    <input type="text" id="name" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estado</label>
                    <select wire:model="purposeStatus" class="bottom-0 block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">                        
                        <option value="For Sale">For Sale</option>
                        <option value="Sold">Sold</option>
                        <option value="Under Offer">Under Offer</option>
                        <option value="Option Owner S">Option owners S</option>
                        <option value="option owners R">Option owners r</option>            
                    </select>                    
                </div>                
                <button 
                wire:click.prevent="guardar()"
                type="submit" 
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Aceptar
                </button>                
            </form>
        </div>
    </div>
</div>

