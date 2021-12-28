import React, {useEffect, useState} from 'react'
import ReactDOM from 'react-dom'
import taskServices from "./services/Task"
import '../../../public/css/app.css'
import Form from './Form';
import List from './List';

export default function Main () {    
    const splitUrl=location.href.split("/")
    const id=splitUrl[splitUrl.length-1]
    const [taskList, setTaskList]= useState([])

    const getTasks=async ()=> {
        const resp= await taskServices.list(id)
        setTaskList(resp.data)        
    }
    useEffect(()=>{
        getTasks()               
    },[])   
    
    
        
        return (
            <div className="container text-center flex flex-row">
                <Form 
                id={id}
                getTasks={getTasks}                
                />
                <List taskList={taskList}/>
            </div>
        )
    
}

if (document.getElementById('main')) {
    ReactDOM.render(<Main />, document.getElementById('main'));
}

