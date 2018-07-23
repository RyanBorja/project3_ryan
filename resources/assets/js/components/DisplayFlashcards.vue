
<template>
    <div class="container">
        <div class="card mt-5 mb-3">
            <div class="form-group">
                <input id="searchBox" class="form-control m-0 newFCForm" type="text" v-model="searchString" placeholder="Search For Terms" />
            </div>
        </div>
        
        <div class="card flash-card-width my-3" v-for="flashcard in filteredFlashcards">
            <div class="card-header">
                <div class="row">

                <div class="col">
                    <h4 class="m-0">{{ flashcard.term }}</h4>
                </div>

                <div class="col">
                    <div class="row float-right">
                        <div class="col-xs-auto">
                            <button class="btn btn-sm bg-transparent"><a :href="'/flashcards/' + flashcard.id + '/edit'"><i class="fas fa-edit text-primary"></i></a></button>
                        </div>
                        <div class="col-xs-auto">
                            <form method="post" :action="'/flashcards/' + flashcard.id">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg-transparent" type="submit"><i class="fas fa-times text-danger"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
            <div class="card-body">
                <p>{{ flashcard.definition }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['flashcardsData'],
        data () {
            return {
            searchString: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },      
        mounted() {
        },
        computed: {
            filteredFlashcards: function() {
                var flashcards_array = this.flashcardsData;
                var search_string = this.searchString.toLowerCase();
                if (!search_string) {
                    return flashcards_array;
                }
                flashcards_array = flashcards_array.filter(function(item) {
                    if(item.term.toLowerCase().indexOf(search_string) !== -1) {
                        return item;
                    }
                });
                return flashcards_array;
            }
        }
    }
</script>