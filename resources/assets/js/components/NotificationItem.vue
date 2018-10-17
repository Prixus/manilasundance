<template>
    <div class="wrap">
        <a :href="threadUrl">
            {{ unread.data.PaymentInformation.Payment_Amount }} was paid on {{ unread.repliedTime}}
        </a>
    </div>
</template>

<script>
    export default {
        props:['unread'],
        data(){
            return {
                threadUrl:""
            }
        },
        mounted(){
            this.threadUrl="thread/"+ this.unread.data.thread.id
        }

    }
</script>
