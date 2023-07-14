<nav class="nav nav-header ">
    <div class="row w-100">
      <div class="col-4 mb-2">
        <div class="d-flex justify-content-start">
          <img class="logo" src="{{ url('/img/nusametal.png') }}" alt="Image" />
        </div>
      </div>

      <div class="col-4">
        <div class="title section text-center fw-bold fs-1"> SISTEM PAKAR REJECT </div>
      </div>

      <div class="col-4 d-flex justify-content-end">
        <label id="MyClockDisplay" class="clock shadow" onload="showTime()"></label>
      </div>

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