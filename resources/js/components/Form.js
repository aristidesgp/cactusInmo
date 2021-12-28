import React, { useEffect, useState } from 'react'
import taskServices from "./services/Task"
import List from './List';

export default function Form (props) {
    const [name, setName]=useState(null)
    const [description, setDescription]=useState(null)
    const [date, setDate]=useState(null)
    const property_id=props.id

    const [validator, setValidator]=useState(true);
    
    const storeTask = async ()=>{
        if (name.trim()!==""&&description.trim()!==""&&date.trim()!=="") {
            const data ={
                name, description, date, property_id
            }
            const res = await  taskServices.store(data)
            if (res.succes) {
                props.getTasks()
                setValidator(true)              
                setName("")
                setDescription("")
                setDate("")                                             
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
                      onChange={(event)=>setDate(event.target.value)}
                      value={date}
                      />
                     </div>
               </div>                 
                <textarea rows="5" cols="30" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                onChange={(event)=>setDescription(event.target.value)}
                value={description}
                />
                <div class="flex flex-grow w-1/4 py-4">
               <button
                    onClick={storeTask}                                 
                    class="border col-end-5 border-green-500 text-green-500 rounded-md px-4 py-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline"
                >
                    Agregar
                </button>
               </div>            
            </div>            
        </div>
        )   
}
