@extends('layouts.app')
@php
$about_title_bg = "style='background-image:url(/assets/images/about-01.png)'";
@endphp

@section('content')
<main id="main" class="site-main" >
    <section class="breadcrumbs-custom bg-image context-dark">
            <div class="breadcrumbs-custom-inner">
                <div class="container breadcrumbs-custom-container">
                    <div class="breadcrumbs-custom-main" >
                        <h1 class="breadcrumbs-custom-title">{{__('Sale Conditions')}}</h1>
                    </div>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{ route('home')}}">{{__('Home')}}</a></li>
                        <li class="active"><a href=""></a>{{__('Sale Conditions')}}</li>
                    </ul>
                </div>
             </div>
        </section>
    
    <!-- Faq Area Start -->
 <section id="faq" class="faq">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 col-lg-4">
      <ol>
            <li>
            Préambule
            </li>
            <li>
            Objet
            </li>
            <li>
            Définitions
            </li>
            <li>
            Définitions
            </li>
            <li>
            Passer une commande
            </li>
            <li>
            Prix
            </li>
            <li>
            Exécution de la commande
            </li>
            <li>
            Livraison
            </li>
            <li>
            Mode de paiement 
            </li>
            <li>
            Confidentialité des données
            </li>
            <li>
            Annuler une commande
            </li>
            <li>
            Droit de rétractation
            </li>
            <li>
            Garantie 
            </li>
            <li>
            Preuve des transactions
            </li>
            <li>
            Force majeure
            </li>
        </ol>
      </div>
        <div >
            <p>

            </p>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="panel-group accordion" id="accordion-1">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id1" aria-controls="id1" class="panel-title">
                       1.Préambule
                        </h4>
                    </div>
                    <div id="id1" class="panel-collapse collapse show" aria-labelledby="id1" data-parent="#accordion-1">
                        <div class="panel-body">

                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id2" aria-controls="id2" class="panel-title">
                       2.Objet
                        </h4>
                    </div>
                    <div id="id2" class="panel-collapse collapse show" aria-labelledby="id2" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id3" aria-controls="id3" class="panel-title">
                        3.Définitions
                        </h4>
                    </div>
                    <div id="id3" class="panel-collapse collapse show" aria-labelledby="id3" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id4" aria-controls="id4" class="panel-title">
                        4.Produit
                        </h4>
                    </div>
                    <div id="id4" class="panel-collapse collapse show" aria-labelledby="id4" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id5" aria-controls="id5" class="panel-title">
                        5.Passer une commande
                        </h4>
                    </div>
                    <div id="id5" class="panel-collapse collapse show" aria-labelledby="id5" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id6" aria-controls="id6" class="panel-title">
                        6.Prix
                        </h4>
                    </div>
                    <div id="id6" class="panel-collapse collapse show" aria-labelledby="id6" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id7" aria-controls="id7" class="panel-title">
                        7.Exécution de la commande
                        </h4>
                    </div>
                    <div id="id7" class="panel-collapse collapse show" aria-labelledby="id7" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id8" aria-controls="id8" class="panel-title">
                        8.Livraison
                        </h4>
                    </div>
                    <div id="id8" class="panel-collapse collapse show" aria-labelledby="id8" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id9" aria-controls="id9" class="panel-title">
                        9.Mode de paiement 
                        </h4>
                    </div>
                    <div id="id9" class="panel-collapse collapse show" aria-labelledby="id9" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id10" aria-controls="id10" class="panel-title">
                        10.Confidentialité des données   
                        </h4>
                    </div>
                    <div id="id10" class="panel-collapse collapse show" aria-labelledby="id10" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id11" aria-controls="id11" class="panel-title">
                       11.Annuler une commande payée par carte bancaire  
                        </h4>
                    </div>
                    <div id="id11" class="panel-collapse collapse show" aria-labelledby="id11" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id12" aria-controls="id12" class="panel-title">
                        12.Droit de rétractation
                        </h4>
                    </div>
                    <div id="id12" class="panel-collapse collapse show" aria-labelledby="id12" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id13" aria-controls="id13" class="panel-title">
                        13.Garantie 
                        </h4>
                    </div>
                    <div id="id13" class="panel-collapse collapse show" aria-labelledby="id13" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id14" aria-controls="id14" class="panel-title">
                        14.Preuve des transactions payés par carte bancaire
                        </h4>
                    </div>
                    <div id="id14" class="panel-collapse collapse show" aria-labelledby="id14" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" aria-expanded="true" data-target="#id15" aria-controls="id15" class="panel-title">
                        15.Force majeure       
                        </h4>
                    </div>
                    <div id="id15" class="panel-collapse collapse show" aria-labelledby="id15" data-parent="#accordion-1">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<!-- Faq Area End -->

</main><!-- .site-main -->
@endsection

@section('css')
    
<style>
.faq {
  padding: 30px 0px 80px;
}

.faq .search-faq {
  position: relative;
  margin-bottom: 40px;
}

.faq .search-faq .form-control {
  width: 100%;
  height: 40px;
  padding-right: 50px;
}

.faq .search-faq .form-control:focus {
  border-color: #983ce9;
}

.faq .search-faq button {
  position: absolute;
  top: 0px;
  right: 0px;
  height: 40px;
  width: 40px;
  border: 0px;
  background: none;
  color: #777;
}

.faq .search-faq button:focus {
  outline: none;
}

.faq .accordion .panel {
  margin-bottom: 20px;
  background: #fff;
  border-radius: 3px;
  box-shadow: rgba(36, 37, 38, 0.15) 4px 4px 30px 0px;
  overflow: hidden;
}

.faq .accordion .panel .panel-body {
  padding: 4px 20px 20px;
}

.faq .accordion .panel-title {
  display: block;
  width: 100%;
  padding: 15px 20px 15px 20px;
  font-size: 21px;
  line-height: 31px;
  font-weight: 600;
  margin-bottom: 0px;
  position: relative;
  cursor: pointer;
}

.faq .accordion .panel-title::after {
  position: absolute;
  content: "";
  width: 40px;
  height: 100%;
  border-radius: 3px 0px 0px 3px;
  right: 0;
  top: 0;
  text-align: center;
}

.faq .accordion .panel-title i {
  position: absolute;
  font-weight: 900;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  text-align: center;
  z-index: 1;
  font-size: 16px;
  transition: 0.3s ease-in;
}

.faq .accordion .panel-title[aria-expanded=true] i {
  font-weight: 900;
}

</style>

@endsection
