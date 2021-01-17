<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>授業検索</title>
</head>

<body>
    <div id="app">
    <p style="text-align:center;margin:0;">Version 1.0.0</p>
    <p style="text-align:center;margin:0;">Created by Ogashiwa Seminar</p>
        <ul class="tab clearfix">
            <li class="active">フリーワード検索</li>
            <li>タグ検索</li>
            <li>裏側</li>
        </ul>
        <div class="area">
            <ul class="show">
                <label class="ef">
                    <input type="text" v-model="keyword" placeholder="Search by official name (ex: Spoken English ...)" type="text" class="freeword">
                </label>
                <div>
                    <div v-for="data in filterData">
                        <a :href="data.url" target="_blank">
                            <p class="data_para">@{{data.time}} @{{data.subject}} @{{data.class}} @{{data.semester}} @{{data.grade}}</p>
                        </a>
                    </div>
                </div>
                <a href="#app">
                    <p class="to_top">ページ上部へ<p>
                </a>
            </ul>
            <ul>
                <div class="flex">
                    <div v-for="data in time">
                        <input type="checkbox" v-bind:value="data" v-model="val">@{{data}}
                    </div>
                </div>
                <div v-for="data in filterData2">
                    <a :href="data.url" target="_blank">
                        <p class="data_para">@{{data.time}} @{{data.subject}} @{{data.teacher}} @{{data.class}} @{{data.semester}}</p>
                    </a>
                </div>
                <a href="#app">
                    <p class="to_top">ページ上部へ<p>
                </a>
            </ul>
            <ul>
                <p>comming soon</p>
                <a href="#app">
                    <p class="to_top">ページ上部へ<p>
                </a>
            </ul>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(function() {
            $('.tab li').click(function() {
                var index = $('.tab li').index(this);
                $('.tab li').removeClass('active');
                $(this).addClass('active');
                $('.area ul').removeClass('show').eq(index).addClass('show');
            });
        });

        var app = new Vue({
            el: '#app',
            data: {
                datalist: [],
                val: [],
                keyword: '',
                time: ['月曜1限', '月曜2限', '月曜3限', '月曜4限', '月曜5限', '月曜6限',
                    '火曜1限', '火曜2限', '火曜3限', '火曜4限', '火曜5限', '火曜6限',
                    '水曜1限', '水曜2限', '水曜3限', '水曜4限', '水曜5限', '水曜6限',
                    '木曜1限', '木曜2限', '木曜3限', '木曜4限', '木曜5限', '木曜6限',
                    '金曜1限', '金曜2限', '金曜3限', '金曜4限', '金曜5限', '金曜6限',
                ]
            },
            watch: {
                val(value) {
                    this.val = value
                }
            },
            mounted: function() {
                axios.get('/api/time').then(response => this.datalist = response.data)
            },
            computed: {
                // フリーワード検索
                filterData: function() {
                    let datas = []
                    for (let i in this.datalist) {
                        let data = this.datalist[i];
                        if (data.time.indexOf(this.keyword) !== -1 ||
                            data.subject.indexOf(this.keyword) !== -1 ||
                            data.teacher.indexOf(this.keyword) !== -1 ||
                            data.semester.indexOf(this.keyword) !== -1 ||
                            data.credit.indexOf(this.keyword) !== -1 ||
                            data.class.indexOf(this.keyword) !== -1) {
                            datas.push(data);
                        }
                    }
                    return datas;
                },

                // チェックボックス検索
                filterData2: function() {
                    let datas = []
                    for (let i in this.val) {
                        let time = this.val[i]
                        for (let j in this.datalist) {
                            let data = this.datalist[j];

                            if (time == data.time) {
                                datas.push(data);
                            }
                        }
                    }
                    return datas
                }
            },
        })
    </script>
</body>

</html>