<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white py-8 container">
        <div class="grid grid-cols-5 gap-3">
            <div class="text-3xl font-semibold col-start-1 col-end-3 text-left">{{$propiedad->name}}</div>
            <a class="col-end-6" href="{{route('dashboard')}}">
            <button class=" border border-gray-300 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline">
            Regresar al dashboard
            </button></a>
        </div>
        <div class=" text-lg leading-none">Id: {{$propiedad->id}}</div>
        <div class=" text-lg leading-none">Estado: {{$propiedad->purposeStatus}}</div>
        <div id="main"></div>        
    </div>    
        
</x-app-layout>