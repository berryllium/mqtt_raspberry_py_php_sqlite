
function getJson() {
  $.ajax({
    url: '/ajax.php',
    dataType: 'json',
    data: $('form').serialize(),
    success: function(all_data) {

      // преобразуем даты в UTC
    for(var i = 0; i < all_data.length; ++i) {
      all_data[i][0] = Date.parse(all_data[i][0]);
      all_data[i][1] = Number(all_data[i][1]);
    }

    console.log(all_data)
    // свойства графика
    var plot_conf = {
    series: {
      lines: {
        show: true,
        lineWidth: 2
      }
    },
    yaxis: {
      min: 0,
      max: 100
    },
    xaxis: {
      mode: "time",
      timeBase: "milliseconds",
      timeformat: "%d/%m %H:%m:%S"
    }
    };
      $.plot($("#placeholder"), all_data, plot_conf);
    }
  })
}
