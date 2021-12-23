import React, { useEffect, useState } from 'react'
import tareaServices from "../components/services/Tarea"
import List from './List';

export default function Form (props) {
    const [name, setName]=useState(null)
    const [descripcion, setDescripcion]=useState(null)
    const [fecha, setFecha]=useState(null)
    const propiedad_id=props.id

    const [validator, setValidator]=useState(true);
    
    const storeTarea = async ()=>{
        if (name.trim()!==""&&descripcion.trim()!==""&&fecha.trim()!=="") {
            const data ={
                name, descripcion, fecha, propiedad_id
            }
            const res = await  tareaServices.store(data)
            if (res.succes) {
                props.getTareas()
                setValidator(true)              
                setName("")
                setDescripcion("")
                setFecha("")                                             
            } else {
                alert(res.message)             
            }              
        }else{
            alert("Existen uno o varios campos vacios")
            setValidator(false)
        }               
             
    }    
        return (            
        <div class="mt-5 bg-white rounded-lg shadow basis-1/2 ">
            <div class="flex">
               <div class="flex-1 py-5 pl-5 overflow-hidden">                  
                  <h3 class="inline text-lg leading-none">Agregar Tarea</h3>
                  
               </div>
            </div>
            <div class="px-5 pb-5">
               <div class="flex">
                  <div class="flex-grow w-1/4 pr-2">
                      <input placeholder="Nombre de la Tarea" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                      onChange={(event)=>setName(event.target.value)}
                      value={name}
                      />
                  </div>
                    <div class="flex-grow ml-4">
                      <input type="date" placeholder="Fecha" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                      onChange={(event)=>setFecha(event.target.value)}
                      value={fecha}
                      />
                     </div>
               </div>                 
                <textarea rows="5" cols="30" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                onChange={(event)=>setDescripcion(event.target.value)}
                value={descripcion}
                />
                <div class="flex flex-grow w-1/4 py-4">
               <button
                    onClick={storeTarea}                                 
                    class="border col-end-5 border-green-500 text-green-500 rounded-md px-4 py-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline"
                >
                    Agregar
                </button>
               </div>            
            </div>            
        </div>
        )   
}
