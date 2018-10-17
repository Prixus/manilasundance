<template>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="glyphicon glyphicon-globe"></span> Notifications <span
                class="badge alert-danger">12</span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <label>234234</label>
            </li>
        </ul>
    </li>
</template>

<script>
    import NotificationItem from './NotificationItem.vue';
    export default {
        props: ['unreads', 'userid'],
        
        mounted() {
            console.log('Component mounted.');
            
        }
    }
</script>