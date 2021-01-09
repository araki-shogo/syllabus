<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>小柏ゼミ | 授業検索</title>
</head>

<body>
    <div class="tabs" id="app">
        <input id="class" type="radio" name="tab_item" checked>
        <label class="tab_item" for="class">時間と授業で探す</label>
        <input id="teacher" type="radio" name="tab_item">
        <label class="tab_item" for="teacher">授業と先生で探す</label>
        <input id="design" type="radio" name="tab_item">
        <label class="tab_item" for="design">デザイン</label>

        <div class="tab_content" id="class_content">
            <div class="tab_content_description">
                <div class="cp_iptxt">
                    <label class="ef">
                        <input type="text"
                            v-model="keyword"
                            placeholder="Search by official name and you will get a hit (ex: Spoken English ...)"
                            type="text">
                    </label>
                </div>
                <div v-for="data in filterData">
                    <a :href="data.url" target="_blank">
                        <p class="data_para">@{{data.time}} @{{data.subject}}</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="tab_content" id="teacher_content">
            <div class="tab_content_description">
                <div class="cp_iptxt">
                    <label class="ef">
                        <input type="text"
                            v-model="keyword"
                            placeholder="Search by official name and you will get a hit (ex: Spoken English ...)"
                            type="text">
                    </label>                    
                </div>
                <div v-for="data in filterData">
                    <a :href="data.url" target="_blank">
                        <p class="data_para">@{{data.subject}} @{{data.teacher}}</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="tab_content" id="design_content">
            <div class="tab_content_description">
                <div class="cp_iptxt">
                    
                    <form id="select" v-for="data in time">
                        <input type="checkbox" v-bind:value="data" v-model="val">@{{data}}
                    </form>
                    <p>@{{val}}</p>
                    
                    
                </div>
                <div v-for="data in filterData2">
                    <a :href="data.url" target="_blank">
                        <p class="data_para">@{{data.time}} @{{data.subject}} @{{data.teacher}} @{{data.class}}</p>
                    </a>
                </div>
            </div>
        </div>
        <a href="#app"><p class="to_top">ページ上部へ<p></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
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
                       '金曜1限', '金曜2限', '金曜3限', '金曜4限', '金曜5限', '金曜6限',]
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