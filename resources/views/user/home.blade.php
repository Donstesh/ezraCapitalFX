@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
        @if ($status === 'pending')
            <h5 class="card-title"></h5>

            <div class="col-xxl-5 col-md-7">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Account <span>| KYC Status </span></h5>
                        <h4 class="justify-content-center fst-italic" style="color: red;">Not Verified
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.293 4.293a1 1 0 0 1 1.414 0L8 5.586l2.293-1.293a1 1 0 0 1 1.414 1.414L9.414 7l2.293 2.293a1 1 0 0 1-1.414 1.414L8 8.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L6.586 7 4.293 4.707a1 1 0 0 1 0-1.414z"/>
                            </svg>
                        </h4>
                        <a href="{{url('kyc')}}">Verify Now</a>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TRADING <span>|BALANCE </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                        <h6>${{ $user_balance->amount ?? '0.00' }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">NET <span>|  PROFIT/LOSS </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                        <h6>${{ $user_balance->amount ?? '0.00' }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">TODAYS <span>|  PROFIT/LOSS </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-date"></i>
                    </div>
                    <div class="ps-3">
                        <h6>${{ $user_balance->amount ?? '0.00' }}</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="iconslist mb-5">
                <a href="{{url('deposit')}}">
                    <div class="icon" style="background-color: blue; padding: 10px; border-radius: 8px;">
                        <i class="bx bx-dollar-circle" style="color: white;"></i>
                        <div class="label" style="color: white;">FUND ACCOUNT </div>
                    </div>
                </a>
                <a href="{{url('copy-trading')}}">
                    <div class="icon" style="background-color: orange; padding: 10px; border-radius: 8px;">
                        <i class="bx bxs-copy" style="color: white;"></i>
                        <div class="label" style="color: white;">COPY EXPERTS</div>
                    </div>
                </a>
                <a href="{{url('mining')}}">
                    <div class="icon" style="background-color: green; padding: 10px; border-radius: 8px;">
                        <i class="bx bxs-bank" style="color: white;"></i>
                        <div class="label" style="color: white;">ASSET MARKET</div>
                    </div>
                </a>
                <a href="{{url('trading-room')}}">
                    <div class="icon" style="background-color: purple; padding: 10px; border-radius: 8px;">
                        <i class="bx bx-bar-chart-square" style="color: white;"></i>
                        <div class="label" style="color: white;">TRADING ROOM</div>
                    </div>
                </a>

            </div>
            <!-- Reports -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Trades</h5>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link  w-100 active" id="table1-tab" data-bs-toggle="tab" data-bs-target="#table1" type="button" role="tab" aria-controls="table1" aria-selected="true" >Open Trades</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="table2-tab" data-bs-toggle="tab" data-bs-target="#table2" type="button" role="tab" aria-controls="table2" aria-selected="false">Closed Trades</button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Table 1 -->
                            <div class="tab-pane fade show active" id="table1" role="tabpanel" aria-labelledby="table1-tab">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th><b>Symbol</b></th>
                                            <th>Amount</th>
                                            <th>Profit</th>
                                            <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_trades_open as $trade)
                                        <tr>
                                            <td>{{ $trade->symbol }}</td>
                                            <td>${{ $trade->amount }}</td>
                                            <td>${{ $trade->profit }}</td>
                                            <td>{{ $trade->date }}</td>
                                            <td>{{ $trade->trade_status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table 2 -->
                            <div class="tab-pane fade" id="table2" role="tabpanel" aria-labelledby="table2-tab">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th><b>Symbol</b></th>
                                            <th>Amount</th>
                                            <th>Profit</th>
                                            <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_trades_closed as $trade)
                                        <tr>
                                            <td>{{ $trade->symbol }}</td>
                                            <td>${{ $trade->amount }}</td>
                                            <td>${{ $trade->profit }}</td>
                                            <td>{{ $trade->date }}</td>
                                            <td>{{ $trade->trade_status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@endsection
