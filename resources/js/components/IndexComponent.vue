<template>
    <div class="hero">
        <div class="hero-head">
            <div class="container">
                <h1 class="title is-centered">ブックメーカー in アイエンター</h1>
                <h2 class="subtitle">東京オリンピックの金メダル予想</h2>
            </div>
        </div>
        <div class="hero-body">
            <div class="container">
                <div class="tabs">
                    <ul>
                        <li :class="{ 'is-active': isActive == 'swiming'}">
                            <a @click="isActive = 'swiming'">
                                <span>水泳</span>
                            </a>
                        </li>
                        <li :class="{ 'is-active': isActive == 'running'}">
                            <a @click="isActive = 'running'">
                                <span>陸上</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-contents">
                    <div class="content" v-show="isActive == 'swiming'">
                        <swiming-tab-component></swiming-tab-component>
                    </div>
                    <div class="content"  v-show="isActive == 'running'">
                        <running-tab-component></running-tab-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import swimingTabComponent from './tabs/SwimingTabComponent.vue'
import RunningTabComponent from './tabs/RunningTabComponent.vue'
export default {
    components: {
        "swiming-tab-component": swimingTabComponent,
        "running-tab-component": RunningTabComponent
    },
    props: {
    },
    data() {
        return {
            isActive: 'swiming'
        }
    },
    computed: {
    },
    filters: {
    },
    mounted: function() {
    },
    methods: {
    }
}
</script>
<style>
</style>