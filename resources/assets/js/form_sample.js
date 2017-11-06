
import Vue from 'vue';

let box1 = new Vue({
    el:'.box1',
    data:{
        styleObject:{
            background:'purple',
            transform:'translateX(20px)'
            
        }
    },
    methods:{
        greet:function(event){
            console.log('Hello Wolrd');
            console.log(event.target);
            console.log(this);
        },
        moveRight:function(event){
            let element = event.target;
        }
    }
    
})
