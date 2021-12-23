import React, {useEffect, useState} from 'react'
import ReactDOM from 'react-dom'
import tareaServices from "../components/services/Tarea"
import '../../../public/css/app.css'
import Form from './Form';
import List from './List';

export default function Main () {    
    const splitUrl=location.href.split("/")
    const id=splitUrl[splitUrl.length-1]
    const [refresch, setRefresh]=useState(false)

    const [listTareas, setListTareas]= useState([])

    const getTareas=async ()=> {
        const resp= await tareaServices.list(id)
        setListTareas(resp.data)        
    }
    useEffect(()=>{
        getTareas()               
    },[])   
    
    
        
        return (
            <div className="container text-center flex flex-row">
                <Form 
                id={id}
                getTareas={getTareas}                
                />
                <List listTareas={listTareas}/>
            </div>
        )
    
}

if (document.getElementById('main')) {
    ReactDOM.render(<Main />, document.getElementById('main'));
}

