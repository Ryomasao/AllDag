
import Vue from 'vue';


function convertTranslate(value)
{
    return  'translate(' + value + 'px)'
}

var fuga = '10';

function accessGlobalfuga(value)
{
    fuga = Number(fuga) + value;
    return  fuga + 'px';
}



let box1 = new Vue({
    el:'.box1',
    data: {
        moveX:0,
        styleObject:{
            color: 'red',
            fontSize: '10px',
            transform: 'translateX(0px)'
        },
      },
    methods:{
        moveRight:function(event){
            this.styleObject.fontSize = accessGlobalfuga(1);
            this.moveX++;
            this.styleObject.transform = this.convertTranslate(this.moveX);
            console.log(this.styleObject.fontSize);
            console.log(this.moveX);
        },
        convertTranslate:function(value){
             return  'translate(' + value + 'px)'
        }
    },
    watch:{
        transform:function(val){
            console.log(val);
        }
    }
    
})

let box2 = new Vue({
    el:'.box2',
    data: {
        moveX:100,
        styleObject:{
            color: 'white',
            fontSize: '10px',
            transform: 'translateX(0px)'
        },
      },
    methods:{
        sayhello:function(event){
            this.styleObject.fontSize = accessGlobalfuga(1);
            console.log("hello");
        },

    }
    
})

