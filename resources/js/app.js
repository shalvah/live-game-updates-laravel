require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#main',

    data: {
            updates,
            game,
            pendingUpdate: {
                minute: '',
                type: '',
                description: ''
            }
    },

    methods: {
        updateGame(event) {
            event.preventDefault();
            axios.post(`/games/${this.game.id}`, this.pendingUpdate)
                .then(response => {
                    console.log(response);
                    this.updates.unshift(response.data);
                    this.pendingUpdate = {};
                });
        },

        updateScore() {
            const data = {
                first_team_score: this.game.first_team_score,
                second_team_score: this.game.second_team_score,
            };
            axios.post(`/games/${this.game.id}/score`, data)
                .then(response => {
                    console.log(response)
                });
        },

        updateFirstTeamScore(event) {
            this.game.first_team_score = event.target.innerText;
            this.updateScore();
        },

        updateSecondTeamScore(event) {
            this.game.second_team_score = event.target.innerText;
            this.updateScore();
        }
    }
});
