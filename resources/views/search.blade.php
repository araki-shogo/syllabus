<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>授業検索</title>

</head>

<body style="width: 80%; margin: 0 auto;">
    <div id="app">
        <ul class="tab clearfix">
            <li class="active">フリーワード検索</li>
            <li>タグ検索</li>
        </ul>
        <div class="area">
            <ul class="show">
                <label class="ef">
                    <input type="text" v-model="keyword" placeholder="Search by official name (ex: Spoken English ...)" type="text" class="ef_freeword">
                </label>

                <div v-if="loading == true" class="axios">
                    <div class="axios_wrap">
                        <div class="ball-spin-fade-loader">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <p>Loading...</p>
                </div>

                <div class="list">
                    <div v-for="data in filterData" class="list_item">
                        <a :href="data.url" target="_blank" class="list_item_link">
                            <span>@{{data.time}}</span>
                            <span>@{{data.subject}}</span>
                            <span>@{{data.class}}</span>
                            <span>@{{data.semester}}</span>
                            <span>@{{data.grade}}</span>
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

                <div class="list">
                    <div v-for="data in filterData2" class="list_item">
                        <a :href="data.url" target="_blank" class="list_item_link">
                            <span>@{{data.time}}</span>
                            <span>@{{data.subject}}</span>
                            <span class="list_item_link_teacher">@{{data.teacher}}</span>
                            <span>@{{data.class}}</span>
                            <span>@{{data.semester}}</span>
                            <span>@{{data.grade}}</span>
                        </a>
                    </div>
                </div>
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
            $('.tab li').click(function() { // .tab liがクリックされたとき
                var index = $('.tab li').index(this); // indexを調べる
                $('.tab li').removeClass('active'); // .activeを除外と追加
                $(this).addClass('active');
                $('.area ul').removeClass('show').eq(index).addClass('show'); // 選択されたindexに.showを追加
            });
        });

        var app = new Vue({
            el: '#app',
            data: {
                loading: true,
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
                this.loading = false;
            },
            computed: {
                // フリーワード検索
                filterData: function() {
                    let datas = []
                    for (let i in this.datalist) {
                        let data = this.datalist[i];
                        if (data.time.indexOf(this.keyword) !== -1 || // 以下すべてデータが正しい場合
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