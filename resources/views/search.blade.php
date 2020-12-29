<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>小柏ゼミ | 授業検索</title>
    <style>
        .tabs {
        margin-top: 50px;
        padding-bottom: 40px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 700px;
        margin: 0 auto;}

        .tab_item {
        width: calc(100%/3);
        height: 50px;
        border-bottom: 3px solid #5ab4bd;
        background-color: #d9d9d9;
        line-height: 50px;
        font-size: 16px;
        text-align: center;
        color: #565656;
        display: block;
        float: left;
        text-align: center;
        font-weight: bold;
        transition: all 0.2s ease;
        }

        .tab_item:hover {
        opacity: 0.75;
        }

        input[name="tab_item"] {
        display: none;
        }

        .tab_content {
        display: none;
        padding: 40px 40px 0;
        clear: both;
        overflow: hidden;
        }

        #class:checked ~ #class_content,
        #teacher:checked ~ #teacher_content,
        #design:checked ~ #design_content {
        display: block;
        }

        .tabs input:checked + .tab_item {
        background-color: #5ab4bd;
        color: #fff;
        }
    </style>
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
                <input v-model="keyword" placeholder="search..." type="text">
                <div v-for="data in filterData">
                    <a :href="data.url">
                        <p>@{{data.time}}</p>
                        <p>@{{data.subject}}</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="tab_content" id="teacher_content">
            <div class="tab_content_description">
                <input v-model="keyword" placeholder="search..." type="text">
                <div v-for="data in filterData">
                    <a :href="data.url">
                        <p>@{{data.subject}}</p>
                        <p>@{{data.teacher}}</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="tab_content" id="design_content">
            <div class="tab_content_description">
                <input v-model="keyword" placeholder="search..." type="text">
                <div v-for="data in filterData">
                    <a :href="data.url">
                        @{{data.time}}
                        @{{data.subject}}
                        @{{data.teacher}}
                        @{{data.class}}
                        @{{data.url}}
                        @{{data.semester}}
                        @{{data.credit}}
                    </a>
                </div>
            </div>
        </div>
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