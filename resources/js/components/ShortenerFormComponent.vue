<template>
    <div>
    <form @submit.prevent="addURL">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="input-group input-group-lg mb-3">
                    <input type="text" ref="urlinput" class="form-control" v-model="post.url" placeholder="Enter URL">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Shorten</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Short Code</th>
            <th>Long URL</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(url, index) in urls" :key="url.id">
            <td><a v-bind:href="'http://localhost/' + post.shortcode">{{ url.shortcode }}</a></td>
            <td class="overflow-hidden w-50">{{ url.url }}</td>
            <td>
                <button class="btn" @click="copyUrl(url.shortcode)" title="Copy Short URL">
                    <font-awesome-icon icon="fa-regular fa-copy" />
                </button>
                <button class="btn" @click.prevent="deleteUrl(url.id, index)" title="Remove">
                    <font-awesome-icon icon="fa-regular fa-trash-can" />
                </button></td>
        </tr>
        </tbody>
    </table>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            post:{},
            urls:[],
            loading:false
        }
    },
    created() {
        let uri = window.location.href + 'api/shortenedurls?token=' + process.env.MIX_API_KEY;
        this.axios.get(uri).then(response => {
            this.urls = response.data.data;
        });
    },
    mounted() {
        this.focusInput();
    },
    methods: {
        focusInput() {
            this.$refs.urlinput.focus();
        },
        addURL() {
            axios.post(window.location.href + 'api/shortenedurl/create?token=' + process.env.MIX_API_KEY, this.post).then(response => {
                // console.log(response.data);
                this.post.url = '';
                this.urls.unshift(response.data);
            })
        },
        deleteUrl(id, index) {
            let uri = window.location.href + 'api/shortenedurl/delete/' + id + '?token=' + process.env.MIX_API_KEY;
            this.axios.delete(uri).then(response => {
                this.$delete(this.urls, index);
            });
        }
    }
}
</script>
