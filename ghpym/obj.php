<!DOCTYPE html>
<!-- saved from url=(0056)https://www.lovestu.com/api/project/cnmapyinqing/obj.php -->
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>实时疫情图</title>
    <script src="./hm.js"></script><script type="text/javascript" src="./echarts.min.js"></script>
    <script src="./world.js"></script>
    <script src="./china.js"></script>

    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?72373e67ad82598385e9c651b4d0aca6";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <style>
        body {
            height: 800px;
            overflow: hidden;
        }

        *:focus {
            outline: none;
        }

        #main {
            max-width: px;
            margin: auto;
        }

        .info {
            display: flex;
            justify-content: space-between;
            text-align: center;
            line-height: 0.5;
            border-bottom: 1px solid #ebebeb;
        }

        .info > div {
            flex-grow: 1;
            margin: 0 4px;
            border-radius: 3px;
        }

        .info > div > p:first-child {
            font-size: 12px;
        }

        .title {
            text-align: center;
        }

        .copyright {
            font-size: 10px;
            text-align: right;
            color: #909399;
        }

        .copyright a {
            text-decoration: none;
        }

        .copyright a:hover, a:active, a:visited, a:link, a:focus {
            color: #909399;
        }

        .map {
            position: relative;
            height: 400px;
        }

        #worldmap {
            height: 380px;
        }

        .copyright {
            position: relative;
            width: 100%;
        }

        .copyright, .map {
            top: -65px;
        }

        .hide {
            display: none;
        }

        #worldmap {
            width: 100%;
        }

        .button {
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            height: 28px;
            padding: 0 15px;
            font-size: 14px;
            border-radius: 4px;
            transition: color .2s linear, background-color .2s linear, border .2s linear, box-shadow .2s linear;
            color: #515a6e;
            background-color: #fff;
            border-color: #dcdee2;
        }

        .btn-active {
            color: #fff;
            background-color: #2d8cf0;
            border-color: #2d8cf0;
        }

        .tab {
            margin-top: 5px;
            text-align: center;
        }
    </style>
    </head>

<body>
<div>
    <div class="title">2020新冠实时疫情图</div>
    <div class="tab">
        <button onclick="showcn(this)" id="btn-cn" class="button">中国</button>
        <button onclick="showworld(this)" id="btn-world" class="button btn-active">全球</button>
    </div>
    <div class="info" id="cninfo" style="display: none;">
        <div>
            <p>现存确诊</p>
            <p style="color: rgb(247, 76, 49);">3019</p>
        </div>
        <div>
            <p>境外输入</p>
            <p style="color: rgb(247, 130, 7);">771</p>
        </div>
        <div>
            <p>死亡</p>
            <p style="color: rgb(93, 112, 146);">3314</p>
        </div>
        <div>
            <p>治愈</p>
            <p style="color: rgb(40, 183, 163);">76230</p>
        </div>
    </div>

    <div class="info" id="worldinfo" style="display: flex;">
        <div>
            <p>现存确诊</p>
            <p style="color: rgb(247, 76, 49);">578896</p>
        </div>
        <div>
            <p>累计确诊</p>
            <p style="color: rgb(247, 130, 7);">694214</p>
        </div>
        <div>
            <p>累计死亡</p>
            <p style="color: rgb(93, 112, 146);">33816</p>
        </div>
        <div>
            <p>累计治愈</p>
            <p style="color: rgb(40, 183, 163);">81502</p>
        </div>
    </div>
</div>
<div id="cnmap" class="map" _echarts_instance_="ec_1585643928307" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; display: none;"><div style="position: relative; width: 317px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="317" height="400" style="position: absolute; left: 0px; top: 0px; width: 317px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
<div id="worldmap" class="map" _echarts_instance_="ec_1585643928308" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; display: block;"><div style="position: relative; width: 317px; height: 380px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="317" height="380" style="position: absolute; left: 0px; top: 0px; width: 317px; height: 380px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
<script type="text/javascript">
    var dom = document.getElementById("cnmap");
    var myChart = echarts.init(dom, null, {renderer: 'svg'});
    const cnoption = {
        bottom: '10px',
        tooltip: {
            show: true,
            trigger: 'item'
        },
        dataRange: {
            x: 'center',
            orient: 'horizontal',
            min: 0,
            max: 20000,
            text: ['高', '低'], // 文本，默认为数值文本
            splitNumber: 0,
            splitList: [
                {start: 1000, end: 999999},
                {start: 100, end: 1000},
                {start: 50, end: 100}, {start: 10, end: 50},
                {start: 1, end: 10},
                {start: 0, end: 0},
            ],
            inRange: {
                color: ['#fff', '#fff5c9', '#FDEBCF', '#F59E83', '#F59E83', '#CB2A2F', '#e6ac53', '#70161D']
            }
        },
        series: [
            {

                label: {

                    normal: {
                        fontFamily: 'Microsoft YaHei',
                        fontSize: 9,
                        show: true,

                    },
                    emphasis: {
                        show: false
                    }
                },
                name: '现存确诊',
                type: 'map',
                mapType: 'china',
                zoom: 1,
                itemStyle: {
                    normal: {
                        borderWidth: .5,//区域边框宽度
                        borderColor: '#B6B6B6',//区域边框颜色
                        areaColor: "#ffefd5",//区域颜色

                    },
                },
                data: JSON.parse('[{"name":"\u6e56\u5317","value":1461},{"name":"\u9999\u6e2f","value":554},{"name":"\u53f0\u6e7e","value":278},{"name":"\u4e0a\u6d77","value":163},{"name":"\u5317\u4eac","value":154},{"name":"\u5e7f\u4e1c","value":129},{"name":"\u798f\u5efa","value":47},{"name":"\u5929\u6d25","value":38},{"name":"\u5185\u8499\u53e4","value":32},{"name":"\u6d59\u6c5f","value":30},{"name":"\u6fb3\u95e8","value":29},{"name":"\u6c5f\u82cf","value":15},{"name":"\u5c71\u4e1c","value":14},{"name":"\u8fbd\u5b81","value":13},{"name":"\u56db\u5ddd","value":11},{"name":"\u7518\u8083","value":11},{"name":"\u9655\u897f","value":8},{"name":"\u4e91\u5357","value":7},{"name":"\u6cb3\u5317","value":5},{"name":"\u5409\u6797","value":5},{"name":"\u6cb3\u5357","value":3},{"name":"\u91cd\u5e86","value":3},{"name":"\u5c71\u897f","value":3},{"name":"\u9ed1\u9f99\u6c5f","value":2},{"name":"\u5e7f\u897f","value":2},{"name":"\u6c5f\u897f","value":1},{"name":"\u8d35\u5dde","value":1},{"name":"\u6e56\u5357","value":0},{"name":"\u5b89\u5fbd","value":0},{"name":"\u6d77\u5357","value":0},{"name":"\u65b0\u7586","value":0},{"name":"\u5b81\u590f","value":0},{"name":"\u9752\u6d77","value":0},{"name":"\u897f\u85cf","value":0}]'),
            },
        ],
        animation: false,
    };
    myChart.setOption(cnoption, true);


    var worldmapdom = document.getElementById("worldmap");
    var worldChart = echarts.init(worldmapdom, null, {renderer: 'svg'});
    const worldoption = {
        bottom: '10px',
        tooltip: {
            show: true,
            trigger: 'item',
            formatter: function (val) {
                return val.data.provinceName + '<br>' + '现存确诊: ' + val.data.value
            }
        },
        dataRange: {
            x: 'center',
            orient: 'horizontal',
            min: 0,
            max: 20000,
            text: ['高', '低'], // 文本，默认为数值文本
            splitNumber: 0,
            splitList: [
                {start: 10000, end: 9999999},
                {start: 1000, end: 10000},
                {start: 99, end: 999},
                {start: 10, end: 99},
                {start: 0, end: 9},
            ],
            inRange: {
                color: ['#FAEBD2', '#D56355', '#BB3937','#CB2A2F', '#772526']
            }
        },
        series: [
            {

                label: {

                    normal: {
                        fontFamily: 'Microsoft YaHei',
                        fontSize: 9,
                        show: false
                    },
                    emphasis: {
                        show: false
                    }
                },
                name: '现存确诊',
                type: 'map',
                mapType: 'world',
                zoom: 0.8,
                itemStyle: {
                    normal: {label: {show: true, color: '#333'}, borderWidth: 0},
                },
                data: JSON.parse('[{"name":"United States","value":155537,"provinceName":"\u7f8e\u56fd"},{"name":"Italy","value":75895,"provinceName":"\u610f\u5927\u5229"},{"name":"Spain","value":63146,"provinceName":"\u897f\u73ed\u7259"},{"name":"Germany","value":52849,"provinceName":"\u5fb7\u56fd"},{"name":"France","value":33602,"provinceName":"\u6cd5\u56fd"},{"name":"Iran (Islamic Republic of)","value":26464,"provinceName":"\u4f0a\u6717"},{"name":"United Kingdom","value":20598,"provinceName":"\u82f1\u56fd"},{"name":"Switzerland","value":12676,"provinceName":"\u745e\u58eb"},{"name":"Turkey","value":10591,"provinceName":"\u571f\u8033\u5176"},{"name":"Belgium","value":9859,"provinceName":"\u6bd4\u5229\u65f6"},{"name":"Austria","value":8623,"provinceName":"\u5965\u5730\u5229"},{"name":"Netherlands","value":7932,"provinceName":"\u8377\u5170"},{"name":"Canada","value":7023,"provinceName":"\u52a0\u62ff\u5927"},{"name":"Portugal","value":6246,"provinceName":"\u8461\u8404\u7259"},{"name":"Israel","value":4518,"provinceName":"\u4ee5\u8272\u5217"},{"name":"Brazil","value":4420,"provinceName":"\u5df4\u897f"},{"name":"Australia","value":4419,"provinceName":"\u6fb3\u5927\u5229\u4e9a"},{"name":"Norway","value":4419,"provinceName":"\u632a\u5a01"},{"name":"Korea","value":4216,"provinceName":"\u97e9\u56fd"},{"name":"Sweden","value":3865,"provinceName":"\u745e\u5178"},{"name":"China","value":3019,"provinceName":"\u4e2d\u56fd"},{"name":"Czechia","value":2928,"provinceName":"\u6377\u514b"},{"name":"Ireland","value":2856,"provinceName":"\u7231\u5c14\u5170"},{"name":"Denmark","value":2499,"provinceName":"\u4e39\u9ea6"},{"name":"Chile","value":2367,"provinceName":"\u667a\u5229"},{"name":"Malaysia","value":2204,"provinceName":"\u9a6c\u6765\u897f\u4e9a"},{"name":"Poland","value":2011,"provinceName":"\u6ce2\u5170"},{"name":"Luxembourg","value":1966,"provinceName":"\u5362\u68ee\u5821"},{"name":"Ecuador","value":1833,"provinceName":"\u5384\u74dc\u591a\u5c14"},{"name":"Russia","value":1760,"provinceName":"\u4fc4\u7f57\u65af"},{"name":"Pakistan","value":1759,"provinceName":"\u5df4\u57fa\u65af\u5766"},{"name":"Romania","value":1696,"provinceName":"\u7f57\u9a6c\u5c3c\u4e9a"},{"name":"Japan","value":1545,"provinceName":"\u65e5\u672c"},{"name":"Thailand","value":1514,"provinceName":"\u6cf0\u56fd"},{"name":"Philippines","value":1426,"provinceName":"\u83f2\u5f8b\u5bbe"},{"name":"Saudi Arabia","value":1330,"provinceName":"\u6c99\u7279\u963f\u62c9\u4f2f"},{"name":"South Africa","value":1322,"provinceName":"\u5357\u975e"},{"name":"Finland","value":1290,"provinceName":"\u82ac\u5170"},{"name":"Indonesia","value":1228,"provinceName":"\u5370\u5ea6\u5c3c\u897f\u4e9a"},{"name":"Greece","value":1150,"provinceName":"\u5e0c\u814a"},{"name":"India","value":1118,"provinceName":"\u5370\u5ea6"},{"name":"Mexico","value":1073,"provinceName":"\u58a8\u897f\u54e5"},{"name":"Panama","value":961,"provinceName":"\u5df4\u62ff\u9a6c"},{"name":"Iceland","value":927,"provinceName":"\u51b0\u5c9b"},{"name":"Peru","value":912,"provinceName":"\u79d8\u9c81"},{"name":"Argentina","value":885,"provinceName":"\u963f\u6839\u5ef7"},{"name":"Serbia","value":819,"provinceName":"\u585e\u5c14\u7ef4\u4e9a"},{"name":"Colombia","value":776,"provinceName":"\u54e5\u4f26\u6bd4\u4e9a"},{"name":"Slovenia","value":745,"provinceName":"\u65af\u6d1b\u6587\u5c3c\u4e9a"},{"name":"Croatia","value":720,"provinceName":"\u514b\u7f57\u5730\u4e9a"},{"name":"Singapore","value":693,"provinceName":"\u65b0\u52a0\u5761"},{"name":"Estonia","value":692,"provinceName":"\u7231\u6c99\u5c3c\u4e9a"},{"name":"Qatar","value":640,"provinceName":"\u5361\u5854\u5c14"},{"name":"Dominican Republic","value":561,"provinceName":"\u591a\u7c73\u5c3c\u52a0"},{"name":"New Zealand","value":549,"provinceName":"\u65b0\u897f\u5170"},{"name":"United Arab Emirates","value":545,"provinceName":"\u963f\u8054\u914b"},{"name":"Ukraine","value":527,"provinceName":"\u4e4c\u514b\u5170"},{"name":"Algeria","value":512,"provinceName":"\u963f\u5c14\u53ca\u5229\u4e9a"},{"name":"Morocco","value":509,"provinceName":"\u6469\u6d1b\u54e5"},{"name":"Lithuania","value":476,"provinceName":"\u7acb\u9676\u5b9b"},{"name":"Egypt","value":465,"provinceName":"\u57c3\u53ca"},{"name":"Armenia","value":449,"provinceName":"\u4e9a\u7f8e\u5c3c\u4e9a"},{"name":"Iraq","value":432,"provinceName":"\u4f0a\u62c9\u514b"},{"name":"Lebanon","value":403,"provinceName":"\u9ece\u5df4\u5ae9"},{"name":"Hungary","value":398,"provinceName":"\u5308\u7259\u5229"},{"name":"Latvia","value":376,"provinceName":"\u62c9\u8131\u7ef4\u4e9a"},{"name":"Andorra","value":352,"provinceName":"\u5b89\u9053\u5c14"},{"name":"Tunisia","value":352,"provinceName":"\u7a81\u5c3c\u65af"},{"name":"Bulgaria","value":348,"provinceName":"\u4fdd\u52a0\u5229\u4e9a"},{"name":"Bosnia and Herzegovina","value":332,"provinceName":"\u6ce2\u9ed1"},{"name":"Slovakia","value":329,"provinceName":"\u65af\u6d1b\u4f10\u514b"},{"name":"Uruguay","value":313,"provinceName":"\u4e4c\u62c9\u572d"},{"name":"Costa Rica","value":293,"provinceName":"\u54e5\u65af\u8fbe\u9ece\u52a0"},{"name":"Republic of Moldova","value":286,"provinceName":"\u6469\u5c14\u591a\u74e6"},{"name":"Kazakhstan","value":280,"provinceName":"\u54c8\u8428\u514b\u65af\u5766"},{"name":"North Macedonia","value":252,"provinceName":"\u5317\u9a6c\u5176\u987f"},{"name":"Azerbaijan","value":243,"provinceName":"\u963f\u585e\u62dc\u7586"},{"name":"Jordan","value":237,"provinceName":"\u7ea6\u65e6"},{"name":"Bahrain","value":232,"provinceName":"\u5df4\u6797"},{"name":"Cyprus","value":224,"provinceName":"\u585e\u6d66\u8def\u65af"},{"name":"San Marino","value":216,"provinceName":"\u5723\u9a6c\u529b\u8bfa"},{"name":"R\u00e9union","value":207,"provinceName":"\u7559\u5c3c\u65fa"},{"name":"Burkina Faso","value":203,"provinceName":"\u5e03\u57fa\u7eb3\u6cd5\u7d22"},{"name":"Albania","value":203,"provinceName":"\u963f\u5c14\u5df4\u5c3c\u4e9a"},{"name":"Kuwait","value":194,"provinceName":"\u79d1\u5a01\u7279"},{"name":"Afghanistan","value":170,"provinceName":"\u963f\u5bcc\u6c57"},{"name":"Faroe Islands","value":168,"provinceName":"\u6cd5\u7f57\u7fa4\u5c9b"},{"name":"Cote d Ivoire","value":161,"provinceName":"\u79d1\u7279\u8fea\u74e6"},{"name":"Vietnam","value":151,"provinceName":"\u8d8a\u5357"},{"name":"Malta","value":151,"provinceName":"\u9a6c\u8033\u4ed6"},{"name":"Oman","value":150,"provinceName":"\u963f\u66fc"},{"name":"Ghana","value":145,"provinceName":"\u52a0\u7eb3"},{"name":"Uzbekstan","value":141,"provinceName":"\u4e4c\u5179\u522b\u514b\u65af\u5766"},{"name":"Cameroon","value":137,"provinceName":"\u5580\u9ea6\u9686"},{"name":"Honduras","value":136,"provinceName":"\u6d2a\u90fd\u62c9\u65af"},{"name":"Senegal","value":135,"provinceName":"\u585e\u5185\u52a0\u5c14"},{"name":"Venezuela","value":133,"provinceName":"\u59d4\u5185\u745e\u62c9"},{"name":"International conveyance (Diamond Princess)","value":128,"provinceName":"\u94bb\u77f3\u516c\u4e3b\u53f7\u90ae\u8f6e"},{"name":"Mauritius","value":128,"provinceName":"\u6bdb\u91cc\u6c42\u65af"},{"name":"Nigeria","value":121,"provinceName":"\u5c3c\u65e5\u5229\u4e9a"},{"name":"Cuba","value":116,"provinceName":"\u53e4\u5df4"},{"name":"Sri Lanka","value":115,"provinceName":"\u65af\u91cc\u5170\u5361"},{"name":"Belarus","value":105,"provinceName":"\u767d\u4fc4\u7f57\u65af"},{"name":"Martinique","value":103,"provinceName":"\u9a6c\u63d0\u5c3c\u514b"},{"name":"occupied Palestinian territory","value":96,"provinceName":"\u5df4\u52d2\u65af\u5766"},{"name":"Guadeloupe","value":94,"provinceName":"\u74dc\u5fb7\u7f57\u666e\u5c9b"},{"name":"Montenegro","value":90,"provinceName":"\u9ed1\u5c71"},{"name":"Brunei Darussalam","value":88,"provinceName":"\u6587\u83b1"},{"name":"Dem. Rep. Congo","value":87,"provinceName":"\u521a\u679c\uff08\u91d1\uff09"},{"name":"Kyrgyzstan","value":84,"provinceName":"\u5409\u5c14\u5409\u65af\u65af\u5766"},{"name":"Cambodia","value":82,"provinceName":"\u67ec\u57d4\u5be8"},{"name":"Mayotte","value":82,"provinceName":"\u9a6c\u7ea6\u7279"},{"name":"Georgia","value":80,"provinceName":"\u683c\u9c81\u5409\u4e9a"},{"name":"Bolivia","value":74,"provinceName":"\u73bb\u5229\u7ef4\u4e9a"},{"name":"Trinidad & Tobago","value":73,"provinceName":"\u7279\u7acb\u5c3c\u8fbe\u548c\u591a\u5df4\u54e5"},{"name":"Rwanda","value":70,"provinceName":"\u5362\u65fa\u8fbe"},{"name":"Gibraltar","value":65,"provinceName":"\u76f4\u5e03\u7f57\u9640"},{"name":"Puerto Rico","value":62,"provinceName":"\u6ce2\u591a\u9ece\u5404"},{"name":"Liechtenstein","value":62,"provinceName":"\u5217\u652f\u6566\u58eb\u767b"},{"name":"Paraguay","value":61,"provinceName":"\u5df4\u62c9\u572d"},{"name":"Jersey","value":61,"provinceName":"\u6cfd\u897f\u5c9b"},{"name":"Guam","value":55,"provinceName":"\u5173\u5c9b"},{"name":"Kenya","value":48,"provinceName":"\u80af\u5c3c\u4e9a"},{"name":"Monaco","value":47,"provinceName":"\u6469\u7eb3\u54e5"},{"name":"Aruba","value":46,"provinceName":"\u963f\u9c81\u5df4"},{"name":"Madagascar","value":46,"provinceName":"\u9a6c\u8fbe\u52a0\u65af\u52a0"},{"name":"Isle of Man","value":42,"provinceName":"\u9a6c\u6069\u5c9b"},{"name":"Guernsey","value":39,"provinceName":"\u6839\u897f\u5c9b"},{"name":"French Polynesia","value":35,"provinceName":"\u6cd5\u5c5e\u6ce2\u5229\u5c3c\u897f\u4e9a"},{"name":"The Republic of Zambia","value":35,"provinceName":"\u8d5e\u6bd4\u4e9a\u5171\u548c\u56fd"},{"name":"Guatemala","value":33,"provinceName":"\u5371\u5730\u9a6c\u62c9"},{"name":"Uganda","value":33,"provinceName":"\u4e4c\u5e72\u8fbe"},{"name":"Jamaica","value":31,"provinceName":"\u7259\u4e70\u52a0"},{"name":"French Guiana","value":31,"provinceName":"\u6cd5\u5c5e\u572d\u4e9a\u90a3"},{"name":"Barbados","value":26,"provinceName":"\u5df4\u5df4\u591a\u65af"},{"name":"Bangladesh","value":25,"provinceName":"\u5b5f\u52a0\u62c9\u56fd"},{"name":"The Republic of Djibouti","value":25,"provinceName":"\u5409\u5e03\u63d0"},{"name":"The Republic of El Salvador","value":24,"provinceName":"\u8428\u5c14\u74e6\u591a"},{"name":"Togo","value":23,"provinceName":"\u591a\u54e5"},{"name":"Mali","value":23,"provinceName":"\u9a6c\u91cc"},{"name":"United States Virgin Islands","value":22,"provinceName":"\u7f8e\u5c5e\u7ef4\u5c14\u4eac\u7fa4\u5c9b"},{"name":"Bermuda","value":22,"provinceName":"\u767e\u6155\u5927"},{"name":"Guinea","value":21,"provinceName":"\u51e0\u5185\u4e9a"},{"name":"Ethiopia","value":20,"provinceName":"\u57c3\u585e\u4fc4\u6bd4\u4e9a"},{"name":"Congo","value":19,"provinceName":"\u521a\u679c\uff08\u5e03\uff09"},{"name":"Niger","value":17,"provinceName":"\u5c3c\u65e5\u5c14"},{"name":"Tanzania","value":17,"provinceName":"\u5766\u6851\u5c3c\u4e9a"},{"name":"Gabon","value":15,"provinceName":"\u52a0\u84ec"},{"name":"New Caledonia","value":15,"provinceName":"\u65b0\u5580\u91cc\u591a\u5c3c\u4e9a"},{"name":"The Republic of Haiti","value":15,"provinceName":"\u6d77\u5730"},{"name":"Eq.Guinea","value":14,"provinceName":"\u8d64\u9053\u51e0\u5185\u4e9a"},{"name":"Myanmar","value":14,"provinceName":"\u7f05\u7538"},{"name":"Mongolia","value":12,"provinceName":"\u8499\u53e4"},{"name":"Saint Martin","value":12,"provinceName":"\u5723\u9a6c\u4e01\u5c9b"},{"name":"Eritrea","value":12,"provinceName":"\u5384\u7acb\u7279\u91cc\u4e9a"},{"name":"Namibia","value":11,"provinceName":"\u7eb3\u7c73\u6bd4\u4e9a"},{"name":"Dominica","value":11,"provinceName":"\u591a\u7c73\u5c3c\u514b"},{"name":"Bahamas","value":10,"provinceName":"\u5df4\u54c8\u9a6c"},{"name":"Greenland","value":10,"provinceName":"\u683c\u9675\u5170"},{"name":"Syrian\u00a0ArabRepublic","value":9,"provinceName":"\u53d9\u5229\u4e9a"},{"name":"Swaziland","value":9,"provinceName":"\u65af\u5a01\u58eb\u5170"},{"name":"Suriname","value":8,"provinceName":"\u82cf\u91cc\u5357"},{"name":"Mozambique","value":8,"provinceName":"\u83ab\u6851\u6bd4\u514b"},{"name":"Libya","value":8,"provinceName":"\u5229\u6bd4\u4e9a"},{"name":"Cayman Islands","value":7,"provinceName":"\u5f00\u66fc\u7fa4\u5c9b"},{"name":"Zimbabwe","value":7,"provinceName":"\u6d25\u5df4\u5e03\u97e6"},{"name":"Seychelles","value":7,"provinceName":"\u585e\u820c\u5c14"},{"name":"Antigua & Barbuda","value":7,"provinceName":"\u5b89\u63d0\u74dc\u548c\u5df4\u5e03\u8fbe"},{"name":"Grenada","value":7,"provinceName":"\u683c\u6797\u90a3\u8fbe"},{"name":"Maldives","value":6,"provinceName":"\u9a6c\u5c14\u4ee3\u592b"},{"name":"Cura\u00e7ao","value":6,"provinceName":"\u5e93\u62c9\u7d22\u5c9b"},{"name":"Holy See","value":6,"provinceName":"\u68b5\u8482\u5188"},{"name":"Central African Republic","value":6,"provinceName":"\u4e2d\u975e\u5171\u548c\u56fd"},{"name":"Benin","value":6,"provinceName":"\u8d1d\u5b81"},{"name":"Laos","value":6,"provinceName":"\u8001\u631d"},{"name":"Angola","value":5,"provinceName":"\u5b89\u54e5\u62c9"},{"name":"Saint Barthelemy","value":5,"provinceName":"\u5723\u5df4\u6cf0\u52d2\u7c73\u5c9b"},{"name":"The Republic of Fiji","value":5,"provinceName":"\u6590\u6d4e"},{"name":"Chad","value":5,"provinceName":"\u4e4d\u5f97"},{"name":"Montserrat","value":5,"provinceName":"\u8499\u7279\u585e\u62c9\u7279"},{"name":"Sudan","value":4,"provinceName":"\u82cf\u4e39"},{"name":"Nepal","value":4,"provinceName":"\u5c3c\u6cca\u5c14"},{"name":"Guyana","value":4,"provinceName":"\u572d\u4e9a\u90a3"},{"name":"Mauritania","value":3,"provinceName":"\u6bdb\u91cc\u5854\u5c3c\u4e9a"},{"name":"Cabo Verde","value":3,"provinceName":"\u4f5b\u5f97\u89d2"},{"name":"Gambia","value":3,"provinceName":"\u5188\u6bd4\u4e9a"},{"name":"Nicaragua","value":3,"provinceName":"\u5c3c\u52a0\u62c9\u74dc"},{"name":"Bhutan","value":3,"provinceName":"\u4e0d\u4e39"},{"name":"Saint Lucia","value":3,"provinceName":"\u5723\u5362\u897f\u4e9a"},{"name":"Liberia","value":3,"provinceName":"\u5229\u6bd4\u91cc\u4e9a"},{"name":"Somalia","value":3,"provinceName":"\u7d22\u9a6c\u91cc"},{"name":"Botswana","value":3,"provinceName":"\u535a\u8328\u74e6\u7eb3"},{"name":"Belize","value":2,"provinceName":"\u4f2f\u5229\u5179"},{"name":"Turks & Caicos\u00a0Islands","value":2,"provinceName":"\u7279\u514b\u65af\u548c\u51ef\u79d1\u65af\u7fa4\u5c9b"},{"name":"Guinea-Bissau","value":2,"provinceName":"\u51e0\u5185\u4e9a\u6bd4\u7ecd"},{"name":"St.Kitts-Nevis","value":2,"provinceName":"\u5723\u5176\u8328\u548c\u5c3c\u7ef4\u65af"},{"name":"Anguilla","value":2,"provinceName":"\u5b89\u572d\u62c9"},{"name":"VirginIslands,British","value":2,"provinceName":"\u82f1\u5c5e\u7ef4\u5c14\u4eac\u7fa4\u5c9b"},{"name":"Northern Mariana Islands (Commonwealth of the)","value":2,"provinceName":"\u5317\u9a6c\u91cc\u4e9a\u7eb3\u7fa4\u5c9b\u8054\u90a6"},{"name":"Saint Vincent and the Grenadines","value":1,"provinceName":"\u5723\u6587\u68ee\u7279\u548c\u683c\u6797\u7eb3\u4e01\u65af"},{"name":"Tinor-Leste","value":1,"provinceName":"\u4e1c\u5e1d\u6c76"},{"name":"Papua New Guinea","value":1,"provinceName":"\u5df4\u5e03\u4e9a\u65b0\u51e0\u5185\u4e9a"}]'),
            },
        ],
        animation: false,
    };
    worldChart.setOption(worldoption, true);
    worldChart.resize();

    worldmap = document.getElementById("worldmap");
    cnmap = document.getElementById("cnmap");
    cninfo = document.getElementById("cninfo");
    worldinfo = document.getElementById("worldinfo");
    btncn = document.getElementById('btn-cn');
    btnworld = document.getElementById('btn-world');



        cnmap.style.display = 'none';
    worldmap.style.display = 'block';
    cninfo.style.display = 'none';
    worldinfo.style.display = 'flex';
    btncn.className = 'button';
    btnworld.className = 'button btn-active';
    


    function showcn(e) {

        cnmap.style.display = 'block';
        worldmap.style.display = 'none';
        cninfo.style.display = 'flex';
        worldinfo.style.display = 'none';
        btncn.className = 'button btn-active';
        btnworld.className = 'button';
    }

    function showworld(e) {
        worldmap.style.display = 'block';
        cnmap.style.display = 'none';
        cninfo.style.display = 'none';
        worldinfo.style.display = 'flex';
        btncn.className = 'button';
        btnworld.className = 'button btn-active';
    }
</script>

</body></html>