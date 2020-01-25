<template>
    <div>
        <button
            v-for="(player, index) in players"
            :key="player.id"
            @click="vote(index)"
        >
            {{ player.name }}-{{player.num_of_vote}}
        </button>
        <br>
        <button @click="savePlayers()">保存</button>
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
        this.getPlayersList();
    },
    methods: {
        getPlayersList: function() {
            this.$axios
                .get('api/players/list')
                .then(res => {
                    console.log(res.data);
                    this.players = res.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        vote: function(index) {
            this.players[index].num_of_vote +=1;
        },
        savePlayers: function() {
            this.$axios
                .post('api/players/save', {players: this.players})
                .then(res => {
                    console.log('players save success');
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>
