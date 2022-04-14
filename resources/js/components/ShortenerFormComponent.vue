<template>
    <div>
        <p v-if="errors.length">
            <b>Please correct the following error(s):</b>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
        </p>
    <form @submit.prevent="addURL">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="input-group input-group-lg mb-3">
                    <input type="url" ref="urlinput" class="form-control" v-model="post.url" placeholder="Enter URL">
                    <div class="input-group-append">
                        <button class="btn btn-primary" v-bind:disabled="submitDisabled">Shorten</button>
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
            <td><a v-bind:href=" href + url.shortcode ">{{ url.shortcode }}</a></td>
            <td class="overflow-hidden w-50">{{ url.url }}</td>
            <td>
                <button class="btn" @click="copy( 'http://localhost/' + url.shortcode )" title="Copy Short URL">
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
            errors:[],
            href: '',
            loading:false
        }
    },
    created() {
        let href = window.location.href;
        let uri = href + 'api/shortenedurls?token=' + process.env.MIX_API_KEY;
        this.axios.get(uri).then(response => {
            this.urls = response.data.data;
            console.log(response.data.data);
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
            this.errors = [];
            if (!this.checkUrl(this.post.url)) {
                this.errors.push('URL not valid');
            }else{
                axios.post(window.location.href + 'api/shortenedurl/create?token=' + process.env.MIX_API_KEY, this.post).then(response => {
                    console.log(response.data);
                    this.post.url = '';
                    this.urls.unshift(response.data);
                })
            }
        },
        async copy(s) {
            await navigator.clipboard.writeText(s);
            this.$alert('Short Url Copied!');
        },
        deleteUrl(id, index) {
            let uri = window.location.href + 'api/shortenedurl/delete/' + id + '?token=' + process.env.MIX_API_KEY;
            this.axios.delete(uri).then(response => {
                this.$delete(this.urls, index);
            });
        },
        checkUrl(text) {
            // Match ONLY web URLs
            // Regex borrowed originally from https://gist.github.com/gruber/8891611
            // Modified for JS here https://stackoverflow.com/questions/6927719/url-regex-does-not-work-in-javascript
            const regex = /\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/i;
            const res = text.match(regex);
            if (res !== null){
                // There was a match.
                console.log('match!');
                return true;
            } else {
                // No match.
                console.log('no match!');
                return false;
            }
        }
    },
    computed: {
        submitDisabled() {
            if (this.post.url) {
               return false;
            } else {
                return true;
            }
        }
    }
}
</script>
