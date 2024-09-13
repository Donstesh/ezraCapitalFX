@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Open Trades</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Open Trades</li>
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
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Open<span> |Trades</span></h5>

              <div class="activity">

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End second columns -->

        <div class="col-lg-7" style="height: 500px;">

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

      </div>
    </section>

    </main><!-- End #main -->
@endsection
