<template>
  <div class="wrapper">
    <div class="wrapper_link">
      <router-link to="/" class="wrapper_link_item">TOP</router-link>
      /
      <router-link to="/time" class="wrapper_link_item">時間で調べる</router-link>
    </div>

    <div class="ef">
      <input
        type="text"
        v-model="keyword"
        placeholder="Search by official name (ex: Spoken English ...)"
        class="ef_freeword"
      />
    </div>

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

    <div class="flex">
      <div v-for="data in time">
        <input type="checkbox" v-bind:value="data" v-model="val">{{data}}
      </div>
    </div>

    <div class="list">
      <div v-for="data in filterData" class="list_item">
        <a :href="data.url" target="_blank" class="list_item_link">
          <span>{{data.time}}</span>
          <span>{{data.subject}}</span>
          <span class="list_item_link_teacher">{{data.teacher}}</span>
          <span>{{data.class}}</span>
          <span>{{data.semester}}</span>
          <span>{{data.grade}}</span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";

export default Vue.extend({
  data() {
    return {
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
    };
  },
  watch(value) {
    //   val(value) {
          this.val = value;
    //   }
  },
  mounted() {
    axios
      .get("/api/time/")
      .then((response) => {
        this.datalist = response.data;
      })
      .catch((error) => {
        this.message = error;
    });

    setTimeout(() => {
      this.loading = false;
    }, 500);
  },
  computed: {
    // チェックボックス検索
    filterData: function() {
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
    },
  },
});
</script>
