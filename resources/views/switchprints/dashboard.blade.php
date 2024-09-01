@extends('switchprints.layouts.app')

@section('content')
<div class="dashboard">
      <img class="content-icon" alt="" src="{{ asset('switchprints') }}/public/content.svg" />

      <main class="sidebar-content">
        @include('switchprints.layouts.navigation')
        <section class="dashboard-content-wrapper">
          <div class="dashboard-content">
            <div class="dashboard-main">
              <div class="dashboard-title">
                <a class="dashboard2">Dashboard</a>
              </div>
              <div class="dashboard-body">
                <div class="orders-container">
                  <div class="main-content">
                    <div class="orders-title">
                      <div class="pending-orders">Pending Orders</div>
                      <div class="order-list">
                        <div class="empty-sales-detail">67656</div>
                        <div class="div">+67%</div>
                      </div>
                    </div>
                    <div class="orders-title">
                      <a class="view-orders">View orders</a>
                      <div class="create-order">Create order</div>
                    </div>
                  </div>
                  <div class="customer-icon-container">
                    <div class="customer-icon-container-child"></div>
                    <img
                      class="vector-icon11"
                      loading="lazy"
                      alt=""
                      src="{{ asset('switchprints') }}/public/vector-11.svg"
                    />
                  </div>
                </div>
                <div class="customer-info">
                  <div class="frame-parent">
                    <div class="customers-title-parent">
                      <div class="orders-title">
                        <a class="customer4">Customer</a>
                        <div class="order-list">
                          <div class="empty-sales-detail">67656</div>
                          <div class="empty-view-orders">-32%</div>
                        </div>
                      </div>
                      <div class="orders-title">
                        <div class="view-customers">View customers</div>
                        <div class="add-customer">Add customer</div>
                      </div>
                    </div>
                    <div class="money-container">
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
                <div class="revenue-info">
                  <div class="frame-parent">
                    <div class="main-content1">
                      <div class="orders-title">
                        <div class="new-style">Revenue</div>
                        <div class="revenue-amount">
                          <div class="n7656">N7656</div>
                          <div class="empty-view-orders">-32%</div>
                        </div>
                      </div>
                      <div class="view-sales">View sales</div>
                    </div>
                    <div class="money-container1">
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
              </div>
              <div class="orders-icon-container-wrapper">
                <div class="orders-icon-container">
                  <div class="orders-icon-container-child"></div>
                  <h3 class="total-orders">Total Orders</h3>
                  <div class="this-month">550+ this month</div>
                </div>
              </div>
              <div class="total-icon-container">
                <img
                  class="total-order-icon"
                  loading="lazy"
                  alt=""
                  src="{{ asset('switchprints') }}/public/vector-7.svg"
                />
              </div>
            </div>
            <div class="orders-due-container">
              <div class="component-9">
                <div class="component-9-child"></div>
                <div class="table-headers">
                  <div class="table-headers-child"></div>
                  <h3 class="orders-due-this">Orders Due This Week</h3>
                  <div class="name-labels">
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
                    <div class="name-headers">
                      <div class="amount-headers">13:00</div>
                    </div>
                  </div>
                  <div class="bimbo-wrapper">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-wrapper">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="collection-date-headers-parent">
                    <div class="collection-date-headers">12-08-24</div>
                    <div class="collection-name-headers">
                      <div class="collection-amount-headers">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="status-cells-wrapper">
                    <div class="status-cells">
                      <div class="completion-date-headers">60%</div>
                      <div class="progress-bar-wrapper">
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
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="bimbo-wrapper">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="frame-div">
                    <div class="status-cells">
                      <div class="div5">100%</div>
                      <div class="progress-bar-wrapper">
                        <div class="frame-child"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers4">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="bimbo-wrapper">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="status-cells-wrapper">
                    <div class="status-cells">
                      <div class="div10">60%</div>
                      <div class="progress-bar-wrapper">
                        <div class="rectangle-parent">
                          <div class="frame-item"></div>
                          <div class="frame-inner"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers5">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="bimbo-wrapper">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="frame-div">
                    <div class="status-cells">
                      <div class="div15">10%</div>
                      <div class="progress-bar-wrapper">
                        <div class="rectangle-group">
                          <div class="frame-child1"></div>
                          <div class="chart-elements"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-headers6">
                  <div class="date-headers-parent">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="bimbo-wrapper">
                    <div class="bimbo">Bimbo</div>
                  </div>
                  <div class="n56000-container">
                    <div class="n56000">N56000</div>
                  </div>
                  <div class="group">
                    <div class="date-headers">12-08-24</div>
                    <div class="name-headers">
                      <div class="div2">13:00</div>
                    </div>
                  </div>
                  <div class="table-headers-inner"></div>
                  <div class="frame-div">
                    <div class="status-cells">
                      <div class="div20">50%</div>
                      <div class="progress-bar-wrapper">
                        <div class="rectangle-container">
                          <div class="frame-child2"></div>
                          <div class="frame-child3"></div>
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
                <div class="orders-overview-header">
                  <div class="orders-chart">
                    <div class="chart-data">
                      <div class="agagda-design-ready">Agagda Design ready</div>
                    </div>
                    <div class="chart-bar">
                      <div class="status-icon"></div>
                      <div class="card">
                        <div class="order-details1">
                          <div class="order-number">12-08-24</div>
                          <div class="new-order-5654567">
                            New order #5654567
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="order-progress1">
                      <div class="progress-bar1">
                        <div class="progress">
                          <div class="progress-bar-elements"></div>
                          <div class="progress-bar-elements"></div>
                        </div>
                      </div>
                      <div class="order-status2">
                        <div class="order-type">
                          <div class="order-number">12-08-24</div>
                        </div>
                        <div class="progress-details">
                          <div class="agagda-design-ready">
                            Flap design is processing
                          </div>
                          <div class="processing-time">12-08-24</div>
                        </div>
                        <div class="agagda-design-ready">
                          Agagda design is processing
                        </div>
                      </div>
                    </div>
                    <div class="order-progress2">
                      <div class="progress-bar2">
                        <div class="completed-marker"></div>
                      </div>
                      <div class="chart-details">
                        <div class="div22">12-08-24</div>
                        <div class="order-details2">
                          <div class="new-order-56545671">
                            New order #5654567
                          </div>
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