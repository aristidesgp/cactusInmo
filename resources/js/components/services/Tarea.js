const baseUrl="http://127.0.0.1:8000/api/dashboard"
import axios from "axios"
const tarea ={}

tarea.list= async (id)=>{
    const urlList=baseUrl+"/tareas/"+id
    const resp= await axios.get(urlList)
    .then(response=>{return response.data})
    .catch(error=>{return error})
    return resp

}

tarea.store= async (data)=>{    
    const urlSave=baseUrl+"/tareas/store"
    const resp= await axios.post(urlSave, data)
    .then(response=>{return response.data})
    .catch(error=>{return error})
    return resp
}

export default tarea