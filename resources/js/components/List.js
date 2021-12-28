import React, { useEffect, useState } from 'react'

export default function List({taskList}) {
    
    
    return (
            <div class="mt-5 bg-white rounded-lg shadow basis-1/2 ml-4">
                <div class="flex-1 py-5 pl-5 overflow-hidden ">                  
                  <h3 class="inline text-lg leading-none">Lista de Tareas</h3>
               </div>

               <div class="px-5 pb-5 ">
               <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4 py-4">
    <div class="flex flex-col flex-nowrap justify-center h-full">        
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">            
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nombre Tarea</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Fecha</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left"></div>
                                </th>                                
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">                            
                            {
                                taskList.map((task)=>{
                                    return (
                                        <tr key={task.id}>
                                         <td class="p-2 whitespace-nowrap">
                                          <div class="flex items-center">                                        
                                          <div class="font-medium text-gray-800">{task.name}</div>
                                          </div>
                                         </td>
                                         <td class="p-2 whitespace-nowrap">
                                          <div class="text-left">{task.date}</div>
                                         </td>
                                         <td class="p-2 whitespace-nowrap">
                                          <div class="text-left font-medium text-green-500">
                                             <a href="">Ver descripcion</a>
                                          </div>
                                          </td>                                
                                        </tr>
                                    )
                                })
                            }                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

               </div>
                
            </div>
        )
    
}
