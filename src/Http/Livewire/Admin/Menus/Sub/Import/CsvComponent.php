<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus\Sub\Import;

use Livewire\WithFileUploads;
use League\Csv\Reader;
use League\Csv\Statement;
use Tall\Cms\Helpers\ChunkIterator;
use Tall\Cms\Models\Make;
use Tall\Orm\Http\Livewire\ImportComponent;
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Contracts\IMenuSub;

class CsvComponent extends ImportComponent
{
    use WithFileUploads;
    /**
     * @var $file Illuminate\Http\UploadedFile
     */
    public $file;

    public $showDrawer = false;


    public function mount(Make $model)
    {
        $this->setFormProperties($model);
        
    }

    public function toggleDrawer()
    {
        $this->showDrawer = !$this->showDrawer;
        $this->reset(['file','fileHeaders', 'columnMaps','requiredColumnMaps']);
        
    }

    public function updatedFile()
    {
        $this->validateOnly('file');

        $csv = $this->readCsv;

        $this->fileHeaders = $csv->getHeader();

        // $headers = $csv->getHeader();

        // $this->fileHeaders = collect($headers)->filter(function($header){

        //     return !in_array($header, ['deleted_at','created_at','updated_at','slug']);

        // })->toArray();


        $this->setColumnsProperties();

        $this->resetValidation();

    }

  public function readCsv($path)
  {
    $strem = fopen($path, 'r');

    $csv = Reader::createFromStream($strem);

    $csv->setHeaderOffset(0);

    return $csv;

  }

  public function getReadCsvProperty()
  {
    return $this->readCsv($this->file->getRealPath());
  }

  public function getCsvRecordsProperty()
  {
    return Statement::create()->process($this->readCsv);
  }

    public function rules()
    {
        $columnRules = collect($this->requiredColumnMaps)->mapWithKeys(fn($column)=>[sprintf('columnMaps.%s',$column)=>['required']])->toArray();
      
        return array_merge($columnRules, [

            'file'=>['required','mimes:csv','max:51200']

        ]);
    }

    public  function array_not_unique( $a = array() )
    {
      return array_diff_key( $a , array_unique( $a ) );
    }

    public function import()
    {
        
         $columnMaps = array_filter($this->columnMaps);

        if($dupliacates = $this->array_not_unique($columnMaps)){
            foreach ($dupliacates as $key => $value) {
                $this->addError(sprintf("columnMaps.%s",$key), sprintf("O %s esta selecionado em %s", $value, $key));
            }
            return false;
        }
        $this->validate();

    
      //  $import = $this->createImport();

        $batches = collect(

            (new ChunkIterator($this->csvRecords->getRecords(), 1000))->get()

        )->map(function($chunk){
           
            return $chunk;

        })->toArray();

        
        $tenant = get_tenant();
        $menus_subs = [];
        $parents = [];
        foreach ($batches as $batche) {
         

          foreach ($batche as $value) {
           
            $menu = app(IMenu::class)->whereName(data_get($value,'m'))->first();
            $data = [];
           
            foreach($columnMaps as $to => $from){

              $data[$to] = data_get($value, $from);

            }

  
            if($parent = data_get($value, 'parent')){
             
              if((int)$parent){
              
                  $model = $parents[$parent];

                  if($model){
                    $data['menu_sub_id'] = $model;
                  }

              }

            }

            if($ordering = data_get($value, 'ordering')){
             
              if(!(int)$ordering){
               $data['ordering'] = 0 ;
              }

            }

            $menus_sub =   app()->make(IMenuSub::class)->firstOrCreate([
              'name' => data_get($data, 'name'),
            ],$data);


            $parents[data_get($value, 'id')] = $menus_sub->id;
            

            if($menu){
              $menu->sub_menus()->attach($menus_sub->id);
            }

            $menus_subs[] = $menus_sub->id;

            }
          }
          
        $tenant->hasMenusSub()->sync($menus_subs);
        
        $this->reset(['file','fileHeaders', 'columnMaps','requiredColumnMaps']);

        $this->showDrawer = false;

        $this->emit('refreshImport', null);
        
        
    }
   /**
    * return MakeImport
    */
    public function createImport(): mixed
    {
       return auth()->user()->imports()->create(
                [

                    'file_path'=> $this->file->getRealPath(),

                    'file_name'=> $this->file->getClientOriginalName(),

                    'model' => $this->model->model,

                    'total_rows' => count($this->csvRecords),

                ]
            );
    }

    public function validationAttributes()
    {
        return collect($this->requiredColumnMaps)->mapWithKeys(function($column){
            return [sprintf('columnMaps.%s', $column)=>$this->requiredColumnMaps[$column] ?? $column];
        })->toArray();
    }
        

    public function getColumnsProperty()
    {   
        return $this->columnMaps;
    }

    /*
    |--------------------------------------------------------------------------
    |  Features view
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do de nomes e rotas
    |
    */
    protected function view($component="-component"){
      return "tall::admin.menus.sub.import.csv-component";
     }
}
