@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Trading Room</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Trading Room</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

       <!-- Left side columns -->
       <div class="col-lg-1">
            <div class="row">

                <a href="{{url('trading-room')}}">
                    <div class="icon" style="background-color: orange; padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                        <i class="bx bxs-layout" style="color: white;"></i>
                        <div class="label" style="color: white;">Trade Room</div>
                    </div>
                </a>
                <a href="{{url('open-trade')}}">
                    <div class="icon" style="background-color: green; padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                        <i class="bx bxs-log-in" style="color: white;"></i>
                        <div class="label" style="color: white;">Open Trades</div>
                    </div>
                </a>
                <a href="{{url('close-trade')}}">
                    <div class="icon" style="background-color: purple; padding: 10px; border-radius: 8px;">
                        <i class="bx bxs-log-out" style="color: white;"></i>
                        <div class="label" style="color: white;">Closed Trades</div>
                    </div>
                </a>
            </div>
        </div><!-- End Left side columns -->


        <!-- Right side columns -->
        <div class="col-lg-3">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Open<span> |Trades</span></h5>

              <div class="activity">

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End second columns -->

        <div class="col-lg-6" style="height: 500px;">

            <!-- Trading chart -->

            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container" style="height:100%;width:100%">
            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
            {
            "autosize": true,
            "symbol": "OANDA:XAUUSD",
            "interval": "15",
            "timezone": "Etc/UTC",
            "theme": "light",
            "style": "1",
            "locale": "en",
            "hide_legend": true,
            "allow_symbol_change": true,
            "save_image": false,
            "calendar": false,
            "support_host": "https://www.tradingview.com"
            }
            </script>
            </div>
            <!-- TradingView Widget END -->

        </div><!-- End trading chart Activity -->


        <div class="col-lg-2">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link  w-100 active" id="table1-tab" data-bs-toggle="tab" data-bs-target="#table1" type="button" role="tab" aria-controls="table1" aria-selected="true" >TIMED</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="table2-tab" data-bs-toggle="tab" data-bs-target="#table2" type="button" role="tab" aria-controls="table2" aria-selected="false">UNTIMED</button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Table 1 -->
                            <div class="tab-pane fade justify-items-center show active" id="table1" role="tabpanel" aria-labelledby="table1-tab">
                                <div class="d-flex justify-content-center">
                                    <form class="row g-3 needs-validation" novalidate style="max-width: 400px; width: 100%;">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Amount (ACWI)</label>
                                            <div class="input-group has-validation">
                                                <input type="number" name="username" class="form-control" id="yourUsername" value="0.00" required>
                                                <div class="invalid-feedback">Please enter Amount!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Leverage (500 MAX)</label>
                                            <input type="number" name="password" class="form-control" id="yourPassword" value="500" required>
                                            <div class="invalid-feedback">Please enter leverage!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Time (Minutes)</label>
                                            <input type="number" name="password" class="form-control" id="yourPassword" value="2" required>
                                            <div class="invalid-feedback">Please enter time!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-success w-100" type="submit">BUY</button>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-danger w-100" type="submit">SELL</button>
                                        </div>

                                    </form>
                                </div>

                            </div>

                            <!-- Table 2 -->
                            <div class="tab-pane fade" id="table2" role="tabpanel" aria-labelledby="table2-tab">
                            <div class="d-flex justify-content-center">
                                    <form class="row g-3 needs-validation" novalidate style="max-width: 400px; width: 100%;">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Amount (ACWI)</label>
                                            <div class="input-group has-validation">
                                                <input type="number" name="username" class="form-control" id="yourUsername" value="0.00" required>
                                                <div class="invalid-feedback">Please enter Amount!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Leverage (500 MAX)</label>
                                            <input type="number" name="password" class="form-control" id="yourPassword" value="500" required>
                                            <div class="invalid-feedback">Please enter leverage!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">SL (USD)</label>
                                            <input type="number" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter stop loss!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">TP (USD)</label>
                                            <input type="number" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter take profit!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-success w-100" type="submit">BUY</button>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-danger w-100" type="submit">SELL</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

      </div>
    </section>

    </main><!-- End #main -->
@endsection
