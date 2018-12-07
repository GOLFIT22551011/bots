new Vue({
    el:"#GOLF",
    data:{
        datas:[{
            ADDS:'in',
            paaaa:0,
        }],
        
              selected: 'A',
              options: [
                { text: 'One', value: 'A' },
                { text: 'Two', value: 'B' },
                { text: 'Three', value: 'C' }
              ]
            
          


     
    },
    
       

    methods:{
        ADDSA:function()
        {
            this.datas.push({
                ADDS:this.datas.ADDS,
                paaaa:this.datas.paaaa
            });
            this.datas.ADDS='';
            this.datas.paaaa=0;
        }

    }
});