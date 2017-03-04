/**
 * Created by cxworks on 16-11-27.
 */





option = {
    tooltip: {
        trigger: 'axis'
    },
    grid: {
        show: false,
        zlevel: 0,
        z: 2,
        left: 0,
        top: 0,
        right: 0,
        bottom: 0,
        width: 'auto',
        height: 'auto'

    },
    tooltip: {
        show: false
    },
    xAxis: {
        type: 'value',
        axisLabel: {
            inside: false,
            textStyle: {
                color: '#fff'
            }
        },
        max:100,
        axisTick: {
            show: false
        },
        axisLine: {
            show: false
        },
        splitLine: {
            show: false
        },
        z: 10
    },
    yAxis: {
        type: 'category',
        data: ['Rank'],
        axisLabel: {
            show: false,
            inside: false,
            textStyle: {
                color: '#fff'
            }
        },
        axisTick: {
            show: false
        },
        axisLine: {
            show: false
        },
        splitLine: {
            show: false
        },
        z: 10
    },
    series: [{
        name: '当前',
        type: 'bar',
        barWidth: '30',
        barHeight:'50',

        itemStyle: {
            normal: {
                barBorderRadius: 5,
                shadowBlur: 10,
                shadowColor: '#111',
                color: new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                    offset: 0,
                    color: '#4C9BB0'
                }, {
                    offset: 0.5,
                    color: '#CABB49'
                }, {
                    offset: 1,
                    color: '#DF7650'
                }])
            }
        },
        data: [100]
    }, {
        name: '当前',
        type: 'line',
        symbolSize: 40,
        itemStyle: {
            normal: {
                barBorderRadius: 5,
                shadowBlur: 10,
                shadowColor: '#111',
                color: new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                    offset: 0,
                    color: '#4C9BB0'
                }, {
                    offset: 0.5,
                    color: '#CABB49'
                }, {
                    offset: 1,
                    color: '#DF7650'
                }]),
                label: {
                    show: true,

                    position: ['120%', '17%'],
                    formatter: '{b}：{c}',
                    textStyle: {
                        color: 'black',
                        fontWeight: 'lighter',
                        fontFamily: '微软雅黑',
                        fontSize: 18
                    }
                }
            }
        },
        data: [rank]
    }]
}
var myChart = echarts.init(document.getElementById('main3'));
myChart.setOption(option);