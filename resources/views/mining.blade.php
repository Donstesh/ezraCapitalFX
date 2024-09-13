@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Mining</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Mining</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
       <div class="col-lg-4">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-12 col-md-12">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                        <h5 class="card-title">MINING <span>|BALANCE </span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                            <h6>$0</h6>

                            </div>
                        </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-lg-12">
                        <div class="card-body">
                            <div class="d-flex justify-content-between gap-2">
                                <div class="col">
                                    <a href="{{url('mining-plans')}}" class="btn btn-outline-success w-100" type="submit">PLANS</a>
                                </div>
                                <div class="col">
                                    <a href="{{url('withdrawal')}}" class="btn btn-outline-success w-100" type="submit">WITHDRAWALS</a>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="col-lg-12" style="height: 250px;">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                    {
                    "symbols": [
                        [
                        "COINBASE:BTCUSD|12M"
                        ]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "100%",
                    "locale": "en",
                    "colorTheme": "light",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "12m|1D"
                    ]
                    }
                    </script>
                    </div>
                    <!-- TradingView BTC END -->
                </div>

                <div class="col-lg-12" style="height: 250px;">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                    {
                    "symbols": [
                        [
                        "COINBASE:LTCUSD|12M"
                        ]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "100%",
                    "locale": "en",
                    "colorTheme": "light",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "12m|1D"
                    ]
                    }
                    </script>
                    </div>
                    <!-- TradingView LTC END -->
                </div>
            </div>
        </div><!-- End Left side columns -->


        <!-- Right side columns -->
        <div class="col-lg-6">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Open<span> |Trades</span></h5>

              <div class="activity">

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End second columns -->

      </div>
    </section>

    </main><!-- End #main -->
@endsection
