<div class="sidebar-items left-pane">
        <img class="vector-icon" alt="" src="{{ asset('switchprints') }}/public/vector.svg" />

        <input class="name-icon" type="checkbox" />

        <div class="payment">Payment</div>
        <img
          class="input-icon"
          loading="lazy"
          alt=""
          src="{{ asset('switchprints') }}/public/vector-1.svg"
        />

        <div class="machine clickable">Machine</div>
        <img class="vector-icon1" loading="lazy" alt="" src="{{ asset('switchprints') }}/public/vector-2.svg" />

        <div class="customer clickable staff">Staff</div>

        <div class="frame-parent">
          <img class="frame-child" loading="lazy" alt="" src="{{ asset('switchprints') }}/public/group-1@2x.png"/>

          <div class="nav-item" id="navItemContainer">
            <img
              class="icon"
              loading="lazy"
              alt=""
              src="{{ asset('switchprints') }}/public/vector-3.svg"
            />

            <a class="dashboard1">Dashboard</a>
          </div>
          <div class="order-placement">
            <div class="order-summary">
              <div class="order-status">
                <img class="order-icon" alt="" src="{{ asset('switchprints') }}/public/vector-4.svg" />
              </div>
              <div class="order">Order</div>
              <div class="order-item">
                <img class="vector-icon4" alt="" src="{{ asset('switchprints') }}/public/vector-5.svg" />
              </div>
            </div>
          </div>
          <div class="user-card">
            <div class="nav-item1" id="navItemContainer">
              <img class="vector-icon5" alt="" src="{{ asset('switchprints') }}/public/vector2.svg" />

              <div class="new-order">New Order</div>
              <img class="menu-item-icons" loading="lazy" src="{{ asset('switchprints') }}/public/vector-6.svg"/>
            </div>
            <div class="nav-item2" id="navItemContainer1">
              <img class="vector-icon5" alt="" src="{{ asset('switchprints') }}/public/vector2.svg" />

              <a class="view-order">View Order</a>
              <img class="vector-icon7" loading="lazy" src="{{ asset('switchprints') }}/public/vector-7.svg"/>
            </div>
            <div class="nav-item1" id="navItemContainer2">
              <img class="vector-icon5" alt="" src="{{ asset('switchprints') }}/public/vector2.svg" />

              <div class="new-style design">Designs</div>
              <img class="menu-item-icons" loading="lazy" src="{{ asset('switchprints') }}/public/vector-6.svg"/>
            </div>
            <div class="nav-item4 customers" id="navItemContainer3">
              <img class="vector-icon10" loading="lazy" src="{{ asset('switchprints') }}/public/vector-2.svg"/>

              <a class="customer1">Customer</a>
            </div>
          </div>
        </div>
        <div class="user-settings">
          <img
            class="settings-input-composite"
            loading="lazy"
            alt=""
            src="{{ asset('switchprints') }}/public/settings-input-composite.svg"
          />

          <div class="user-name-container">
            <div class="navbar-container">
              <div class="customer-name-field">
                <div class="customer2 clickable branch">Branch</div>
              </div>
              <a class="customer3">Support</a>
            </div>
          </div>
          <img
            class="total-orders-icon"
            loading="lazy"
            alt=""
            src="{{ asset('switchprints') }}/public/vector-10.svg"
          />
        </div>
      </div>
<script>
window.addEventListener('load', function() {
  document.querySelector('.staff').addEventListener('click', function() {
        window.location.href = "{{ route('users.index') }}";
    });
  document.querySelector('.branch').addEventListener('click', function() {
      window.location.href = "{{ route('branches.index') }}";
  });
  document.querySelector('.machine').addEventListener('click', function() {
      window.location.href = "{{ route('machines.index') }}";
  });
  document.querySelector('.design').addEventListener('click', function() {
      window.location.href = "{{ route('designs.index') }}";
  });
  document.querySelector('.customers').addEventListener('click', function() {
      window.location.href = "{{ route('customers.index') }}";
  });
  document.querySelector('.payment').addEventListener('click', function() {
      window.location.href = "{{ route('payments.index') }}";
  });
  document.querySelector('.view-order').addEventListener('click', function() {
      window.location.href = "{{ route('orders.index') }}";
  });
  document.querySelector('.new-order').addEventListener('click', function() {
      window.location.href = "{{ route('orders.create') }}";
  });
});
    
</script>