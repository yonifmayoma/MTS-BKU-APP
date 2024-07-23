@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Site</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row row-card-no-pd">
                <div class="col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body d-flex">
                            <div class="numbers">
                                <h1 class="card-title-tt">Tower Power</h1>
                                <h1 class="card-title-tt">Trouble Ticket</h1>
                                <p class="card-category-tt">Number</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('topotroubleticket.index') }}" class="card-link">
                        <div class="card card-secondary bg-secondary-gradient" style="height: 250px;">
                            <div
                                class="card-body-tt bubble-shadow d-flex flex-column justify-content-center align-items-center">
                                <h1 class="card-title-ticket">ON PROGGRESS</h1>
                                <hr class="separator-ticket">
                                <p class="card-description-ticket">23/30</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="card-link">
                        <div class="card card-secondary bg-success-gradient" style="height: 250px;">
                            <div
                                class="card-body-tt curves-shadow d-flex flex-column justify-content-center align-items-center">
                                <h1 class="card-title-ticket">CLOSED</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-card-no-pd">
                <div class="col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body d-flex">
                            <div class="numbers">
                                <h1 class="card-title-tt">SiAR</h1>
                                <h1 class="card-title-tt">Trouble Ticket</h1>
                                <p class="card-category-tt">Number</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('siartroubleticket.index') }}" class="card-link">
                        <div class="card card-secondary bg-secondary-gradient" style="height: 250px;">
                            <div
                                class="card-body-tt bubble-shadow d-flex flex-column justify-content-center align-items-center">
                                <h1 class="card-title-ticket">ON PROGGRESS</h1>
                                <hr class="separator-ticket">
                                <p class="card-description-ticket">23/30</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="card-link">
                        <div class="card card-secondary bg-success-gradient" style="height: 250px;">
                            <div
                                class="card-body-tt curves-shadow d-flex flex-column justify-content-center align-items-center">
                                <h1 class="card-title-ticket">CLOSED</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
