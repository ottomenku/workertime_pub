@extends($viewpar['template'].'.backendVue')

@section('content')

<style>
    .table th, .table td {
        padding: 0.25rem;
      }

      [class*="col-"],  /* Elements whose class attribute begins with "col-" */
      [class^="col-"] { /* Elements whose class attribute contains the substring "col-" */
        padding-left: 5px;
        padding-right: 0;
      }

</style>
<div  class="col-md-9">
    <div class="card">
        <div class="card-header">{{ $viewpar['taskheader'] ?? $viewpar['app_name'] ?? $viewpar['route'] ?? 'index' }}
        </div>
        <div class="card-body"> 
                <br>
  <!-- vue applikáció------------------------------------------------------>                     
    <div id="app"> 
      <!-- modal button----------------------------->
      <div  class="float-right"><i style="color:blue;font-size:2rem;"
              v-on:click="showModalInfo()"class="fa fa-info-circle"></i> 
      </div>
      
      
      <!-- modal info------------------------------->
        <modal v-if="showInfo" @close="showInfo = false">    
        <div slot="body">  
        info szöveg
        </div>
        </modal>   
      
  <!-- modal-------->
          <modal v-if="showModal" @close="showModal = false">
              <div slot="body">            
  @include('mocalendarVue.inc.showstored')  
              </div>
          </modal>

   <!--  panel---------------------------------------------------------------------->                 
   <div class="container">
   <ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
        <a class="nav-link" @click.prevent="setActive('home')" :class="{ active: isActive('home') }" href="#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" @click.prevent="setActive('stored')" :class="{ active: isActive('stored') }" href="#stored">Havi zárások</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" @click.prevent="setActive('form')" :class="{ active: isActive('form') }" href="#form">Új bejegyzés</a>
      </li>   
  </ul>        
  <div class="tab-content py-3" id="myTabContent">
    <div class="tab-pane fade" :class="{ 'active show': isActive('home') }" id="home">Home content </div>
    <div class="tab-pane fade" :class="{ 'active show': isActive('form') }" id="form">
@include('mocalendarVue.inc.daytime_form')
      <div class="row"> 
        <div class="col-md-9">
          <input type="file" v-on:change="onfileInputChange" class="form-control">
        </div>
        
          <button class=" btn btn-primary" v-on:click="fileupload()" style="margin:2px;">           
            <i class="fa fa-save"></i>
        </button> 
        <button class=" btn btn-danger" v-on:click="filesreset()" style="margin:2px;">     
            <i class="fa fa-trash"></i>
        </button>  
        </div>
     
    </div>
    <!-- stored ---------------------------------------------------------------------->        
    <div class="tab-pane fade" :class="{ 'active show': isActive('stored') }" id="stored">
        <div class="table-responsive">
  @include('mocalendarVue.inc.stored_table')                             

    </div>
        
  </div> 
   </div>     
<!-- funkció gombok -------------------------------------------------->
@include('mocalendarVue.inc.ev_ho',['refreshTask' => "freshdata"])
<!-- calendar ---------------------------------------------------------------->
@include('mocalendarVue.inc.calendar_dev')                             
        </div>
      </div> 
    </div>
</div>

@include('mocalendarVue.inc.modal_template')
@endsection

