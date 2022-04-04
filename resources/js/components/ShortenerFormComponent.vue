<template>
    <form @submit.prevent="addShortenedUrl">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>URL:</label>
                    <input type="text" class="form-control" v-model="shortenedurl.title">
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
export default {
    data(){
        return {
            shortenedurl:{}
        }
    },
    methods: {
        addShortenedUrl(){
            console.log(this.shortenedurl);
            let uri = '/api/shortenedurl/create';
            this.axios.post(uri, this.shortenedurl).then((response) => {
                this.$router.push({name: 'shortenedurl'});
            });
        }
    }
}
</script>
