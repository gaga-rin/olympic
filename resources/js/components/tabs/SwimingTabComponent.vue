<template>
    <div class="box is-centered">
        <span style="font-weight: bold">払い戻し総額：{{ sum_refundment_price }}円</span>
        <span style="font-weight: bold; margin-left: 50px;">賭け金：{{ bet_price }}円</span>
        <table class="table">
            <thead>
                <th>選手名</th>
                <th>オッズ</th>
                <th>得票数</th>
                <th>Betボタン</th>
            </thead>
            <tbody
                v-for="(player, index) in players"
                :key="player.id"
            >
                <td style="padding: 15px">{{ player.name }}</td>
                <td style="padding: 15px">{{ odds(player.num_of_vote) }}</td>
                <td style="padding: 15px">{{ player.num_of_vote }}票</td>
                <td><button @click="vote(index)" class="button is-primary">Bet</button></td>
            </tbody>
        </table>
        <div class="is-centered">
            <button @click="saveVoute()" class="button is-primary">Bet完了</button>
            <button @click="clearVote()" class="button is-danger">Betリセット</button>
        </div>
    </div>
</template>
<script>
export default {
    components: {
    },
    props: {
    },
    data() {
        return {
            players: [],
            refundment_rate: 0.8,
            unit_price: 500,
            bet_price: 0,
        }
    },
    computed: {
        sum_vote: function () {
            let sum_vote = 0;
            this.players.forEach(element => {
                sum_vote += element.num_of_vote
            });
            return sum_vote;
        },
        sum_refundment_price: function (){
            return this.sum_vote * this.unit_price * this.refundment_rate;
        }
    },
    filters: {
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
                    this.bet_price = 0;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        vote: function(index) {
            this.players[index].num_of_vote += 1;
            this.bet_price += this.unit_price;
        },
        saveVoute: function() {
            this.$axios
                .post('api/players/save', {players: this.players})
                .then(res => {
                    console.log('players save success');
                    this.bet_price = 0;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        clearVote: function () {
            this.getPlayersList();
        },
        odds: function(vote) {
            if (vote == 0) {
                return 0;
            }
            let odds = this.refundment_rate * this.sum_vote / vote;
            return Math.round(odds * 10) / 10

        }
    }
}
</script>
<style>
</style>