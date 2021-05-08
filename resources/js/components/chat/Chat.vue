<template>
    <div class="chat">
         <chat-messages></chat-messages>


        <form action="#" class="chat__form">

            <textarea
            class="chat__form-input"
             id="body"
             cols="30"
             rows="4"
             v-model="body"
             @keydown="handleMessageInput"
            ></textarea>


            <span
            class="chat__form-helptext">
                Hit Return to send or Shift + Return for a new line
            </span>
        </form>



    </div>
</template>

<script>
    import Bus from '../../bus'
    import moment from 'moment'


    export default {
        data () {
            return {
                body: null,
                bodyBackedUp: null,
            }
        },
        methods:{
            handleMessageInput(e){
                this.bodyBackedUp = this.body

                if (e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.send();
                }
            },
            buildTempMsg(){
                let tempId = Date.now();
                return {
                    id: tempId,
                    body: this.body,
                    created_at: moment().utc(0).format('YYYY-MM-DD HH:mm:ss'),
                    selfOwned: true,
                    user: {
                        name: Laravel.user.name
                    }

                }
            },
            send(){
                //temp 
                //update ui 
                //send req backend 
                //fails 
                //revert 


                //send ajax using axios 

                //then update ui 

                if (! this.body || this.body.trim() === "") {
                    return
                }

                let tempMsg = this.buildTempMsg();

                // fire event 
                Bus.$emit('messages.added', tempMsg)

                axios.post('/chat/messages',{
                    body : this.body.trim()
                }).catch(() => {
                    this.body = this.bodyBackedUp;
                    Bus.$emit('messages.removed', tempMsg)

                    console.log('failed');
                })


                // console.log(tempMsg);
                this.body = null;
            }

            
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss">
    .chat{
        background-color: #fff ;
        border: 1px solid #d3e0e9;
        border-radius: 3px;

        &__form{
            border-top: 1px solid #d3e0e9;
            padding: 10px;

            &-input{
                width: 100%;
                border: 1px solid #d3e0e9;
                padding: 5px 10px;
                outline: none;
            }

            &-helptxt{
                color: #aaa;

            }
        }
    }
</style>
