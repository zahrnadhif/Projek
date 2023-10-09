<nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #E9E8E8;">
  {{-- KIRI --}}
  <div class="col-4">
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <a href="{{ url('/dashboard') }}">
    <img src="{{ url('/img/nusametal.png') }}"  width="220" height="38">
  </a>
  </div>
  
  <div class="col-4 text-center fs-2 fw-semibold" style="color:black">
    SISTEM PAKAR
  </div>
  
  {{-- KANAN --}}
  <div class="col-4 text-sm-center">
    {{-- <ul class="navbar-nav "> --}}
      {{-- <div class=" fs-3 fw-bold" id="MyClockDisplay" onload="showTime()">
      </div> --}}
    {{-- </ul> --}}
  </div>
</nav>

  <script>
    function showTime() {
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      h = h < 10 ? "0" + h : h;
      m = m < 10 ? "0" + m : m;
      s = s < 10 ? "0" + s : s;
      var time = h + ":" + m + ":" + s + " ";
      document.getElementById("MyClockDisplay").innerText = time;
      document.getElementById("MyClockDisplay").textContent = time;
      if (time >= '00:00:00' && time < '07:10:00') {
          shift = "SHIFT-1";
      } else if (time >= '07:10:00' && time < '16:00:00') {
          shift = "SHIFT-2";
      } else if (time >= '16:00:00' && time <= '23:59:59') {
          shift = "SHIFT-3";
      } else {
          shift = "SHIFT TIDAK TERDEFINISI";
      }
      setTimeout(showTime, 1000);
    }
    showTime();
  </script>