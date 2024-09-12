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
                      <h6>$145</h6>

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
                      <h6>$3,264</h6>

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
                      <h6>$1,244</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="iconslist mb-5">
                <a href="http://">
                    <div class="icon" style="background-color: blue; padding: 10px; border-radius: 8px;">
                        <i class="bx bx-dollar-circle" style="color: white;"></i>
                        <div class="label" style="color: white;">FUND ACCOUNT </div>
                    </div>
                </a>
                <a href="http://">
                    <div class="icon" style="background-color: orange; padding: 10px; border-radius: 8px;">
                        <i class="bx bxs-copy" style="color: white;"></i>
                        <div class="label" style="color: white;">COPY EXPERTS</div>
                    </div>
                </a>
                <a href="http://">
                    <div class="icon" style="background-color: green; padding: 10px; border-radius: 8px;">
                        <i class="bx bxs-bank" style="color: white;"></i>
                        <div class="label" style="color: white;">ASSET MARKET</div>
                    </div>
                </a>
                <a href="http://">
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
                                        <tr>
                                            <td>USDEUR</td>
                                            <td>$2150</td>
                                            <td>$87.90</td>
                                            <td>2024/29/09</td>
                                            <td>open</td>
                                        </tr>
                                        <tr>
                                            <td>XAUUSD</td>
                                            <td>$200</td>
                                            <td>$96.99</td>
                                            <td>2024/29/09</td>
                                            <td>open</td>
                                        </tr>
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
                                        <tr>
                                            <td>USDBTC</td>
                                            <td>$200</td>
                                            <td>$46.90</td>
                                            <td>2024/29/09</td>
                                            <td>closed</td>
                                        </tr>
                                        <tr>
                                            <td>USDBTC</td>
                                            <td>$200</td>
                                            <td>$46.90</td>
                                            <td>2024/29/09</td>
                                            <td>closed</td>
                                        </tr>
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
