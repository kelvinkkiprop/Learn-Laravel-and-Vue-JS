<template>
    <div>
        <h2>Articles</h2>
        <!-- Add article by Submitting a prevent default submission -->
        <form @submit.prevent="addArticle()" method="post">
            <div class="form-group">
                <label for="title"></label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title"
                v-model="article.title">
            </div>
            <div class="form-group">
                <label for="body"></label>
                <textarea type="text" name="body" id="body" class="form-control" placeholder="Enter body"
                v-model="article.body" rows="3"></textarea>
            </div>
            <button class="btn btn-light btn-block" type="submit">Submit</button>
            <hr> 
        </form>

        <!-- Get articles by looping and bind using article id-->
        <div v-for="article in articles" v-bind:key="article.id">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title">{{ article.title }}</h4>
                    <p class="card-text">{{ article.body }}</p>
                    <button class="btn btn-sm btn-danger" @click="deleteArticle(article.id)" >Delete</button>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
export default {
    //Our Data Format
    data(){
        return{
            articles: [],//Rep all articles
            article: {//Rep single object article
                id: '',
                uid: '',
                title: '',
                body: '',
            },
            article_id: '',//To identify each object
            pagination: {},
            edit: false //By default set to fasle
        }
    },

    //Fetch data
    created(){//Runs automatically when page is created
            this.fetchArticles(); //Call ofcourse after being created under methods
    },

    //METHODS
    methods: {
        //Get articles method
        fetchArticles(){
            //Get articles
            fetch('api/articles')
            .then(res => res.json())//Map response to JSON
            .then(res => {//Get actual data
                //console.log(res.data);
                //Assign our data to our data format we defined above or articles array
                this.articles = res.data;
            });
        },
        //Delete Articles method
        deleteArticle(id){
            if(confirm('Are you sure?')){
                fetch(`api/article/${id}/delete`, {
                    method: 'get'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Article removed');
                    this.fetchArticles(); //Call this again                    
                })
                .catch(err => console.log(err));
            }
        },
        
        //Add Articles method
        addArticle(){
            var data = {
                title: this.article.title, // the data to post,
                body: this.article.body,
                uid: '101',
            }
            const axios = require('axios');
            axios.post('api/articles', data)
                .then(response => { 
                    //Clear form
                    this.article.title = '';
                    this.article.body = '';
                    this.article.article_id = '';
                    alert('Article Added');
                    this.fetchArticles();//Get articles again
                }, response => {
                /* error callback */ 
                console.log(response)                    
            })
            .catch(err => console.log(err));
            //Does edit and add, rem our edit in our data format
        //    if(this.edit === false){
        //             //Add                    
        //             fetch('api/articles', {//Our end point
        //             method: 'post',
        //             body: JSON.stringify(this.articles),
        //             headers: {
        //                 'content-type': 'application/json'
        //             }
        //         })
        //        // .then(res => res.json())
        //         .then(data => {//Clear form
        //             this.article.title = '';
        //             this.article.body = '';
        //             this.edit = false;
        //             this.article.article_id = '';
        //             alert('Article Added');
        //             this.fetchArticles();//Get articles again
        //         })
        //         .catch(err => console.log(err));
        //     }else{
        //         //Update
        //     }
        }
    }
}
</script>