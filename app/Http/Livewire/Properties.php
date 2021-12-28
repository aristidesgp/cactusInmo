<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ApiController;
use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;
    public $selectedStatus="";
    public $property_id, $name, $purposeStatus;
    public $modal=false;
    public $search="";

    protected $rules = [
        'name' => 'required'        
    ];
    
    public function render()
    {        
        return view('livewire.properties',[
            'properties'=>Property::
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
       $data=$apicontrol->getApiData();       
        
        foreach ($data as $item){
            $resul=Property::where('id',intval($item['id']))->get();
            $inmob=new Property();
            if (count($resul)==0) {
                $inmob->id=intval($item['id']);
            }            
            $inmob->name=$item['address'];                          
            
            switch ($item['purposeStatus']['id']) {
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

    public function destroy(Property $property)
    {
        $property->delete();
        
    }
    public function goToTasks(Property $property)
    {        
        return redirect()->route('tasks',$property);
        
    }
    public function create(){
        $this->cleanFields();
        $this->openModal();
    }
    public function openModal(){
        $this->modal=true;
    }
    public function closeModal(){
        $this->modal=false;
    }
    public function cleanFields(){
        $this->property_id='';
        $this->name='';
        $this->purposeStatus='';
    }
    public function edit($id){
        $property=Property::findOrFail($id);
        $this->property_id=$id;
        $this->name=$property->name;
        $this->purposeStatus=$property->purposeStatus;
        $this->openModal();
    }

    public function save(){

        $this->validate();

        Property::updateOrCreate(['id'=>$this->property_id],
        [
            'name'=>$this->name,
            'purposeStatus'=>$this->purposeStatus
        ]);
        $this->closeModal();
        $this->cleanFields();
    }
}
