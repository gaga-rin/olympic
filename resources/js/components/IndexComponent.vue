<template>
    <div>
        <button
            v-for="(player, index) in players"
            :key="player.id"
            @click="vote(index)"
        >
            {{ player.name }}-{{player.num_of_vote}}
        </button>
    </div>
</template>
<script>
export default {
    components: {
    },
    data() {
        return {
            players: []
        }
    },
    mounted: function() {
        this.$axios
            .get('json/players.json')
            .then(res => {
                console.log(res.data);
                this.players = res.data;
            })
            .catch(function (error) {
                console.log(error);
            });

    },
    methods: {
        vote (index) {
            this.players[index].num_of_vote +=1;
        }

    }
}
</script>
