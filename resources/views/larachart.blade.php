@extends('layouts.admin')

@section('contenido')
  <div class="row" >
    <span  class="border-yellow">
    <div id="chart-div"></div>
      <?= $lava->render('DonutChart', 'Popularity', 'chart-div') ?>
    </span>
    </div>
  
 
  <div class="row mt-4">
    <div class="col-xl-6 border-yellow">
      <div id="chart-div2" class="mt-4"></div>
        <?= $lava2->render('ComboChart', 'Popularity2', 'chart-div2') ?>
      </div>
    
  </div>
  
  <?= $lava->renderAll(); ?>
  
@endsection

<div id="app">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
      </div>
      <div class="col-xl-6">
       <cambio />
      </div>
    </div>
  </div>
  </div>
