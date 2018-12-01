@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <script>
                        $(document).ready(function () {
                            $(".stretch-card").click(function () {
                                window.location = $(this).find("a").attr("href");
                                return false;
                            });
                        });
                    </script>

                    <style>
                        .stretch-card {
                            cursor: pointer;
                        }
                    </style>

                    <div class="row">
                        {{--           <div class="col-md-4 stretch-card grid-margin">
                                       <div class="card bg-gradient-primary card-img-holder text-white">
                                           <div class="card-body">
                                               <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                               <a href="" class="text-white"><h4>Agenda</h4></a>
                                           </div>
                                       </div>
                                   </div>--}}
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-primary card-img-holder text-white">
                                <div class="card-body">
                                    <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                    <a href="{{ route('clients') }}" class="text-white"><h4>Clients</h4></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-primary card-img-holder text-white">
                                <div class="card-body">
                                    <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                    <a href="{{ route('spending') }}" class="text-white"><h4>Dépenses</h4></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-primary card-img-holder text-white">
                                <div class="card-body">
                                    <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                    <a href="{{ route('billing.new') }}" class="text-white"><h4>Nouvelle Facture</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-primary card-img-holder text-white">
                                <div class="card-body">
                                    <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                    <a href="{{ route('settings') }}" class="text-white"><h4>Paramètre</h4></a>
                                </div>
                            </div>
                        </div>
                        {{--              <div class="col-md-4 stretch-card grid-margin">
                                          <div class="card bg-gradient-primary card-img-holder text-white">
                                              <div class="card-body">
                                                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                                  <a href="{{ route('statistique') }}" class="text-white"><h4>Statistique</h4></a>
                                              </div>
                                          </div>
                                      </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
