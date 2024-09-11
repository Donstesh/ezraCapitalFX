@extends('layouts.frontend')

@section('content')

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">

            <div class="col-md-5 wrap col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4 mt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Trade CFDs Without Paying Swap Fees</h1>
              <p class="mb-4 mb-md-5 sub-p" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Trade swap-free on the most popular currency pairs, metals and index CFDs!*</p>
              <p><a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3">Get started</a></p>
            </div>
            <div class="col-md-7 ftco-animate">
            	<img src="{{asset('images/dashboard_full_1.png')}}" class="img-fluid" alt="">
            </div>

          </div>
        </div>
      </div>


    </section>

    <section class="ftco-section services-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Global Stock Markets commission-free</h2>
          </div>
          <div class="col-md-7 ftco-animate">
            	<img src="{{asset('images/AdGlobal.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-5 wrap col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4 mt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Invest from 1 Euro, Trade from 25 Euro</h1>
              <p class="mb-4 mb-md-5 sub-p" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hundreds of Stocks & Stock CFDs from various exchanges of the world commission-free! The offer is eligible for Trade.MT4, Trade.MT5, Invest MT5 accounts*.</p>
            </div>
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h1 class="mb-4">Trade 2500+ instruments</h1>
            </div>
        </div>
      </div>

    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">How it works</span>
            </div>
            </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" >1</strong>
                            <span style="color: white;">Register</span>
                            <p class="mb-4 mb-md-5 sub-p" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Sign up with your name and email address to start trading.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number">2</strong>
                            <span style="color: white;">Fund</span>
                            <p class="mb-4 mb-md-5 sub-p" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Start trading from $25.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number">3</strong>
                            <span style="color: white;">Trade</span>
                            <p class="mb-4 mb-md-5 sub-p" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Log in and start trading more than 500 instruments!.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3">Sign Up For Free</a>
            </div>
            </div>
    	</div>
    </section>

    <section class="ftco-section ftco-partner">
    <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-5 wrap col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4 mt-5" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">MetaTrader: The #1 tool for traders and investors worldwide</h1>
                <p class="mb-4 mb-md-5 sub-p" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Trade in 500+ trading instruments including Forex pairs, CFDs on indices, commodities, shares and ETFs. Available on Windows.</p>
            </div>
            <div class="col-md-7 ftco-animate">
            	<img src="{{asset('images/AdMetaTrader.png')}}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-5 wrap col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4 mt-5" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">MetaTrader WebTrader platform</h1>
                <p class="mb-4 mb-md-5 sub-p" style="color: white;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Trade anywhere, any time, without having to download any software. Whether you use a Mac or a PC, you can tap into to the markets via your browser hassle-free, with the WebTrader trading platform.</p>
            </div>
            <div class="col-md-7 ftco-animate">
            	<img src="{{asset('images/AdWebTrader.png')}}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3">Start Trading</a>
        </div>
        </div>
      </div>
    </section>

    <section style="padding: 40px; background-color: #f8f9fa;">
        <div class="container">
                <h2 class="mb-4 mt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Top Trading Conditions</h2>
                <p class="mb-4 mb-md-5 sub-p" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    Trade our best conditions yet, including some of the market's most competitive spreads!
                </p>

                <ul style="font-size: 16px; color: #444; list-style-type: none; padding-left: 0;">
                    <li><span style="color: green;">&#10003;</span> Leverage up to: 1:1000</li>
                    <li><span style="color: green;">&#10003;</span> Forex typical spreads from 0 pips (EURUSD), micro lots and fractional shares</li>
                    <li><span style="color: green;">&#10003;</span> Stocks CFDs — commission-free*</li>
                    <li><span style="color: green;">&#10003;</span> Free real-time charts, market news, and research</li>
                    <li><span style="color: green;">&#10003;</span> 500+ CFDs on currencies, energies, metals, indices, stocks & ETFs</li>
                </ul>

                <a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3">TRY FREE ON DEMO</a>
            </div>
    </section>


    <section class="ftco-section services-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Why Choose EZ Capital Market?</h2>
          </div>
        </div>
        <div class="row">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-cloud-computing"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">We are global</h3>
                <p>We hire top talent globally to ensure superior multilingual client support via phone, email and live chat 24/5.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
                  <span class="flaticon-guarantee"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">We are regulated</h3>
                <p>We are a securities dealer authorized by the Financial Services Authority of Seychelles.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-shield"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Funds are secured</h3>
                <p>All client deposits are held in a segregated bank account separate from our own operating funds.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-loading"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Start from $25</h3>
                <p>You can start trading from $25.</p>
              </div>
            </div>
          </div>
      </div>
    </section>
@endsection
