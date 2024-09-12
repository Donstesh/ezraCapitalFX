@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Plans</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Plans</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Pricing 1 - Bootstrap Brain Component -->
    <div class="container d-flex justify-content-center">
        <h1>Pricing</h1>
    </div>

    <section class="bsb-pricing-1 bg-light py-3 py-md-5 py-xl-8">
    <div class="row">
    <div class="container d-flex justify-content-center">
        <h3>Trading</h3>
    </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="col-12 col-lg-12">
            <div class="row justify-content-xl-end">
            <div class="col-12 col-xl-11">
                <div class="row justify-content">
                <div class="col-12 col-md-3">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Bronze</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>200+</strong> Pairs</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Leverage</strong> Upto 1:500</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Spreads</strong> 1.2 pips</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Silver</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>300+</strong> Pairs</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Leverage</strong> Upto 1:500</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Spreads</strong> 0.8 pips</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Gold</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>400+</strong> Pairs</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Leverage</strong> Upto 1:500</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Swap Fees</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Spreads</strong>from 0.8 pips</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Platinum</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>500+</strong> Pairs</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Swap Fees</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Leverage</strong> Upto 1:500</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Spreads</strong> from 0.3 pips</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Choose Plan</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="bsb-pricing-1 bg-light py-3 py-md-5 py-xl-8">
    <div class="row">
    <div class="container d-flex justify-content-center">
        <h3>Signals</h3>
    </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="col-12 col-lg-12">
            <div class="row justify-content-xl-end">
            <div class="col-12 col-xl-11">
                <div class="row justify-content">
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Gold</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>+25%</strong> Signal Strength</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Purchase Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Silver</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>+15%</strong> Signal Strength</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Purchase Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Bronze</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>+5%</strong> Signal Strength</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Purchase Plan</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="bsb-pricing-1 bg-light py-3 py-md-5 py-xl-8">
    <div class="row">
    <div class="container d-flex justify-content-center">
        <h3>Mining</h3>
    </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="col-12 col-lg-12">
            <div class="row justify-content-xl-end">
            <div class="col-12 col-xl-11">
                <div class="row justify-content">
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Bronze</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>100</strong> TH/s</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Downtime</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>~1</strong> Antiminer S19</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Duration</strong> 1 Month</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Electricity Cost</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Purchase Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Silver</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>250</strong> TH/s</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Downtime</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>~2.5</strong> Antiminer S19</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Duration</strong> 1 Month</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Electricity Cost</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Purchase Plan</a>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                    <div class="card-body ">
                        <h2 class="h4 mb-2">Gold</h2>
                        <h4 class=" fw-bold text-primary mb-0">$149</h4>
                        <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>1000</strong> TH/s</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Downtime</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>~10</strong> Antiminer S19</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>Duration</strong> 1 Month</span>
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            <span><strong>No</strong> Electricity Cost</span>
                        </li>
                        </ul>
                        <a href="#!" class="btn bsb-btn-xl btn-primary rounded-pill">Purchase Plan</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    </main><!-- End #main -->
@endsection
