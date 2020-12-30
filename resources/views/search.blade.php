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
                    <label class="ef">
                        <input type="text"
                            v-model="keyword"
                            placeholder="Search by official name and you will get a hit (ex: Spoken English ...)"
                            type="text">
                    </label>
                </div>
                <div v-for="data in filterData">
                    <a :href="data.url" target="_blank">
                        <p class="data_para">
                            @{{data.time}}
                            @{{data.subject}}
                            @{{data.teacher}}
                            @{{data.class}}
                            @{{data.url}}
                            @{{data.semester}}
                            @{{data.credit}}
                        <p>
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
                keyword: '',
            },
            mounted: function() {
                axios.get('/api/time').then(response => this.datalist = response.data)
            },
            computed: {
                filterData: function() {
                    let datas = [];
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
                }
            },
        })
    </script>
</body>

</html>