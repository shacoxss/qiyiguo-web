$(function() {

    Morris.Area({
        element: 'ultra-wide-band',
        data: [{
            period: '2016-10-2 21:10',
            UWB: 26
        }, {
            period: '2016-10-2 21:20',
            UWB: 27
        }, {
            period: '2016-10-2 21:30',
            UWB: 49
        }, {
            period: '2016-10-2 21:40',
            UWB: 59
        }],
        xkey: 'period',
        ykeys: ['UWB'],
        labels: ['负载'],
        pointSize: 7,
        hideHover: 'auto',
        resize: true,
        lineColors: ["#8BC34A"],
        pointFillColors: [ "#8BC34A"],
        fillOpacity: 1.0
    });

    Morris.Area({
        element: 'cpu-load',
        data: [{
            period: '2016-10-2 21:10',
            CPU: 35
        }, {
            period: '2016-10-2 21:20',
            CPU: 24
        }, {
            period: '2016-10-2 21:30',
            CPU: 10
        }, {
            period: '2016-10-2 21:40',
            CPU: 59
        }],
        xkey: 'period',
        ykeys: ['CPU'],
        labels: ['负载'],
        pointSize: 7,
        hideHover: 'auto',
        resize: true,
        lineColors: ["#FFC107"],
        pointFillColors: [ "#FFC107"],
        fillOpacity: 1.0
    });

    Morris.Area({
        element: 'Memory-load',
        data: [{
            period: '2016-10-2 21:10',
            Memory: 45
        }, {
            period: '2016-10-2 21:20',
            Memory: 14
        }, {
            period: '2016-10-2 21:30',
            Memory: 20
        }, {
            period: '2016-10-2 21:40',
            Memory: 79
        }],
        xkey: 'period',
        ykeys: ['Memory'],
        labels: ['负载'],
        pointSize: 7,
        hideHover: 'auto',
        resize: true,
        lineColors: ["#F44336"],
        pointFillColors: [ "#F44336"],
        fillOpacity: 1.0
    });

    Morris.Bar({
        element: 'included-number',
          data: [
            { y: '2016-09-01', a: 10000, b: 9000, c: 1500, d: 153 },
            { y: '2016-09-02', a: 7500,  b: 6500, c: 1100, d: 123 },
            { y: '2016-09-03', a: 5000,  b: 4000, c: 100, d: 5456 },
            { y: '2016-09-04', a: 7500,  b: 6500, c: 1300, d: 451 },
            { y: '2016-09-05', a: 5000,  b: 4000, c: 1600, d: 4567 },
            { y: '2016-09-06', a: 7500,  b: 6500, c: 1700, d: 7895 },
            { y: '2016-09-06', a: 7500,  b: 6500, c: 1700, d: 7895 },
            { y: '2016-09-07', a: 10000, b: 9000, c: 1800, d: 456 }
          ],
         resize: true,
          xkey: 'y',
          ykeys: ['a', 'b', 'c', 'd'],
          labels: ['奇异果','百度', '360', '搜狗'],
          barColors: ["#79a200","#03A9F4", "#8BC34A", "#F44336"]
        });
    
    Morris.Donut({
        element: 'income-load',
        data: [{
            label: "百度",
            value: 12
        }, {
            label: "360",
            value: 30
        }, {
            label: "搜狗",
            value: 70
        }, {
            label: "微信",
            value: 150
        }, {
            label: "直接输入网址",
            value: 80
        }],
        resize: true,
        colors: ["#03A9F4", "#8BC34A", "#F44336","#c45ef8", "#FFC107"]
    });
    
    
    Morris.Line({
      element: 'member-load',
      data: [
        { y: '2016-01', a: 100, b: 90, c:150, d:180 },
        { y: '2016-02', a: 75,  b: 65, c:45, d:485 },
        { y: '2016-03', a: 50,  b: 40, c:452, d:72 },
        { y: '2016-04', a: 75,  b: 65, c:456, d:42},
        { y: '2016-05', a: 50,  b: 40, c:454, d:123 },
        { y: '2016-06', a: 75,  b: 65, c:107, d:456 },
        { y: '2016-07', a: 100, b: 90, c:785, d:214 }
      ],
      resize: true,
      xkey: 'y',
      ykeys: ['a', 'b', 'c', 'd'],
      lineColors: [ "#03A9F4", "#8BC34A", "#F44336","#c45ef8"],
      labels: ['普通会员', '主播', '经纪公司', '专栏作者']
    });
    
    
    
    
});
