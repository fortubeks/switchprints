@extends('switchprints.layouts.app')
@push('styles')
  <link rel="stylesheet" href="{{ asset('switchprints') }}/css/dashboard.css" />
@endpush
@section('content')

<div class="dashboard">
@include('switchprints.layouts.navigation')
<main class="dashboard-content">
        <header class="content">
          <a class="dashboard2">Dashboard</a>
          <div class="user-3296-2-wrapper">
            <img
              class="user-3296-2-icon"
              loading="lazy"
              alt=""
              src="{{ asset('switchprints') }}/public/user3296-2.svg"
            />
          </div>
        </header>
        <section class="order-content-wrapper">
          <div class="order-content">
            <div class="pending-orders-container">
              <div class="pending-orders-wrapper">
                <div class="main-content-wrapper">
                  <div class="main-content">
                    <div class="pending-orders-header">
                      <a class="pending-orders">Pending Orders</a>
                      <div class="pending-order-actions">
                        <div class="empty-sales-detail">67656</div>
                        <div class="div">+67%</div>
                      </div>
                    </div>
                    <div class="pending-orders-header">
                      <a class="view-orders">View orders</a>
                      <div class="create-order">Create order</div>
                    </div>
                    <div class="main-content-child"></div>
                    <div class="header">
                      <img
                        class="vector-icon11"
                        loading="lazy"
                        alt=""
                        src="{{ asset('switchprints') }}/public/vector-11.svg"
                      />
                    </div>
                  </div>
                </div>
                <div class="customer-management">
                  <div class="customer-content">
                    <div class="customer-item-parent">
                      <div class="pending-orders-header">
                        <a class="customer4">Customer</a>
                        <div class="pending-order-actions">
                          <div class="empty-sales-detail">67656</div>
                          <div class="empty-view-orders">-32%</div>
                        </div>
                      </div>
                      <div class="pending-orders-header">
                        <a class="view-customers">View customers</a>
                        <div class="add-customer">Add customer</div>
                      </div>
                    </div>
                    <div class="customer-icon-container">
                      <div class="customer-icon-container-child"></div>
                      <img
                        class="vector-icon12"
                        loading="lazy"
                        alt=""
                        src="{{ asset('switchprints') }}/public/vector-12.svg"
                      />
                    </div>
                  </div>
                </div>
                <div class="main-content-parent">
                  <div class="main-content1">
                    <div class="pending-orders-header">
                      <a class="revenue">Revenue</a>
                      <div class="revenue-value">
                        <div class="n7656">N7656</div>
                        <div class="empty-view-orders">-32%</div>
                      </div>
                    </div>
                    <a class="view-sales">View sales</a>
                  </div>
                  <div class="money-container">
                    <div class="customer-icon-container-child"></div>
                    <img
                      class="money-icon"
                      loading="lazy"
                      alt=""
                      src="{{ asset('switchprints') }}/public/money.svg"
                    />
                  </div>
                </div>
              </div>
              <div class="orders-icon-container">
                <div class="orders-icon-container-child"></div>
                <h3 class="total-orders">Total Orders</h3>
                <div class="this-month">550+ this month</div>
              </div>
            </div>
            <div class="total-order-icon-wrapper">
              <img
                class="total-order-icon"
                loading="lazy"
                alt=""
                src="{{ asset('switchprints') }}/public/vector-71.svg"
              />
            </div>
            <div class="component-9-parent">
              <div class="component-9">
                <div class="component-9-child"></div>
                <div class="table-headers">
                  <div class="table-headers-child"></div>
                  <h3 class="orders-due-this">Orders Due This Week</h3>
                  <div class="order-name-header">
                    <div class="orders-due">50 orders due</div>
                  </div>
                </div>
                <div class="table-headers1">
                  <div class="date">Date</div>
                  <div class="name">Name</div>
                  <div class="amount">Amount</div>
                  <div class="table-headers-item"></div>
                  <div class="collection-date">Collection Date</div>
                  <div class="completion">Completion</div>
                </div>
                <div class="component-9-item"></div>
                <div class="table-headers2">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="amount-headers">13:00</div>
                    </div>
                  </div>
                  <div class="completion-progress-bar-header">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-wrapper">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="collection-date-headers-parent">
                    <div class="collection-date-headers">12-08-24</div>
                    <div class="collection-date-header">
                      <div class="collection-amount-headers">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="frame-div">
                    <div class="completion-date-headers-parent">
                      <div class="completion-date-headers">60%</div>
                      <div class="completion-status-labels">
                        <div class="progress-bar">
                          <div class="progress-bar-child"></div>
                          <div class="progress-indicator"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers3">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="completion-progress-bar-header">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="table-headers-inner1">
                    <div class="completion-date-headers-parent">
                      <div class="div5">100%</div>
                      <div class="completion-status-labels">
                        <div class="frame-item"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers4">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="completion-progress-bar-header">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="frame-div">
                    <div class="completion-date-headers-parent">
                      <div class="div10">60%</div>
                      <div class="completion-status-labels">
                        <div class="rectangle-parent">
                          <div class="frame-inner"></div>
                          <div class="frame-child1"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers5">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="completion-progress-bar-header">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="table-headers-inner1">
                    <div class="completion-date-headers-parent">
                      <div class="div15">10%</div>
                      <div class="completion-status-labels">
                        <div class="rectangle-group">
                          <div class="frame-child2"></div>
                          <div class="chart-elements"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers6">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="completion-progress-bar-header">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="order-date-header">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="table-headers-inner1">
                    <div class="completion-date-headers-parent">
                      <div class="div20">50%</div>
                      <div class="completion-status-labels">
                        <div class="rectangle-container">
                          <div class="frame-child3"></div>
                          <div class="frame-child4"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="component-91">
                <div class="component-9-child"></div>
                <div class="overview-header">
                  <div class="overview-header-child"></div>
                  <h3 class="orders-overview">Orders Overview</h3>
                  <div class="this-month1">550+ this month</div>
                </div>
                <div class="overview-content">
                  <div class="order-progress">
                    <div class="third-progress-bar">
                      <div class="agagda-design-ready">Agagda Design ready</div>
                    </div>
                    <div class="design-progress">
                      <div class="status-icon"></div>
                      <div class="progress-container">
                        <div class="progress-badge">
                          <div class="div21">12-08-24</div>
                          <div class="new-order-5654567">
                            New order #5654567
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flap-design-container">
                      <div class="flap-design-progress">
                        <div class="flap-design-icons">
                          <div class="progress-bar-elements"></div>
                          <div class="progress-bar-elements"></div>
                        </div>
                      </div>
                      <div class="flap-design-status">
                        <div class="order-number-wrapper">
                          <div class="order-number">12-08-24</div>
                        </div>
                        <div class="flap-design-message">
                          <div class="flap-design-is">
                            Flap design is processing
                          </div>
                          <div class="processing-time">12-08-24</div>
                        </div>
                        <div class="flap-design-is">
                          Agagda design is processing
                        </div>
                      </div>
                    </div>
                    <div class="second-progress">
                      <div class="agagda-design-progress">
                        <div class="completed-marker"></div>
                      </div>
                      <div class="processing-order-name">
                        <div class="div22">12-08-24</div>
                        <div class="flap-design-container1">
                          <div class="flap-design-is">New order #5654567</div>
                          <div class="processing-time">12-08-24</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
<!-- Content end --> 
@endsection