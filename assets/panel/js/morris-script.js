var Script = function () {

    //morris chart

    $(function () {

      Morris.Donut({
        element: 'hero-donut',
        data: [
          {label: 'Öğrenci', value: 25 },
          {label: 'Admin', value: 40 },
          {label: 'Yurt Sahibi', value: 25 }
        ],
          colors: ['#41cac0', '#49e2d7', '#34a39b'],
        formatter: function (y) { return y }
      });

    });

}();