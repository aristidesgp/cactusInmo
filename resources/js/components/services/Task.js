const baseUrl="http://127.0.0.1:8000/api/dashboard"
import axios from "axios"
const task ={}

task.list= async (id)=>{
    const urlList=baseUrl+"/tasks/"+id
    const resp= await axios.get(urlList)
    .then(response=>{return response.data})
    .catch(error=>{return error})
    return resp

}

task.store= async (data)=>{    
    const urlSave=baseUrl+"/tasks/store"
    const resp= await axios.post(urlSave, data)
    .then(response=>{return response.data})
    .catch(error=>{return error})
    return resp
}

export default task