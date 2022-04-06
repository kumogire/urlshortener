<template>
    <form @submit.prevent="addURL">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>URL:</label>
                    <input type="text" class="form-control" v-model="post.url">
                </div>
            </div>
        </div>
        <br />
        <div class="form-group">
            <button class="btn btn-primary">Create</button>
        </div>
    </form>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            post:{},
            loading:false
        }
    },
    methods: {
        addURL() {
            axios.post('http://localhost/api/shortenedurl/create?token=' + process.env.API_TOKEN, this.post).then(response => {
                console.log( response.data);
            })
                .catch(error =>{console.log(error)})
                .finally(() => this.loading = false)
        }
    }
}
</script>
