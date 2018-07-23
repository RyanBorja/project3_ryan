<template>
    <div class="card flash-card-width">
        <div class="card-img-overlay text-center">
            <h1>{{ currentTerm }}</h1>
            <h3 class="mt-5">{{ currentDef }}</h3>
        </div>
        <div class="card-footer py-0 bg-transparent">
            <div class="row">
                <button class="bg-transparent col btn btn-sm float-left" v-on:click="nextCard(-1)"><i class="float-left fas fa-arrow-left"></i></button>
                <button class="bg-transparent col btn btn-sm float-right" v-on:click="nextCard(1)"><i class=" float-right fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default 
    {
        props: ['flashcardsData'],
        data () 
        {
            return {
                current: 0,  
                currentTerm: "",
                currentDef: ""       
            }
        },   

        mounted() {
            this.currentTerm = this.flashcardsData[this.current].term;
            this.currentDef = this.flashcardsData[this.current].definition;

        },

        methods: {
            nextCard: function(iteration) 
            {
                if(this.current + iteration < 0)
                {
                    this.current = this.flashcardsData.length - 1;
                }
                else
                {
                    this.current = (this.current + iteration) % this.flashcardsData.length;
                }
                this.currentTerm = this.flashcardsData[this.current].term;
                this.currentDef = this.flashcardsData[this.current].definition;
            },
        }
    }
</script>