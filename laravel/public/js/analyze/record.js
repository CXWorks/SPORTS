/**
 * Created by st0001 on 2016/11/28.
 */

function drawRecords() {
    var option = {
        title: {
            text: 'Sports Reords'
        },
        tooltip: {
            trigger: 'axis'
        },
        xAxis: {
            data: data.map(function (item) {
                src=item['created_at'];

                return src.substring(0,11);
            })
        },
        yAxis: [

    {
        name : 'time length (mins)',
            type : 'value',
    }
        ],
        toolbox: {
            left: 'center',
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                restore: {},
                saveAsImage: {}
            }
        },
        dataZoom: [ {
            type: 'inside'
        }],

        series: {
            name: 'Sports Records',
            type: 'line',
            data: data.map(function (item) {
                return item['minute'];
            }),
            markPoint: {
                data: [
                    {type: 'max', name: '最大值'},
                    {type: 'min', name: '最小值'}
                ]
            },
        },
        visualMap: {
            min: 10,
            max: 130,
            splitNumber: 20,
            color: ['#096', '#ffde33', '#ff9933', '#cc0033', '#660099', '#7e0023']
        }
    };
    var myChart = echarts.init(document.getElementById('main'));
    myChart.setOption(option);
}



function drawPercent() {
    cmp=[30,50,70,90,110];
    value=[0,0,0,0,0,0];
    data.forEach(function (d) {
        i=0;
        while (cmp[i]<=d['minute'])
            i+=1;
        value[i]++;
    });
    option = {
        title : {
            text: '运动时长比例图',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['30分钟以下','30-50分钟','50-70分钟','70-90分钟','90-110分钟','110分钟以上']
        },
        series : [
            {
                name: '时长',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:value[0], name:'30分钟以下'},
                    {value:value[1], name:'30-50分钟'},
                    {value:value[2], name:'50-70分钟'},
                    {value:value[3], name:'70-90分钟'},
                    {value:value[4], name:'90-110分钟'},
                    {value:value[5],name:'110分钟以上'}
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    var myChart = echarts.init(document.getElementById('main2'));
    myChart.setOption(option);
}

function drawWeeks() {
    value=[0,0,0,0,0,0,0];
    data.forEach(function (d) {
        date=new Date(d['created_at']);
        day=date.getDay();
        value[day]++;
    });
    var option = {
        title : {
            text: '运动频次统计图',
            x:'center'
        },
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'line'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                name:'星期',
                type : 'category',
                data : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis : [
            {
                name:'运动次数 /次',
                type : 'value'
            }
        ],
        series : [
            {
                name:'运动次数',
                type:'line',
                barWidth: '60%',
                data:value
            },
            {
                name: 'GDP占比',
                type: 'pie',
                center: ['75%', '35%'],
                radius: '28%',
                data:[
                    {value:value[0],name:'周一'},
                    {value:value[1],name:'周二'},
                    {value:value[2],name:'周三'},
                    {value:value[3],name:'周四'},
                    {value:value[4],name:'周五'},
                    {value:value[5],name:'周六'},
                    {value:value[6],name:'周日'}
                ]
            }
        ]
    };
    var myChart = echarts.init(document.getElementById('main3'));
    myChart.setOption(option);
}
drawWeeks();
drawRecords();
drawPercent();