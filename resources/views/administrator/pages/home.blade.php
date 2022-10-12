@extends('administrator.templates.master', [
    'activeMenu' => 'homepage homepage',
    'title'      => 'Página inicial'
])

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="chart-data-selector" id="salesSelectorWrapper">
                                <h2>
                                    Sales:
                                    <strong>
                                        <select class="form-control" id="salesSelector">
                                            <option value="Porto Admin" selected>Porto Admin</option>
                                            <option value="Porto Drupal">Porto Drupal</option>
                                            <option value="Porto Wordpress">Porto Wordpress</option>
                                        </select>
                                    </strong>
                                </h2>

                                <div id="salesSelectorItems" class="chart-data-selector-items mt-3">
                                    <!-- Flot: Sales Porto Admin -->
                                    <div class="chart chart-sm chart-active" data-sales-rel="Porto Admin" id="flotDashSales1"
                                         style="height: 203px;"></div>

                                    <!-- Flot: Sales Porto Drupal -->
                                    <div class="chart chart-sm chart-hidden" data-sales-rel="Porto Drupal"
                                         id="flotDashSales2"></div>

                                    <!-- Flot: Sales Porto Wordpress -->
                                    <div class="chart chart-sm chart-hidden" data-sales-rel="Porto Wordpress"
                                         id="flotDashSales3"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <div class="row mb-3">
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-primary mb-3">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Support Questions</h4>
                                        <div class="info">
                                            <strong class="amount">1281</strong>
                                            <span class="text-primary">(14 unread)</span>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-muted text-uppercase" href="#">(view all)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-secondary">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-secondary">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Profit</h4>
                                        <div class="info">
                                            <strong class="amount">$ 14,890.30</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-muted text-uppercase" href="#">(withdraw)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-tertiary mb-3">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-tertiary">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Today's Orders</h4>
                                        <div class="info">
                                            <strong class="amount">38</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-muted text-uppercase" href="#">(statement)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-quaternary">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-quaternary">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Today's Visitors</h4>
                                        <div class="info">
                                            <strong class="amount">3765</strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-muted text-uppercase" href="#">(report)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-4 mt-2">
        <div class="col-lg-6 col-xl-3">
            <section class="card card-transparent">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">My Stats</h2>
                </header>
                <div class="card-body">
                    <section class="card">
                        <div class="card-body">
                            <div class="small-chart float-end" id="sparklineBarDash"></div>
                            <div class="h4 font-weight-bold mb-0">488</div>
                            <p class="text-3 text-muted mb-0">Average Profile Visits</p>
                        </div>
                    </section>
                    <section class="card">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="45"
                                     data-plugin-options='{ "barColor": "#2baab1", "delay": 300, "size": 50, "lineWidth": 4 }'>
                                    <strong>Average</strong>
                                    <label><span class="percent">45</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">12</div>
                            <p class="text-3 text-muted mb-0">Working Projects</p>
                        </div>
                    </section>
                    <section class="card">
                        <div class="card-body">
                            <div class="small-chart float-end" id="sparklineLineDash"></div>
                            <div class="h4 font-weight-bold mb-0">89</div>
                            <p class="text-3 text-muted mb-0">Pending Tasks</p>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
@stop

@push('page-js')
    <script src="{{ asset('js/administrator/dashboard.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
@endpush