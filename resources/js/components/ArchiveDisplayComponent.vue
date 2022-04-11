<template>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Short Code</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts" :key="post.id">
            <td>{{ post.id }}</td>
            <td><a v-bind:href="'http://localhost/' + post.shortcode">{{ post.shortcode }}</a></td>
            <td>{{ post.url }}</td>
            <td><button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button></td>
        </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    data() {
        return {
            posts: []
        }
    },
    created() {
        let uri = 'http://localhost/api/shortenedurls?token=' + process.env.MIX_API_KEY;
        this.axios.get(uri).then(response => {
            this.posts = response.data.data;
        });
    },
    methods: {
        deletePost(id)
        {
            let uri = 'http://localhost/api/shortenedurl/delete/' + id + '?token=' + process.env.MIX_API_KEY;
            this.axios.delete(uri).then(response => {
                this.posts.splice(this.posts.indexOf(id), 1);
            });
        }
    }
}
</script>
