import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

// コンポーネントをインポート
import index from './components/index.vue';
import time from './components/time.vue';

export default new VueRouter({
    // モードの設定
    mode: 'history',
    routes: [
        {
            // routeのパス設定
            path: '/',
            // 名前付きルートを設定したい場合付与
            name: index,
            // コンポーネントの指定
            component: index
        },
        {
            path: '/time',
            name: time,
            component: time,
        }
    ]
});