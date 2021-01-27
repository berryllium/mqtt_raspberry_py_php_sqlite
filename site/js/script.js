$(function() {

// данные для графиков
var all_data = [
  { data: [["2021-01-23 20:09:59", 0], ["2021-01-24 15:09:59", 1],
           ["2021-01-25 10:09:59", 7], ["2021-01-26 3:09:59", 8],
           ["2021-01-25 10:09:59", 7], ["2021-01-26 3:09:59", 8],
           ["2021-01-27 10:09:59", 7], ["2021-01-28 3:09:59", 8],
           ["2021-01-29 10:09:59", 7], ["2021-01-29 13:09:59", 8],
          ]},
];
// преобразуем даты в UTC
for(var j = 0; j < all_data.length; ++j) {
 for(var i = 0; i < all_data[j].data.length; ++i)
   all_data[j].data[i][0] = Date.parse(all_data[j].data[i][0]);
}
// свойства графика
var plot_conf = {
 series: {
   lines: {
     show: true,
     lineWidth: 2
   }
 },
 xaxis: {
  mode: "time",
  timeBase: "milliseconds",
  timeformat: "%d/%m %H:%m:%S"
 }
};
// выводим график
$.plot($("#placeholder"), all_data, plot_conf);
});
