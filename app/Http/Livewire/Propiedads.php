<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApiController;
use App\Models\Propiedad;
use Livewire\Component;
use Livewire\WithPagination;

class Propiedads extends Component
{
    use WithPagination;
    public $selectedStatus="";
    public $propiedads, $id_propiedad, $name, $purposeStatus;
    public $modal=false;
    public $search="";

    protected $rules = [
        'name' => 'required'        
    ];
    
    public function render()
    {
        //dd($this->search);     
        return view('livewire.propiedads',[
            'propiedades'=>Propiedad::
            where(
                'purposeStatus',
                'LIKE',
                '%'.$this->selectedStatus.'%'
                )
            ->where(
                'name',
                'LIKE',
                '%'.$this->search.'%'
            )->paginate(6)
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedselectedStatus($status){     
        $this->selectedStatus=$status;            
        
    }
    
    public function sincro(){
       $apicontrol=new ApiController();
       //$apicontrol->saveData();
       $data=$apicontrol->getApiData();       
        
        foreach ($data as $valor){
            $resul=Propiedad::where('id',intval($valor['id']))->get();
            $inmob=new Propiedad();
            if (count($resul)==0) {
                $inmob->id=intval($valor['id']);
            }            
            $inmob->name=$valor['address'];                          
            
            switch ($valor['purposeStatus']['id']) {
                case '1':
                    $inmob->purposeStatus='For Sale';
                    $inmob->save();                    
                    break;
                case '15':
                    $inmob->purposeStatus='For Sale';
                    $inmob->save(); 
                    break;
                case '3':
                    $inmob->purposeStatus='Sold';
                    $inmob->save(); 
                    break;
                case '17':
                    $inmob->purposeStatus='Sold';
                    $inmob->save(); 
                    break;
                case '5':
                    $inmob->purposeStatus='Under Offer';
                    $inmob->save(); 
                    break;
                case '16':
                    $inmob->purposeStatus='Under Offer';
                    $inmob->save(); 
                    break;
                case '12':
                    $inmob->purposeStatus='Option Owner S';
                    $inmob->save(); 
                    break;
                case '13':
                    $inmob->purposeStatus='Option Owner R';
                    $inmob->save(); 
                    break;        
                default:                    
                    break;
            }
            
        } 
    }

    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();
        
    }
    public function goToTareas(Propiedad $propiedad)
    {        
        return redirect()->route('tareas',$propiedad);
        
    }
    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal(){
        $this->modal=true;
    }
    public function cerrarModal(){
        $this->modal=false;
    }
    public function limpiarCampos(){
        $this->id_propiedad='';
        $this->name='';
        $this->purposeStatus='';
    }
    public function editar($id){
        $propiedad=Propiedad::findOrFail($id);
        $this->id_propiedad=$id;
        $this->name=$propiedad->name;
        $this->purposeStatus=$propiedad->purposeStatus;
        $this->abrirModal();
    }

    public function guardar(){

        $this->validate();

        Propiedad::updateOrCreate(['id'=>$this->id_propiedad],
        [
            'name'=>$this->name,
            'purposeStatus'=>$this->purposeStatus
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
