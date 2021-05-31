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

    <div class="list">
      <div v-for="data in filterData" class="list_item">
        <a :href="data.url" target="_blank" class="list_item_link">
          <span>{{ data.time }}</span>
          <span>{{ data.subject }}</span>
          <span>{{ data.class }}</span>
          <span>{{ data.semester }}</span>
          <span>{{ data.grade }}</span>
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
      keyword: "",
      message: "",
    };
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
    // フリーワード検索
    filterData: function () {
      let datas = [];
      for (let i in this.datalist) {
        let data = this.datalist[i];
        if (
          data.time.indexOf(this.keyword) !== -1 || // 以下すべてデータが正しい場合
          data.subject.indexOf(this.keyword) !== -1 ||
          data.teacher.indexOf(this.keyword) !== -1 ||
          data.semester.indexOf(this.keyword) !== -1 ||
          data.credit.indexOf(this.keyword) !== -1 ||
          data.class.indexOf(this.keyword) !== -1
        ) {
          datas.push(data);
        }
      }
      return datas;
    },
  },
});
</script>